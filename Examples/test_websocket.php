<?php
require_once("../vendor/autoload.php");
include '../NorenRoutes.php';


use WebSocket\Client as WebSocketClient;
use WebSocket\TimeoutException;

// Create a WebSocket client instance and establish the connection
$client = new WebSocketClient($websocketUrl);

$filePath = "susertoken.txt";

// Read data from the file
$susertoken = file_get_contents($filePath);

try {
    // Send a message to the WebSocket server
    $client->send('{"uid":"NIKHESHP","actid":"NIKHESHP","source":"API","susertoken":"' . $susertoken . '","t":"c"}');


    // Receive and echo the response from the WebSocket server
    $message = $client->receive();
    echo $message . PHP_EOL;

    // Continuously receive and echo messages from the WebSocket server
    while (true) {
        try {
            $message = $client->receive();
            echo "Received data: $message" . PHP_EOL;
        } catch (TimeoutException $e) {
            continue; // Retry the receive operation
        }
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
    // Handle other types of exceptions
}
?>

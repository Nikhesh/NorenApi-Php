<?php

class NorenRoutes {
    private $baseUrl;
    public $routes;

    public function __construct($baseUrl) {
        $this->baseUrl = rtrim($baseUrl, '/'); // Remove trailing slash from the base URL
        $this->routes = [
            'authorize' => '/QuickAuth',
            'logout' => '/Logout',
            'searchscrip' => '/SearchScrip',
            'orderbook' => '/OrderBook',
            'tradebook' => '/TradeBook',
            'placeorder' => '/PlaceOrder',
            'modifyorder' => '/ModifyOrder',
            'cancelorder' => '/CancelOrder',
            'exitorder' => '/ExitSNOOrder',
            'product_conversion'=> '/ProductConversion',
            'singleorderhistory'=> '/SingleOrdHist',
            'logout'=> '/Logout',
            'forgot_password_OTP'=> '/FgtPwdOTP',
            'timepriceseries' => '/TPSeries',
            'forgotpassword_OTP' => '/FgtPwdOTP',
            'get_limits' => '/Limits',
            'span_calculator' =>'/SpanCalc',
            'positionbook' => '/PositionBook',
        ];
    }

    public function getFullUrl($route) {
        if (isset($this->routes[$route])) {
            return $this->baseUrl . $this->routes[$route];
        } else {
            return null; // Handle non-existent route
        }
    }
}

$baseUrl = 'http://rama.kambala.co.in/NorenWClient'; // Replace with your  API URL
$websocketUrl="ws://rama.kambala.co.in/NorenWS/";  // Replace with your websocket URL
$norenRoutes = new NorenRoutes($baseUrl); 

?>

<?php
require 'paypal/autoload.php';

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AWWGEdO3a5RuE9fd-qlyHpG1I1IFdxeWozREcRXxffxfXinKfFUTaTcCtSVT0xvrxlfoNT5GZvIlV6IY', 
        // ClientID
        'EOSVwvkJzRn0EtcEbuyiR6d3jr_LGwjXFrUxKLqEygf0qDAUB41ptLPEFSpCipT61AlPiwTKgb7-VoyT' 
        // ClientSecret
    )
);

define('URL_Site','http://localhost:8080/webDesign/08_MainProject');
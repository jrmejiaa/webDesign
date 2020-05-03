<?php
require 'paypal/autoload.php';

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        // Client ID
        "AczJyoAWUYG03fAo5QuGUq8AQ4i15vfKMHMhAaROnoYT2d8OAS49M7sCmT090iEKyRrn24as0us5pSVp",
        // Client Secret
        "EIxtYh-FrMkq1IdfN3nszs5P5PIksvqyDiYzzGVVB_3fBquqzXy6VZqPCvdU42Kisxp6tsV2kUtiORjO"
    )
);

define('URL_Site','http://localhost:8080/webDesign/16_PayPal');
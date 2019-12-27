<?php

//include google client master
include_once ("google/vendor/autoload.php");
include_once ("google/src/Google/Client.php");

//store the google credentials
$g_client = new Google_Client();

$g_client->setClientId("408767838066-7msrf28ibg4vet7u8u2go16f8ij0eqfj.apps.googleusercontent.com");
$g_client->setClientSecret("c-yCofKVlrt_noJnLzCm1TYk");
$g_client->setRedirectUri("http://localhost/capstone/index.php?login=success");
$g_client->setScopes("email");

//create the url
$auth_url = $g_client->createAuthUrl();
//echo "<a href='$auth_url'>Login Through Google </a>";

//get the authorization  code
$code = isset($_GET['code']) ? $_GET['code'] : NULL;

//get access token
if (isset($code)) {
    try {
        $token = $g_client->fetchAccessTokenWithAuthCode($code);
        $_SESSION['access_token']=$g_client->setAccessToken($token);
    }catch (Exception $e){
        echo $e->getMessage();
    }
    try {
        $pay_load = $g_client->verifyIdToken();
    }catch (Exception $e) {
        echo $e->getMessage();
    }
} else{
    $pay_load = null;
}
if (isset($pay_load)){

}

?>
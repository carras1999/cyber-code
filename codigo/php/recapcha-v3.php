<?php
// https://stackoverflow.com/questions/51507695/google-recaptcha-v3-example-demo
if (isset($_POST['g-recaptcha-response'])) {
    $captcha = $_POST['g-recaptcha-response'];
} else {
    $captcha = false;
}
if (!$captcha) {
    //Do something with error
} else {
    $secret   = '6LccgcEUAAAAAD4ejph7eift4IbWtIdSBHktdbuM';
    $response = file_get_contents(
        "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']
    );
    // use json_decode to extract json response
    $response = json_decode($response);
    var_dump($response);
    if ($response->success === false) {
        //Do something with error
        echo "KO";
    }
}
//... The Captcha is valid you can continue with the rest of your code
//... Add code to filter access using $response . score
if ($response->success==true && $response->score <= 0.5) {
    //Do something to denied access
    echo "KO";
}
echo "Captcha OK";

var_dump($response);
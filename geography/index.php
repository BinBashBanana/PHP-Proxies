<?php
session_start(); //Start session for settings of proxy to be stored and recovered
require("includes/class.censorDodge.php"); //Load censorDodge class
$proxy = new censorDodge(@$_GET["q"], true, true); //Instantiate censorDodge class

//Clear cookies and resetting settings session
if (isset($_GET["clearCookies"])) { $proxy->clearCookies(); echo '<meta http-equiv="refresh" content="0; url='.q.'">'; }
if (isset($_POST["resetSettings"])) { unset($_SESSION["settings"]); echo '<meta http-equiv="refresh" content="0; url='.q.'">'; }

$settings = $proxy->getProxySettings(); //Get all settings (plugins included) that are user intractable

//Update settings in session for changing in proxy later
if (isset($_POST["updateSettings"])) {
    foreach ($settings as $setting) {
        if (isset($proxy->{$setting[0]})) {
            $_SESSION["settings"][$setting[0]] = isset($_POST[$setting[0]]); //Store settings in session for later
            $proxy->{$setting[0]} = isset($_POST[$setting[0]]); //Update proxy instance settings
        }
    }

    echo '<meta http-equiv="refresh" content="0; url='.q.'">'; //Reload page using META redirect
}
else {
    foreach ($settings as $setting) {
        if (isset($proxy->{$setting[0]}) && isset($_SESSION["settings"][$setting[0]])) {
            $proxy->{$setting[0]} = $_SESSION["settings"][$setting[0]]; //Update proxy instance settings
        }
    }
}

//Find any templates which can be used as themes components
$templates = array(); foreach(glob(BASE_DIRECTORY."plugins".DS."{**/*,*}",GLOB_BRACE) as $file) { if (preg_match("~([a-z0-9\_\-]+)\.cdTheme~i",$file,$m)) { $templates[$m[1]] = $file; } }
if (@$templates["error"]) { set_exception_handler(function($e) use ($proxy,$settings,$templates) { if ($errorString=$e->getMessage()) { include("".$templates["error"].""); }}); }

if (!@$_GET["q"]) { //Only run if no URL has been submitted
    if (!@$templates["home"]) {
        echo "<!DOCTYPE html><html><head><title>CensorDodge ".$proxy->version."</title></head><body>"; //Basic title

        //Basic submission form with base64 encryption support
        echo "
        <h2>CensorDodge ".$proxy->version." (BinBashBanana version)</h2>
        <form action='./' method='GET'>
            <input type='text' size='30' name='q' placeholder='URL' required autofocus>
            <input type='submit' value='Go!'>
        </form>";

        echo "</body></html>";
    }
    else {
        include("".$templates["home"]."");
    }
}
else {
    echo $proxy->openPage(); //Run proxy with URL submitted when proxy class was instantiated
}
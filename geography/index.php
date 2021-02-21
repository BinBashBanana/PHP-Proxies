<?php
session_start(); //Start session for settings of proxy to be stored and recovered
require("includes/class.censorDodge.php"); //Load censorDodge class
$proxy = new censorDodge(@$_GET["q"], true, true); //Instantiate censorDodge class

if (!@$_GET["q"]) { //Only run if no URL has been submitted
    echo "<!DOCTYPE html>
<html>
	<head>
		<title>CensorDodge ".$proxy->version."</title>
	</head>
	<body>
		<h2>CensorDodge ".$proxy->version." (BinBashBanana version)</h2>
		<form action='./' method='GET'>
			<input type='text' size='30' name='q' placeholder='URL' required autofocus>
			<input type='submit' value='Go!'>
		</form>
	</body>
</html>";
}
else {
    echo $proxy->openPage(); //Run proxy with URL submitted when proxy class was instantiated
}
<?php

include 'PHP-LG-SmartTV/smartTV.php';

$tv = new SmartTV('192.168.0.11',8080);

$tv->setPairingKey(647492);

try {
	$tv->authenticate();
} catch (Exception $e) {
	die('Authentication failed, I am sorry.');
}

file_put_contents('screen.jpeg', $tv->queryData(TV_INFO_SCREEN));

?>
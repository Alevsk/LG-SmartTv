<?php 

include 'PHP-LG-SmartTV/smartTV.php';

$tv = new SmartTV('192.168.0.11',8080);

$code = 647000;

while(true) {
	$response = testCode($tv,$code);
	if($response) {
		print "The pairing key is: " . $code . "\n";
		break;
	}
	print "Wrong key: " . $code . "\n"; 
	$code++;
}

function testCode($tv,$code) {
	$tv->setPairingKey($code);
	try {
		$tv->authenticate();
		return true;
	} catch (Exception $e) {
		return false;
	}
}

?>
<?php
if (extension_loaded('sockets')) {
	//Create socket IPv4
	$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP) ;
	if($socket === false) {
		$errorcode = socket_last_error() ;
		$errormsg = socket_strerror($errorcode);
		echo "Error socket IPv4: ".$errormsg."<br>\n" ;
	}
	else {
		echo "Socket IPv4 supported<br>\n" ;
		socket_close($socket);
	}

	//Create socket IPv6
	$socket = socket_create(AF_INET6, SOCK_STREAM, SOL_TCP) ;
	if($socket === false) {
		$errorcode = socket_last_error() ;
		$errormsg = socket_strerror($errorcode);
		echo "Error socket IPv6: ".$errormsg."<br><br>\n" ;
	}
	else {
		echo "Socket IPv6 supported<br><br>" ;
		socket_close($socket);
	}
}
else echo "Extension PHP sockets not loaded<br><br>" ;
?>

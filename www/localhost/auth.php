<?php
$host = "127.0.0.1";
$username = "rtmp";
$password = "rtmp";
$dbname = "rtmp";

try {
	$dbh = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $username, $password);
}
catch(PDOException $e) {
	http_response_code(403);
	die();
}
if(empty($_POST['name'])) {
	http_response_code(403);
	die();
}
try {
	$qInfoKey = "SELECT username, stream_key FROM users WHERE stream_key = :stream_key";
	$qInfoKeyPrepared = $dbh->prepare($qInfoKey);
	$qInfoKeyPrepared->execute(array(':stream_key' => $_POST['name']));
	$qInfoResults = $qInfoKeyPrepared->fetch(PDO::FETCH_ASSOC);
}
catch(PDOException $e) {
	http_response_code(403);
	die();
}
if ($_POST['name'] == $qInfoResults['stream_key']) {
	try {
		$qUpdate = "UPDATE users SET live_status=1 WHERE stream_key = :stream_key";
		$qUpdatePrep = $dbh->prepare($qUpdate);
		$qUpdatePrep->execute(array(':stream_key' => $_POST['name']));
	}
	catch(PDOException $e) {
		http_response_code(403);
		die();
	}
	header("Location: ".$qInfoResults['username']);
	die();
} else {
	http_response_code(403);
	die();
}
?>

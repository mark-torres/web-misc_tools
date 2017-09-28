<?php
header("Content-Type: text/plain");

$server_vars = array(
	'HTTP_HOST',
	'SERVER_NAME',
	'HTTP_USER_AGENT',
	'REMOTE_ADDR',
	'SERVER_PROTOCOL',
	'REQUEST_METHOD',
	'QUERY_STRING',
	'REQUEST_URI',
);
$server = array();
foreach ($_SERVER as $key => $value) {
	if (in_array($key, $server_vars)) {
		$server[$key] = $value;
	}
}

echo "= = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =\n";
echo "HEADERS DUMP:\n";
echo "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -\n";
var_dump(getallheaders());
echo "\n";

echo "= = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =\n";
echo "SERVER DUMP:\n";
echo "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -\n";
var_dump($server);
echo "\n";

echo "= = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =\n";
echo "REQUEST DUMP:\n";
echo "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -\n";
var_dump($_REQUEST);
echo "\n";

echo "= = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =\n";
echo "GET DUMP:\n";
echo "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -\n";
var_dump($_GET);
echo "\n";

echo "= = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =\n";
echo "POST DUMP:\n";
echo "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -\n";
var_dump($_POST);
echo "\n";





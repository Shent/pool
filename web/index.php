<?php

echo sprintf("HOST: %s", $_ENV['DATABASE_HOST']);
echo sprintf("USER: %s", $_ENV['DATABASE_USER']);
echo sprintf("PASS: %s", $_ENV['DATABASE_PASSWORD']);

$mysql = new mysqli($_ENV['DATABASE_HOST'], $_ENV['DATABASE_USER'],
	$_ENV['DATABASE_PASSWORD'], $_ENV['DATABASE_NAME']);
if (!$mysql) {
	echo "Error: Unable to connect to MySQL." . PHP_EOL;
	echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	exit;
}



//define('YII_DEBUG', true);

require_once('serverconfig.php');
require_once('yaamp/defaultconfig.php');
require_once('yaamp/ui/app.php');

//$_SERVER['PATH_INFO'] = $_SERVER['REQUEST_URI'];

// blacklist some search bots which ignore robots.txt (most in fact)
$isbot = false; $agent = arraySafeVal($_SERVER,'HTTP_USER_AGENT','');
if (strpos($agent, 'MJ12bot') || strpos($agent, 'DotBot') || strpos($agent, 'robot'))
	$isbot = true;
else if (strpos($agent, 'AhrefsBot') || strpos($agent, 'YandexBot') || strpos($agent, 'Googlebot'))
	$isbot = true;

if ($isbot) {
	$url = arraySafeVal($_SERVER,'REQUEST_URI');
	if (strpos($url, "explorer"))
		throw new CHttpException(403,"You are not wanted on this server. see robots.txt");
	die();
}

try
{
	$app->run();
}

catch(CException $e)
{
//	Javascript("window.history.go(-1)");
//	mydump($e, 3);

	debuglog("front end error ".$_SERVER['REMOTE_ADDR']);
	debuglog($e->getMessage());

//	send_email_alert('frontend', "frontend error", "a frontend error occured");
}

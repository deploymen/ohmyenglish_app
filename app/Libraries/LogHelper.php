<?php namespace App\Libraries;

class LogHelper{

	public static function LogToDatabase($message, $context)
	{
		$pdo = \DB::connection('mysql')->getPdo();
		$mySQLHandler = new MonologMySQLHandler($pdo);
		$logger = new \Monolog\Logger($context);
		$logger->pushHandler($mySQLHandler);
		$logger->addError($message, $context);
	}
}
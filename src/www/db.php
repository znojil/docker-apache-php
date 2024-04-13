<?php
$dsn = 'mysql:host=database;dbname=example';
$user = 'root';
$password = 'root';

try{
		$pdo = new \PDO($dsn, $user, $password);
		$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
}catch(\PDOException $e){
		die('Error: ' . $e->getMessage());
}

echo 'OK';

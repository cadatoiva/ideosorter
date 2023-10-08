<?php

function CreateDbConnection()
{
	$user = "";
	$password = "";
	$database = "";
	$table = "";

	try
	{
		$db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
		return $db;
	}
	catch (PDOException $e)
	{
		print "ERROR!: " . $e.getMessage() . "<br/>";
		die();
	}
}

?>
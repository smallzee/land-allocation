<?php
	session_start();

	//Database variables
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_name = "fpe_web_project_land";

	define('DB_HOST', $db_host);
    define('DB_TABLE', $db_name);
    define('DB_USER', $db_user);
    define('DB_PASSWORD', $db_pass);

    try {
        $db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_TABLE, DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
    }

    catch (PDOException $e){
        die('<br/><center><font size="15">Could not connect with database</font></center>');
    }

	require 'func.php';
?>
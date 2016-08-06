<?php 
session_start();
session_unset();
	$_SESSION['FBID'] = NULL;           
	$_SESSION['FULLNAME'] = NULL;
	$_SESSION['EMAIL'] =  NULL;
	$_SESSION['LASTNAME'] = NULL;
	$_SESSION['BDAY'] = NULL;
	$_SESSION['BIO'] = NULL;
	$_SESSION['GENDER'] = NULL;
	$_SESSION['LANGUAGE'] = NULL;
	$_SESSION['RELATIONSHIP'] = NULL;
	$_SESSION['QUOTES'] = NULL;
header("Location: index.php"); 
?>

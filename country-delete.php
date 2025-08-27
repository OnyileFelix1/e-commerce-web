<?php require_once('header.php'); ?>

<?php


	//Preventing direct accesss from this page
if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {


		//check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM tbl_country WHERE country_id=?");
	$statement->execute(array($_REQUEST['id']));
	$total = $statement->rowCount();
	if( $total == 0 ) {
		header('location: logout.php');
		exit;
	}
}
?>

<?php

		//Delete from table country
	$statement = $pdo->prepare("DELETE FROM tbl_country WHERE country_id=?");
	$statement->execute(array($_REQUEST['id']));

	header('location: country.php');
?>

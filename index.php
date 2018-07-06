<?php

	require('Model\DBModel.php');
	require('Model\DBdata.php');
	use pro1\Model\DBaccess;

	$DB = new DBaccess();
	if($DB->connect()){
		header('Location: View\login.php');
    	exit;
	}else{
		echo 'DB connection is Failed';
	}
?>
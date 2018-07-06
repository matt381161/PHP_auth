<?php
	require('../Model/DBModel.php');
	require('../Model/DBdata.php');
	use pro1\Model\DBaccess;

	session_start();
	$DB = new DBaccess();

	if(isset($_POST['email']))
	$email = $_POST['email'];
	
	if(isset($_POST['pwd']))
	$pwd = $_POST['pwd'];
	
	if(isset($_POST['pwd_confirm']))
	$pwd_confirm = $_POST['pwd_confirm'];

	if(isset($_POST['mode']))
	$mode=$_POST['mode'];
	
	switch ($mode) {
		case 'register':
			if($pwd == $pwd_confirm)
				$DB->insert_into($email,$pwd);
			else{
				echo 'pwd_confirm incorrect!';
				echo '<br><a href="..\View\register.php">回前頁</a>';
			}
			break;
		
		case 'login':
			$DB->login($email,$pwd);
			break;

		case 'delete':
			$email=$_SESSION['username'];
			$DB->delete($email);
			break;

		default:
			# code...
			break;
	}

?>
<html>
	<head>
		<?php require('bootstrap.php'); ?>
		<title>Lobby</title>
	</head>
	<body>
		<?php
			session_start();
			if($_SESSION['username'] == null){
				echo 'Login First';
				header('Location: login.php');
    			exit;
			}
		?>
		<form method="POST" action="../Controller/authController.php">
			<div class="form-group">
				<input type="hidden" name="mode" value="delete">
				<button class="btn btn-danger" type="submit">Delete This Account</button>
			</div>
		</form>
		<?php 
			require('../Model/DBModel.php');
			require('../Model/DBdata.php');
			use pro1\Model\DBaccess;

			$DB = new DBaccess();
			$DB->select_all();
		?>
	</body>
</html>
<!doctype html>
<html lang="en">
<head>
  <?php require('bootstrap.php'); ?>
  <title>Register</title>
 </head>
 <body>
 	<form method="POST" action="/Controller/authController.php">
  		<div class="form-group">
    		<label for="email">Email address:</label>
    		<input type="email" class="form-control" id="email" name="email" required>
  		</div>
  		<div class="form-group">
    		<label for="pwd">Password:</label>
    		<input type="password" class="form-control" id="pwd" name="pwd">
  		</div>
      <div class="form-group">
        <label for="pwd_confirm">Confirm:</label>
        <input type="password" class="form-control" id="pwd_confirm" name="pwd_confirm">
      </div>
      <input type="hidden" name="mode" value="register">
		  <button type="submit" class="btn btn-default">Submit</button>
		</form>
 </body>
 </html>
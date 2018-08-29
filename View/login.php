<!doctype html>
<html lang="en">
<head>
  <?php require('bootstrap.php'); ?>
  <?php require('../Model/FBSDK.php'); ?>
  <title>Auth</title>
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
        <input type="hidden" name="mode" value="login">
        <input type="hidden" name="pwd_confirm" value="">
      </div>
		  <button type="submit" class="btn btn-default">Submit</button>
		  <button class="btn btn-default" onClick="register()">Register</button>
		</form>
 </body>
 <script type="text/javascript">
   function register(){
    document.location.href="/View/register.php";
   }
 </script>
</html>
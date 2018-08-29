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
    
    <?php /* ?>
    <fb:login-button
      scope="public_profile,email"
      onlogin="checkLoginState();">
    </fb:login-button>
    <?php */ ?>
    <div id="status">
  </div>
 </body>
 <script type="text/javascript">
   function register(){
    document.location.href="/View/register.php";
   }

   function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    if (response.status === 'connected') {
      testAPI();
    } else {
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    }
  }

   FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });

   function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }
 </script>
</html>
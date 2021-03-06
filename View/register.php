<!doctype html>
<html lang="en">
<head>
  <?php require('bootstrap.php'); ?>
  <script>
    function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "/Model/check_email.php?email=" + str, true);        
        xmlhttp.send();
    }
}
    function back(){
      document.location.href="/View/login.php";
    }
  </script>
  <title>Register</title>
 </head>
 <body>
 	<form method="POST" action="/Controller/authController.php" 
  enctype="multipart/form-data">
  		<div class="form-group">
        <img id="preview_progressbarTW_img" src="" width="128" height="128"/>
        <label for="photo">Photo:</label>
        <input class="form-control" type="file" id="photo" accept="image/*" />
      </div>
      <div class="form-group">
    		<label for="email">Email address:</label>
    		<input type="email" class="form-control" id="email" name="email" 
        onkeyup="showHint(this.value);" required>
        <p><span id="txtHint" class="badge"></span></p>
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
      <button class="btn btn-default" onClick="back()">Back</button>
		</form>
    <script type="text/javascript">
      $("#photo").change(function(){
        readURL(this);
        });
      function readURL(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
          reader.onload = function (e) {
             $("#preview_progressbarTW_img").attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
        }
      }
    </script>
 </body>
 </html>
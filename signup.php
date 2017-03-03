<?php
#--Load Settings--#

require('functions/connection.php');
require('functions/acelib.php');
require('functions/settings.php');
require('functions/session.php');
require_once('functions/page_manager.php');
#--Build head part--#
echo "
<!DOCTYPE html>
<html>
<head>
	<title>$pageTitle</title>
	<meta name='description' content='$pageMeta'>
	<link rel='icon' type='image/png' href='images/$WebsiteIcon'>
	<!--Styles-->
	<link rel='stylesheet' type='text/css' href='$UIFolder/css/$bootStrap'>
	<link rel='stylesheet' type='text/css' href='$UIFolder/css/styles.css'>
	<link href='$UIFolder/css/simple-sidebar.css' rel='stylesheet'>
";
echo "

<script type='text/javascript' src='".$UIFolder."/js/".$jQuery."'></script>
<script type='text/javascript' src='".$UIFolder."/js/".$bootStrapJs."'></script>
<!--side bar js-->
<script>
    $('#menu-toggle').click(function(e) {
        e.preventDefault();
        $('#wrapper').toggleClass('toggled');
    });
</script>
";

?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js">
</script>
</head>
<body class="pattern">
  <div class="row">
    <div class="col-lg-4">
      
    </div>
    <div class="col-lg-4">
    <div class="panel panel-primary">
    <div class="panel-heading">
      <p class="panel-title">Sign Up</p>
    </div>
    <div class="panel-body">
        <form method="POST">
        <div class="panel-body" style="margin:15px;">
          <h4>Enter your account information</h4>

          <div class="input-group">
          <span class="glyphicon glyphicon-user
     input-group-addon" id="basic-addon1"></span>
             <input type="password" class="form-control" placeholder="First Name" id="password" name="password" required>
          </div>
          <br> 
          <div class="input-group">
          <span class="glyphicon glyphicon-user
     input-group-addon" id="basic-addon1"></span>
             <input type="password" class="form-control" placeholder="Last Name" id="password" name="password" required>
          </div>
          <br> 
          <div class="input-group">
          <span class="glyphicon glyphicon-home
     input-group-addon" id="basic-addon1"></span>
             <input type="password" class="form-control" placeholder="Address" id="password" name="password" required>
          </div>
          <br> 
         <div class="input-group">
          <span class="
     input-group-addon" id="basic-addon1">@</span>
             <input type="text" class="form-control" placeholder="Username" id="username" name="username" required>
          </div>
          <br>
         <div class="input-group">
          <span class="glyphicon glyphicon-lock
     input-group-addon" id="basic-addon1"></span>
             <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
          </div>
          <br>
           <div class="input-group">
          <span class="glyphicon glyphicon-ok
     input-group-addon" id="basic-addon1"></span>
             <input type="password" class="form-control" placeholder="Confirm password" id="password" name="password" required>
          </div>
          <br>
          <input  id="submit_login" name="submit_login" type="submit" class="btn btn-primary btn-block">
          
        </div>
        </form>
    </div>
  </div>    
    </div>
    <div class="col-lg-4">
      
    </div>
  </div>
  
</body>

<?php
echo "
</html>";
#echo "USer".$_SESSION['username'];
?>
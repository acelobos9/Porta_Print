<?php
session_start();

if(!isset($_SESSION['username'])){
      header("Location: index.php")  ;
}

?>

 <?php 
include('dbcon.php');


 $user_query=mysql_query("select * from clienttbl where clientUsername ='".$_SESSION['username']."'")or die(mysql_error());
                                    while($row=mysql_fetch_array($user_query)){
                                    $userName=$row['clientUsername'];
                                    $passWord=$row['clientPass'];
                                    $hint=$row['adminHint'];
} 

 $user_query=mysql_query("select * from clientinfo where clientUsername ='".$_SESSION['username']."'")or die(mysql_error());
                                    while($row=mysql_fetch_array($user_query)){
                                    $fname=$row['firstName'];
                                    $lname=$row['lastName'];
                                    $address=$row['addRess'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PortaPrint</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/creative.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="home">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top affix">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">PortaPrint</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">

                    <li>
                        <a class="page-scroll" href="home.php">My Files</a>
                    </li>
                    <li class="active">
                        <a class="page-scroll" href="">Account</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <section class="bg-dark">
        <div class="row">
            <div class="col-sm-4">
                
            </div>
            <div class="col-sm-4">
                
            </div>
            <div class="col-sm-4">
                
            </div>
        </div>
    </section>
    <form class="form-horizontal" method="post" action="">
    <div class="container container-fluid" style="color:black;">    
        <div class="panel" style="margin-top:70px;">
                <div class="panel-body">
                    <div class="row">
                    <div class="col-sm-6">
                        <h3>Personal Information</h3>
                        <br>
                        <div class="input-group">
                          <span class="input-group-addon" id="basic-addon1">First name</span>
                          <input type="text" class="form-control" name="firstName" aria-describedby="basic-addon1" id="firstName" value="<?php echo $fname;?>">
                        </div>
                        <br>
                        <div class="input-group">
                          <span class="input-group-addon" id="basic-addon1">Last name</span>
                          <input type="text" class="form-control" name="lastName" aria-describedby="basic-addon1" id="lastName" value="<?php echo $lname;?>">
                        </div>                         
                        <br>
                        <div class="input-group">
                          <span class="input-group-addon" id="basic-addon1">Address</span>
                          <input type="text" class="form-control" name="addRess" aria-describedby="basic-addon1" id="addRess"  value="<?php echo $address;?>">
                        </div>
                        <br>
                        <div align="center">
                            <input class="btn btn-primary btn-xl sr-button" id="editInfo" name="editInfo" type="submit" style="min-width:180px;" value="Update">
                        </div>
                    </div>
                    <div class="col-sm-6" style="border-left: 1px solid;">
                        <h3>Account Information</h3>    
                        <br>
                        <div class="input-group">
                          <span class="input-group-addon" id="basic-addon1">Username</span>
                          <input type="text" class="form-control" name="userName" aria-describedby="basic-addon1" id="firstName" value="<?php echo $userName; ?>" disabled>
                        </div>
                        <br>
                        <div class="input-group">
                          <span class="input-group-addon" id="basic-addon1">Password</span>
                          <input type="password" class="form-control" name="passWord" aria-describedby="basic-addon1" id="lastName" value="<?php echo $passWord; ?>">
                        </div>                         
                        <br>
                        <div class="input-group">
                          <span class="input-group-addon" id="basic-addon1">Password Hint</span>
                          <input type="text" class="form-control" name="hint" aria-describedby="basic-addon1" id="addRess" value="<?php echo $hint; ?>">
                        </div>
                        <br>
                        <div align="center">
                            <input class="btn btn-primary btn-xl sr-button" id="edit" name="editAcct" type="submit" style="min-width:180px;" value="Update">
                            </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>
    </form>
    <?php
    if (isset($_POST['editAcct'])){
            
           
            $passWord=md5($_POST['passWord']);
            $hint=$_POST['hint'];
            mysql_query("update clienttbl set clientPass = '$passWord' , adminHint = '$hint'  where clientUsername ='".$_SESSION['username']."'")or die(mysql_error()); ?>
   
    <script>
    alert('Sucessfully Updated Your Account Information');
    window.location="account.php";
    </script>
    <?php
    }

    if(isset($_POST['editInfo'])){
            $newFname = $_POST['firstName'];
            $newLname = $_POST['lastName'];
            $newAddr = $_POST['addRess'];

            mysql_query("UPDATE clientinfo set firstName='".$newFname."', lastName='".$newLname."', addRess ='".$newAddr."' where clientUsername ='".$_SESSION['username']."'")or die(mysql_error());
            ?>
              <script>
                alert('Sucessfully Updated Your Personal Information');
                window.location="account.php";
                </script>
            <?php
    }
    ?>
    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <script type="text/javascript">
    </script>
    

</body>

</html>


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

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
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
                        <a class="page-scroll" href="#portfolio">SignIn</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Services</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1 id="homeHeading">Print Your Documents on the Go! Have Your Work Printed in an Instant.</h1>
                <hr>
                <p>We provide fast and efficient printing services for student, professionals, and businesses. With our online document storage, you can access or print your file anywhere.</p>
                <a href="#about" class="btn btn-primary btn-xl page-scroll">Find Out More</a>
            </div>
        </div>
    </header>

    <section class="no-padding" id="portfolio">
        <div class="container-fluid" style="margin-top:45px;margin-bottom:45px;">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <div class="panel panel-info">
                    
                        <div align="center">
                            <h2 style="margin-bottom:0px;">Sign In</h2>
                        </div>
                        <div class="panel-body">
                            <h4>Username</h4>
                            <div class="input-group">
                              <span class="input-group-addon" id="basic-addon1"><i class="fa  fa-user text-primary sr-icons"></i></span>
                              <input type="text" class="form-control" name="username" placeholder="Username" aria-describedby="basic-addon1" id="username" >
                            </div>
                            <h4>Password</h4>
                            <div class="input-group">
                              <span class="input-group-addon" id="basic-addon1"><i class="fa fa-lock text-primary sr-icons"></i></span>
                              <input type="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1" id="password">
                            </div>                            <br>
                                    <div class="hidden alert alert-danger" role="alert" id="errorLogin" >
                                        
                                        <p id="loginStat2"><strong>Error!</strong> Check login details</p>
                                    </div>
                                    <div class="hidden alert alert-danger" role="alert" id="errorUser" >
                                        
                                        <p id="loginStat"><strong>Error!</strong> Check login details</p>
                                    </div>
                                    <div class="hidden alert alert-info " id="loginSuccess" role="alert">
                                        <strong>Validating Login</strong> You will be redirected shortly...
                                    </div>

                            <div align="center">
                            <input class="btn btn-primary btn-xl sr-button" id="submit_login" name="submit_login" type="submit" style="min-width:180px;" value="Log In">
                            </div>
                            
                        </div>
                    
                    </div>  
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
    </section>

<header class=" compress">
    <aside class="bg-primary">
        <div class="container text-center">
            <div class="call-to-action">
                <h5>Don't have an account?</h5>
                <h2>Create an account for Free!</h2>
            </div>
            
            <div class="row" id="register-form">
                <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                    
                        <div align="left" style="color:black;" class="panel">
                            <div class="panel-body">
                                <h4>Firstname</h4>
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1"><i class="fa  fa-pencil text-primary sr-icons"></i></span>
                                  <input type="text" class="form-control" placeholder="John" aria-describedby="basic-addon1" id="firstName" name="firstName">
                                </div>
                                <h4>Lastname</h4>
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1"><i class="fa  fa-pencil text-primary sr-icons"></i></span>
                                  <input type="text" class="form-control" placeholder="Doe" aria-describedby="basic-addon1" id="lastName" name="lastName">
                                </div>
                                <h4>Username</h4>
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1"><i class="fa  fa-at text-primary sr-icons"></i></span>
                                  <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1" id="userName" name="userName">
                                </div>
                                <h4>Password</h4>
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-key text-primary sr-icons"></i></span>
                                  <input type="password" class="form-control" placeholder="Password" onblur="passPrint()" onclick="ret()" aria-describedby="basic-addon1" name="passWord" id="passWord">
                                </div>
                                <h4>Confirm Password</h4>
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-key text-primary sr-icons"></i></span>
                                  <input type="password" class="form-control" placeholder="Password" onblur="passPrint()" aria-describedby="basic-addon1" name="cpassWord" id="cpassWord">
                                </div>

                                <br>
                                    <div class="hidden alert alert-danger " id="misMatch" role="alert">
                                       Passwords do not match.
                                    </div>
                                    <div class="hidden alert alert-danger " id="userTaken" role="alert">
                                       Sorry, username is already registered.
                                    </div>
                                    <div class="hidden alert alert-info " id="registerSuccess" role="alert">
                                        Success! You are now registered.
                                    </div>
                                <div align="center">
                                <input class="hidden btn btn-primary btn-xl sr-button" type="submit" id="register_btn" name="register_btn" value="Register" style="min-width:180px;">    
                                </div>
                                
                            </div>

                        </div>
                        
                    </div>
                <div class="col-sm-4"></div>
            </div>

            <a onclick="showform()" id="formTrigger" class="btn btn-default btn-xl sr-button">Register Now!</a>
        </div>
    </aside>
</header>
    <section class="bg-dark" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">About PortaPrint</h2>
                    <hr class="light">
                    <p class="text-faded">PortaPrint is a plug and print machine that makes document printing easier, and faster. We also offer an online document storage service for our valued customers, upload your file and print them on any of our machines anytime you desire. We also keep your file and account protected, and secure.</p>
                    <a href="#services" class="page-scroll btn btn-default btn-xl sr-button">Get Started!</a>
                </div>
            </div>
        </div>
    </section>

    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">At Your Service</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-dollar text-primary sr-icons"></i>
                        <h3>Affordable</h3>
                        <p class="text-muted">We offer affordable and competetive prices.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-flash text-primary sr-icons"></i>
                        <h3>Fast</h3>
                        <p class="text-muted">Get your document printed in an instant. No more waiting, just printing.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-map-marker text-primary sr-icons"></i>
                        <h3>Accessible</h3>
                        <p class="text-muted">We place our machines on accessible places to serve you better.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-lock text-primary sr-icons"></i>
                        <h3>Secure</h3>
                        <p class="text-muted">You have the control of your documents. You can share it, or keep it private.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <aside class="bg-dark2" >
        <div><section id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 text-center">
                        <h2 class="section-heading">Let's Get In Touch!</h2>
                        <hr class="primary">
                        <p>Having trouble or need assistance? We're here to help you out.<br>Good news! We are now open for franchise.</p>
                    </div>
                    <div class="col-lg-4 col-lg-offset-2 text-center">
                        <i class="fa fa-phone fa-3x sr-contact"></i>
                        <p>+63 916 834 5949</p>
                    </div>
                    <div class="col-lg-4 text-center">
                        <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                        <p><a href="mailto:teamsupremoph@gmail.com">teamsupremoph@gmail.com</a></p>
                    </div>
                </div>
            </div>
        </section>
        </div>
    </aside>
    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/creative.js"></script>
    <script type="text/javascript">
            $("#register-form").hide();
       function showform(){
        $("#register-form").show();
        $("#formTrigger").hide();
       }

    $(function() {
    $("#submit_login").click(function() { // if submit button is clicked
    var username = $("input#username").val(); // define username variable
    if (username == "") { // if username variable is empty
        $("#errorLogin").addClass("hidden");
        $("#errorUser").removeClass("hidden");
       $('#loginStat').html('<strong>Oops!</strong> Please Enter Your Username'); // printing error message
       return false; // stop the script
    }
    var password = $("input#password").val(); // define password variable
    if (password == "") { // if password variable is empty
        $("#errorLogin").addClass("hidden");
        $("#errorUser").removeClass("hidden");
       $('#loginStat').html('<strong>Oops!</strong> Please Enter Your Password'); // printing error message
       return false; // stop the script
    }
  
    $.ajax({ // JQuery ajax function
      type: "POST", // Submitting Method
      url: 'functions/login_processor.php', // PHP processor
      data: 'username='+ username + '&password=' + password, // the data that will be sent to php processor
      dataType: "html", // type of returned data
      success: function(data) { // if ajax function results success
      //  alert(data);
      if (data == "invalid") { // if the returned data equal 0
        $("#errorLogin").removeClass("hidden");
        $("#errorUser").addClass("hidden");
        $('#loginStat2').html('<strong>Login fail:</strong> Please check your login details.');
      } else { // if the reurned data not equal 0
        $("#errorLogin").addClass("hidden");
        $("#errorUser").addClass("hidden");
        $("#loginSuccess").removeClass("hidden");
        //alert('succes');
     
        //window.location.href = "index.php?p="+np;
        window.setTimeout(function(){
            window.location.href = "home.php";
        },1000);
      }
      }
     });
    return false;
    });
    
    $("#register_btn").click(function() { // if submit button is clicked

    var fName = $("input#firstName").val();
    var lName = $("input#lastName").val();
    var uName = $("input#userName").val();
    var pWord = $("input#passWord").val();
  
    $.ajax({ // JQuery ajax function
      type: "POST", // Submitting Method
      url: 'functions/register.php', // PHP processor
      data: 'firstName='+fName+"&lastName="+lName+"&userName="+uName+"&passWord="+pWord,
      dataType: "html",
      success: function(data) { // if ajax function results success
      //  alert(data);
      if (data == "taken") { // if the returned data equal 0
        //----- username already taken
        $("#userTaken").removeClass("hidden");
      }else if(data=="recorded!") { // if the reurned data not equal 0
        //----- user registered
        $("#registerSuccess").removeClass("hidden");
        
      }else{
        //window.alert(data);
      }
      }
     });
    return false;
    });




    });
    function ret(){
        $("#misMatch").addClass("hidden");
    }

    function passPrint(){
    var password = $("input#passWord").val(); 
    var cpassword = $("input#cpassWord").val(); 

    if (password == cpassword) { // if password variable is empty
        
        $("#register_btn").removeClass("hidden");
        $("#misMatch").addClass("hidden");
    }else{
        $("#misMatch").removeClass("hidden");
    }
    }
    </script>

</body>

</html>

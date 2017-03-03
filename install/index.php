<html>
<head>
	<meta charset="utf-8">
	<title>Welcome to PortaPrint SetUp</title>
	<meta content="Set up necessary information to complete the website installation.">
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="form"  align="center">

	<h2 style="margin-top:0px;">Welcome to PortaPrint SetUp</h2>
	
	<p>Please fill in the forms below to setup the administrative settings of the website. Do not share to anyone the information entered.</p>
	<div id="part1">
	
		<table class="table table-responsive" >
		
			<tbody>
				
				<tr style="text-align:left !important; background: #82D6B3;color:#021D38;">
					<td colspan="2" style="margin-bottom:0px !important;"><strong>Account Information</strong><br></td>
				</tr>
				
				<tr>
					<td>Admin Username</td>
					<td><input class="inputform" type="text" name="adminName" required ></td>
				</tr>
				<tr>
					<td>Admin Email</td>
					<td><input class="inputform" type="email" name="adminEmail" required ></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input class="inputform" type="password" id="adminPass" onkeypress="confirmPass()"  onchange="confirmPass()" name="adminPass" required ></td>
				</tr>
				<tr>
					<td>Confirm Password</td>
					<td><input class="inputform" type="password" id="adminPass2" onkeypress="confirmPass()" onfocus="setActv()" onchange="confirmPass()" onblur="confirmPass()" name="adminPass2" required >
					<span id="passStatus" style="font-size:12px;"></span></td>
				</tr>
				<tr>
					<td>Password Hint</td>
					<td><input class="inputform" type="text" name="adminHint" required ></td>
				</tr>
				<tr>
					<td></td>
					<td><BR><button class="main-btn" id="nextBtn" onclick="nextPart()"  name="next" disabled>Next</button></td>
				</tr>

			</tbody>
		
		</table>

	</div>
	<div id="part2" class="hidden">
	<form method="POST" action="install.php">
				<table class="table table-responsive" >
		
			<tbody>
				
				<tr style="text-align:left !important; background: #82D6B3;color:#021D38;">
					<td colspan="2" style="margin-bottom:10px !important;"><strong>Database Information</strong><br></td>
				</tr>
				
				<tr>
					<td>Database Address</td>
					<td><input class="inputform" type="text" id="dbAddress" name="dbAddress" required ></td>
				</tr>
				<tr>
					<td>Database Username</td>
					<td><input class="inputform" type="text" id="dbUsername" name="dbUsername" required ></td>
				</tr>
				<tr>
					<td>Database Password</td>
					<td><input class="inputform" type="password" id="dbPass" name="dbPass"></td>
				</tr>
				
				<tr>
					<td><span id="dbConStatus" style="font-size:12px;font-weight:500;"></span></td>
					<td><BR><button class="main-btn"  onclick="validateDB()"  id="connectBtn" name="connect">Connect Database</button><button class="main-btn hidden"  onclick="changeDB()"  id="changedbBtn" name="change">Change Database</button></td>
				</tr>
				
				<tr class="hidden" id="dbName">
					<td>Database Name</td>
					<td><input class="inputform" type="text"  name="dbName" required ></td>
				</tr>

				<tr>
					<td></td>
					<td><BR><input class="main-btn hidden" id="installBtn" type="submit" onclick="saveSetting()" value="Build" name="build"></td>
				</tr>

			</tbody>
		
		</table></form>
	</div>
	
	</div>


<script type="text/javascript" src="jQuery.js"></script>
<script type="text/javascript">
	function nextPart(){
		$("#part1").addClass("hidden");
		$("#part2").removeClass("hidden");
	}

		var focused = false;
	
	function setActv(){
		focused = true
	}
	function confirmPass(){
		var pass1 = $("input#adminPass").val();
		var pass2 = $("input#adminPass2").val();
		if(focused){
			if(pass1==pass2){
			//pasword match
				console.log("match");
				$("#passStatus").html("Password matched");
				$("#nextBtn").removeAttr("disabled");
			}else{
				$("#nextBtn").attr("disabled","disabled");
				$("#passStatus").html("Password not match.");
			}
		}
	
	}
	function validateDB(){
		var dbAddress = $("input#dbAddress").val();
		var dbUsername = $("input#dbUsername").val();
		var dbPass = $("input#dbPass").val();
		//alert(dbAddress+" "+dbUsername);
		$.ajax({ // JQuery ajax function
		      type: "POST", // Submitting Method
		      url: 'dbValidate.php', // PHP processor
		      data: 'dbAddress='+ dbAddress + '&dbUsername=' + dbUsername + '&dbPass=' + dbPass, // the data that will be sent to php processor
		      dataType: "html", // type of returned data
		      success: function(data) { // if ajax function results success
		     // alert(data);
			    
			      if (data == "dbConnectedxyz") {
					$("#dbConStatus").html("Connection to server successful.");
					$("#installBtn").removeClass("hidden");
					$("#connectBtn").addClass("hidden");
					$("#dbName").removeClass("hidden");
					$("#changedbBtn").removeClass("hidden");
					$("#dbAddress").attr("disabled","disabled");
					$("#dbUsername").attr("disabled","disabled");
					$("#dbPass").attr("disabled","disabled");
			      }else{
			      	$("#dbConStatus").html("Can't connect to the server.<br>Kindly check the information above.");
			      }
		      }
     	
     	});
     	//return false;
	}

	function changeDB(){
		$("#connectBtn").removeClass("hidden");
		$("#installBtn").addClass("hidden");
		$("#dbName").addClass("hidden");
		$("#dbConStatus").html("");
		$("#changedbBtn").addClass("hidden");;
		$("#dbAddress").removeAttr("disabled");
		$("#dbUsername").removeAttr("disabled");
		$("#dbPass").removeAttr("disabled");
	}

	function saveSetting(){
		$("#part1").removeClass("hidden");
		$("#dbAddress").removeAttr("disabled");
		$("#dbUsername").removeAttr("disabled");
		$("#dbPass").removeAttr("disabled");	
		var dbAddress = $("input#dbAddress").val();
		var dbUsername = $("input#dbUsername").val();
		var dbPass = $("input#dbPass").val();
		var dbName = $("input#dbName").val();
		//window.location("aceWeb/");
	}
</script>


</body>

</html>
<?php


?>
<?php
session_start();
include("functions/filemanager.php");

if(!isset($_SESSION['username'])){
     header("Location: index.php")  ;
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
                <a class="navbar-brand page-scroll" href="#page-top"><img src="img/uprinthub.png"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">

                    <li class="active">
                        <a class="page-scroll" href="home.php">My Files</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="account.php">Account</a>
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

    <div  align="center" id="bodyProper">
        <div class="file-container upload-box dropzone style-7" id="dropzone" style="overflow-y:auto;">
        
            <img src="img/upload_img.png" class="hidden floating" id="upload-img">

      <?php
      $folderName = md5($_SESSION['username']);
        // Opens directory
      $folder = md5($_SESSION['username']);
      
        if(is_dir("uploads/".$folder)){

        }else{
            mkdir("uploads/".$folder,0777,true);
        }
        $myDirectory=opendir("uploads/".$folder);
        
        // Gets each entry
        while($entryName=readdir($myDirectory)) {
          $dirArray[]=$entryName;
        }
        if(count($dirArray)<=4){
          print("
            
            <img src='img/upload_empty.png' class='floating' id='upload-empty'>
            <h1 id='container-header'>Upload Your First Document Today!</h1>
            
            <br>
            <div id='upload-form'>
                <input type='file' name='files[]' class='file-upload' accept='application/pdf'>
        <button class='browse btn btn-primary btn-xl' type='button' style='min-width:245px;font-size:18px;font-style:normal;'><i class='fa fa-cloud-upload'></i> Browse</button>
            <p>or <strong>drag & drop</strong> your files here.</p>
            </div>
            <script>
            var empty = true;
            </script>

            ");
        }else{

          echo "
          <script>
            var empty = false;
            </script>
          <h1 id='container-header'>Your Documents</h1>
              <table class='sortable' id='file-table'>
      <thead>
        <tr>
          <th>Filename</th>
          <th>Document Code</th>
          <th>Size <small>(bytes)</small></th>
          <th>Uploaded</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>";
        
        // Finds extensions of files
        function findexts ($filename) {
          $filename=strtolower($filename);
          $exts=split("[/\\.]", $filename);
          $n=count($exts)-1;
          $exts=$exts[$n];
          return $exts;
        }
        
        // Closes directory
        closedir($myDirectory);
        
        // Counts elements in array
        $indexCount=count($dirArray);
      
        // Sorts files
        sort($dirArray);
      
        // Loops through the array of files
       
        for($index=0; $index < $indexCount; $index++) {
        
          // Allows ./?hidden to show hidden files
          if($_SERVER['QUERY_STRING']=="hidden")
          {$hide="";
          $ahref="$dirArray[$index]";
          $atext="Hide";}
          else
          {$hide=".";
          $ahref="$dirArray[$index]";
          $atext="Show";}

          
          if(substr("$dirArray[$index]", 0, 1) != $hide) {
          
          // Gets File Names
          $name=$dirArray[$index];
          $namehref="uploads/".$folder."/".$dirArray[$index];
          
          // Gets Extensions 
          $extn=findexts("uploads/".$folder."/".$dirArray[$index]); 
          
          // Gets file size 
          $size=number_format(filesize("uploads/".$folder."/".$dirArray[$index]));
          
          // Gets Date Modified Data
          $modtime=date("M j Y g:i A", filemtime("uploads/".$folder."/".$dirArray[$index]));
          $timekey=date("YmdHis", filemtime("uploads/".$folder."/".$dirArray[$index]));
          
          // Prettifies File Types, add more to suit your needs.
          /*
          switch ($extn){
            case "png": $extn="PNG Image"; break;
            case "jpg": $extn="JPEG Image"; break;
            case "svg": $extn="SVG Image"; break;
            case "gif": $extn="GIF Image"; break;
            case "ico": $extn="Windows Icon"; break;
            
            case "txt": $extn="Text File"; break;
            case "log": $extn="Log File"; break;
            case "htm": $extn="HTML File"; break;
            case "php": $extn="PHP Script"; break;
            case "js": $extn="Javascript"; break;
            case "css": $extn="Stylesheet"; break;
            case "pdf": $extn="PDF Document"; break;
            
            case "zip": $extn="ZIP Archive"; break;
            case "bak": $extn="Backup File"; break;
            default: $extn=strtoupper($extn)." File"; break;
          }
          */

          // Separates directories
          if(is_dir($dirArray[$index])) {
            //$extn="&lt;Directory&gt;"; 
            $size="&lt;Directory&gt;"; 
            $class="dir";
          } else {
            $class="file";
          }
          
          
          // Cleans up . and .. directories 
          if($name=="."){$name=". (Current Directory)"; $extn="&lt;System Dir&gt;";}
          if($name==".."){$name=".. (Parent Directory)"; $extn="&lt;System Dir&gt;";}
          
          // Print 'em
          
          if($extn==="pdf"){
          $rCode = getFileCode($name);
          print("
          <tr class='$class'>
            <td><a href='./$namehref'>$name</a></td>
            <td><a href='#'>$rCode</a></td>
            <td><a href='./$namehref'>$size</a></td>
            <td sorttable_customkey='$timekey'><a href='./$namehref'>$modtime</a></td>
            <td><button onclick=delFile('".$name."','".$rCode."')  type='submit'style='margin-left:15px;padding:9px !important;background-color:rgba(0,0,0,0);color:#4484b1;' class='btn btn-primary'><i class='fa  fa-trash sr-icons'></i></button>
            
            </td>
          </tr>");

          }

          }else{

          }
        }
        }
      ?>
      </tbody>
    </table>       
    </div>
</div>
    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <script type="text/javascript">
    
        (function(){
            var dropzone = document.getElementById('dropzone');

            var displayUploads = function(data){
                
                    
                }
            

            var upload = function(files){
                var formData = new FormData(),
                xhr = new XMLHttpRequest(),
                x;

                for (x=0; x < files.length; x = x + 1){
                    formData.append('file[]',files[x]);
                }
                xhr.onload = function (){
                    var data = this.responseText.split(",");
                    //console.log(data);

                    if(data[0] == "success"){
                        //upload success
                        //alert("Upload success. ");
                        window.location.reload();
                    }else{
                        //upload fail?
                    }
                }

                xhr.open('post', 'functions/upload.php');
                xhr.send(formData);
            }
            dropzone.ondrop = function(e){
                e.preventDefault();
                this.className = 'upload-box ';
                $("#dropzone").hide();
                $("#bodyProper").append("  <br><br><div align='center' class='loader' id='loader-7'></div><br><h1>Updating Your Files</h1>");
                setTimeout(upload.bind(this, e.dataTransfer.files),1000);
            };

            dropzone.ondragover = function(){
                $("#container-header").html("Drop File To Upload");
                $("#file-table").hide();
                $("#upload-img").removeClass("hidden");
               // $("#container-header").css("color", "#fff");
                this.className = 'upload-box  dragover';
                if(empty){
                  
                  $("#upload-empty").addClass("hidden");
                  $("#upload-form").addClass("hidden");
                }
                
                return false;
            };

            dropzone.ondragleave = function(){
                $("#container-header").html("Your Documents");
                $("#file-table").show();
                $("#upload-img").addClass("hidden");
                //$("#container-header").css("color", "#333");
                this.className = 'upload-box ';
                if(empty){
                  $("#container-header").html("Upload Your First Document Today!");
                  
                  $("#upload-empty").removeClass("hidden");
                  $("#upload-form").removeClass("hidden");
                }
                
                return false;   
            };
            bodyProper.ondrop = function(e){
              e.preventDefault();
            }
        }());

        function delFile(filename,code){
          
          //alert(filename);
                  $.ajax({ // JQuery ajax function
                  type: "POST", // Submitting Method
                  url: 'functions/deletefile.php', // PHP processor
                  data: 'filename='+filename+"&code="+code, // the data that will be sent to php processor
                  dataType: "html", // type of returned data
                  success: function(data) { 
                    //do something

                    if(data=="removed"){
                      alert("File successfully deleted.");
                      window.location.reload();
                    }
                  }
                  });

        }
        //custom upload
        $(document).on('click', '.browse', function(){
  var file = $(this).parent().parent().parent().find('.file-upload');
  file.trigger('click');
});
$(document).on('change', '.file-upload', function(){
  $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
});
    </script>
    <style type="text/css">
        * {
    padding:0;
    margin:0;
}

body {
    color: #333;
    font: 14px Sans-Serif;
    padding: 50px;
    background: #eee;
}

h1 {
    text-align: center;
    padding: 20px 0 12px 0;
    margin: 0;
}
h2 {
    font-size: 16px;
    text-align: center;
    padding: 0 0 12px 0; 
}

#container {
    box-shadow: 0 5px 10px -5px rgba(0,0,0,0.5);
    position: relative;
    background: white; 
}

table {
    background-color: #F3F3F3;
    border-collapse: collapse;
    width: 100%;
    margin: 15px 0;
}

th {
    background-color: #4484b1;
    color: #FFF;
    cursor: pointer;
    padding: 15px 20px;
}

th small {
    font-size: 9px; 
}

td, th {
    text-align: left;
}

a {
    text-decoration: none;
}

td a {
    color: #345;
    display: block;
    padding: 15px 20px;
}
th a {
    padding-left: 0
}

td:first-of-type a {
    background: url('img/file.png') no-repeat 10px 50%;
    padding-left: 35px;
}
th:first-of-type {
    padding-left: 35px;
}

td:not(:first-of-type) a {
    background-image: none !important;
} 

tr:nth-of-type(odd) {
    background-color: #cee0ee;
}

tr:hover td {
    background-color:#98b4ca;
}

tr:hover td a {
    color: #000;
}
</style>
    

</body>

</html>
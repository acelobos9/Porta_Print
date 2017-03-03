<?php
session_start();

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
                <a class="navbar-brand page-scroll" href="#page-top">PortaPrint</a>
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
    <div align="center" >
        <div class="upload-box dropzone" id="dropzone">
            <h1><i class="fa fa-file-pdf-o" aria-hidden="true"></i>&nbsp;&nbsp;Drop it like its hot!</h1>
        </div>
    </div>
    <div  align="center">
        <div class="files-container">
            <h1>Files goes here</h1>
            <?php
            $folderName = md5($_SESSION['username']);
            ?>
               <table class="sortable">
      <thead>
        <tr>
          <th>Filename</th>
          <th>Type</th>
          <th>Size <small>(bytes)</small></th>
          <th>Date Modified</th>
        </tr>
      </thead>
      <tbody>
      <?php
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
          
          // Separates directories
          if(is_dir($dirArray[$index])) {
            $extn="&lt;Directory&gt;"; 
            $size="&lt;Directory&gt;"; 
            $class="dir";
          } else {
            $class="file";
          }
          
          // Cleans up . and .. directories 
          if($name=="."){$name=". (Current Directory)"; $extn="&lt;System Dir&gt;";}
          if($name==".."){$name=".. (Parent Directory)"; $extn="&lt;System Dir&gt;";}
          
          // Print 'em
          print("
          <tr class='$class'>
            <td><a href='./$namehref'>$name</a></td>
            <td><a href='./$namehref'>$extn</a></td>
            <td><a href='./$namehref'>$size</a></td>
            <td sorttable_customkey='$timekey'><a href='./$namehref'>$modtime</a></td>
          </tr>");
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
                        window.alert("Upload success. Document ID: "+data[1]);

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
                upload(e.dataTransfer.files);
            };

            dropzone.ondragover = function(){
                this.className = 'upload-box  dragover';
                return false;
            };

            dropzone.ondragleave = function(){
                this.className = 'upload-box ';
                return false;   
            };

        }());
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
    background-color: #FE4902;
    color: #FFF;
    cursor: pointer;
    padding: 5px 10px;
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
    color: #663300;
    display: block;
    padding: 5px 10px;
}
th a {
    padding-left: 0
}

td:first-of-type a {
    background: url(./.images/file.png) no-repeat 10px 50%;
    padding-left: 35px;
}
th:first-of-type {
    padding-left: 35px;
}

td:not(:first-of-type) a {
    background-image: none !important;
} 

tr:nth-of-type(odd) {
    background-color: #E6E6E6;
}

tr:hover td {
    background-color:#CACACA;
}

tr:hover td a {
    color: #000;
}





/* icons for file types (icons by famfamfam) */

/* images */
table tr td:first-of-type a[href$=".jpg"], 
table tr td:first-of-type a[href$=".png"], 
table tr td:first-of-type a[href$=".gif"], 
table tr td:first-of-type a[href$=".svg"], 
table tr td:first-of-type a[href$=".jpeg"]
{background-image: url(./.images/image.png);}

/* zips */
table tr td:first-of-type a[href$=".zip"] 
{background-image: url(./.images/zip.png);}

/* css */
table tr td:first-of-type a[href$=".css"] 
{background-image: url(./.images/css.png);}

/* docs */
table tr td:first-of-type a[href$=".doc"],
table tr td:first-of-type a[href$=".docx"],
table tr td:first-of-type a[href$=".ppt"],
table tr td:first-of-type a[href$=".pptx"],
table tr td:first-of-type a[href$=".pps"],
table tr td:first-of-type a[href$=".ppsx"],
table tr td:first-of-type a[href$=".xls"],
table tr td:first-of-type a[href$=".xlsx"]
{background-image: url(./.images/office.png)}

/* videos */
table tr td:first-of-type a[href$=".avi"], 
table tr td:first-of-type a[href$=".wmv"], 
table tr td:first-of-type a[href$=".mp4"], 
table tr td:first-of-type a[href$=".mov"], 
table tr td:first-of-type a[href$=".m4a"]
{background-image: url(./.images/video.png);}

/* audio */
table tr td:first-of-type a[href$=".mp3"], 
table tr td:first-of-type a[href$=".ogg"], 
table tr td:first-of-type a[href$=".aac"], 
table tr td:first-of-type a[href$=".wma"] 
{background-image: url(./.images/audio.png);}

/* web pages */
table tr td:first-of-type a[href$=".html"],
table tr td:first-of-type a[href$=".htm"],
table tr td:first-of-type a[href$=".xml"]
{background-image: url(./.images/xml.png);}

table tr td:first-of-type a[href$=".php"] 
{background-image: url(./.images/php.png);}

table tr td:first-of-type a[href$=".js"] 
{background-image: url(./.images/script.png);}

/* directories */
table tr.dir td:first-of-type a
{background-image: url(./.images/folder.png);}
    </style>
    

</body>

</html>
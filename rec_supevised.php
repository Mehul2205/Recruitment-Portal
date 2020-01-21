<?php
require 'rec_server.php';
session_start();

$firstname=$_SESSION['name'];
$lastname=$_SESSION['lastname'];
$department=$_SESSION['department'];
$post=$_SESSION['post'];
$img_url="images/".$_SESSION['id'].".jpg";
if(!file_exists($img_url))
{
    $img_url = "images/generic.jpg";
}

if (isset($_POST['bachelors_students']))
{
    $sql="DELETE FROM `supervised` WHERE id='".$_SESSION['id']."';";
    $conn->query($sql);
    $bachelors_students = $_POST['bachelors_students'];
    $masters_students = $_POST['masters_students'];
    $doctoral_students = $_POST['doctoral_students'];
    $doctoral_students_sole = $_POST['doctoral_students_sole'];
    $doctoral_students_ps = $_POST['doctoral_students_ps'];
    $doctoral_students_cont = $_POST['doctoral_students_cont'];

    $stmt = $conn->prepare("INSERT INTO supervised (id, bachelors_students, masters_students, doctoral_students, doctoral_students_sole, doctoral_students_ps, doctoral_students_cont) VALUES (?,?,?,?,?,?,?);");
    $stmt->bind_param("sssssss", $_SESSION['id'], $bachelors_students, $masters_students, $doctoral_students, $doctoral_students_sole, $doctoral_students_ps, $doctoral_students_cont);
    $stmt->execute();
    //if (isset($_POST["submit"])){
        // Where the file is going to be stored
        $target_dir = "supervised_documents/";
        $filename = $_SESSION['id'];

        // $ext = pathinfo($_FILES['photograph']['name'], PATHINFO_EXTENSION);
        $temp_name = $_FILES['summary']['tmp_name'];
        $file = new SplFileInfo($_FILES['summary']['name']);
        $ext  = $file->getExtension();
        $path_filename_ext = $target_dir.$filename.".".$ext;
        move_uploaded_file($temp_name, $path_filename_ext);
    //}
    /*
    if (isset($_FILES["summary"]["name"])){
        // Where the file is going to be stored
        $target_dir = "supervised_documents/";
        $file = $_FILES['summary']['name'];
        $path = pathinfo($file);
        $filename = $_SESSION['id'];
        $temp_name = $_FILES['summary']['tmp_name'];
        $path_filename_ext = $target_dir.$filename."."."pdf";
        move_uploaded_file($temp_name,$path_filename_ext);
    }
    */
}
?>
<!DOCTYPE html>
<html lang="en" class=" "><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="scroll-viewwport" content="width=device-width, initial-scale=1">

    <title>Students Supervised</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="css/nprogress.css" rel="stylesheet">
    <link href="css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    
    <link href="css/select2.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md" cz-shortcut-listen="true">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
            <?php include "./rec_header.php" ?>

                <!-- page content -->
                <div class="right_col" role="main" style="min-height: 1087px;">
                    <div class="">
                        <div class="page-title">
                            <div class="title_left">
                                <h3>Students Supervised</h3>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Please provide your latest information for the post of <?php  echo " ".$post."(".$department.")" ?><br>You can add as many entries as you want.</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div class="jumbotron">
<form method="post" action="" enctype="multipart/form-data">
    
        
            <div class="form-group">
                <label for="id_bachelors_students">No. of Bachelors students supervised<span class="required">*</span></label>
                        <input class="form-control" id="id_bachelors_students" name="bachelors_students" type="number">
            </div>
        
    
        
            <div class="form-group">
                <labelfor="id_masters_students">No. of Masters students supervised<span class="required">*</span></label>
                    
                        <input class="form-control" id="id_masters_students" name="masters_students" type="number">
            </div>
        
    
        
            <div class="form-group">
                <label for="id_doctoral_students">No. of Ph.D. students supervised (total)<span class="required">*</span></label>
                        <input class="form-control" id="id_doctoral_students" name="doctoral_students" type="number">
            </div>
        
    
        
            <div class="form-group">
                <label for="id_doctoral_students_sole">No. of Ph.D. students supervised (sole)<span class="required">*</span></label>
                        <input class="form-control" id="id_doctoral_students_sole" name="doctoral_students_sole" type="number">
            </div>
        
    
        
            <div class="form-group">
                <label  for="id_doctoral_students_ps">No. of Ph.D. students supervised (principal supervisor)<span class="required">*</span></label>
               <input class="form-control" id="id_doctoral_students_ps" name="doctoral_students_ps" type="number">
            </div>
        
    
        
            <div class="form-group">
                <label for="id_doctoral_students_cont">No. of Ph.D. students supervised (continuing)<span class="required">*</span></label>
                        <input class="form-control" id="id_doctoral_students_cont" name="doctoral_students_cont" type="number">
            </div>
        
    
        
            <div class="form-group">
                <label for="id_summary">Summary</label>
                        <input class="form-control" id="id_summary" name="summary" type="file">
                    
                    
                        <p class="help-block"><small>Upload details of PhD, M.Tech., B.Tech. thesis/project guided in PDF format(within 10MB). This field is mandatory if you have supervised any student. The header of the pdf file must be 'Student Supervised'</small></p>
            </div>
        
    
    <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>                                        </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /page content -->
                </div>
            </div>

            <!-- jQuery -->

            <script src="js/jquery.min.js.download"></script>
            <!-- Bootstrap -->
            <script src="js/bootstrap.min.js.download"></script>
            <!-- FastClick -->
            <script src="js/fastclick.js.download"></script>
            <!-- NProgress -->
            <script src="js/nprogress.js.download"></script>
            <script src="js/jquery.easypiechart.min.js.download"></script>
            <script src="js/bootstrap-progressbar.min.js.download"></script>

            <script src="js/moment.min.js.download"></script>
            <script src="js/daterangepicker.js.download"></script>
            <script src="js/daterangepicker.js.download"></script>
            <script src="js/select2.full.min.js.download"></script>

            <!-- Custom Theme Scripts -->
            <script src="js/custom.min.js.download"></script>
            <script type="text/javascript">
            </script>
        </body>
        </html>
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

if(isset($_GET['title']))
{
    $title = $_GET['title'];
    $short_description = $_GET['short_description'];
    $url = $_GET['url'];
    $stmt = $conn->prepare("INSERT INTO elearning (id, title, short_description, url) VALUES (?,?,?,?);");
    $stmt->bind_param("ssss", $_SESSION['id'], $title, $short_description, $url);
    $stmt->execute();
}
?>
<!DOCTYPE html>
<html lang="en" class=" "><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="scroll-viewwport" content="width=device-width, initial-scale=1">

    <title>Elearning Material</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
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
                                <h3>Elearning Material</h3>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Please provide your latest information for the post of <?php  echo " ".$post."(".$department.")" ?><br>You can add as many entries as you want.</h2>
                                        <div class="clearfix"></div>
                                    </div>

                                    <?php
                                    $sql = "SELECT i, id, title, short_description, url FROM elearning WHERE id=".$_SESSION['id'];
                                    $result = $conn->query($sql);
                                    $i=1;
                                    if ($result->num_rows > 0) {
                                        // output data of each row

                                        while($row = $result->fetch_assoc()) {
                                            echo "<div class='bg-success'>";
                                            echo "<strong>Entry</strong>".$i."<br>";
                                            echo "<strong>title:</strong> ".$row['title'];
                                            echo "&nbsp <strong>short_description:</strong> ".$row['short_description'];
                                            echo "&nbsp <strong>url:</strong> ".$row['url'];
                                            echo "</div><br>";
                                            $i=$i+1;
                                        }

                                    }
                                    ?>

                                    <div class="x_content">
                                        <div class="jumbotron">
<form method="get">
        
            <div class="form-group">
                <label for="id_title">Title<span class="required">*</span></label>
                        <input class="form-control" id="id_title" maxlength="500" name="title" type="text">
            </div>
        
    
        
            <div class="form-group">
                <label for="id_short_description">Short description<span class="required">*</span></label>
                        <textarea class="form-control" cols="40" id="id_short_description" name="short_description" rows="10"></textarea>
            </div>
        
    
        
            <div class="form-group">
                <label for="id_url">URL</label>
                        <input class="form-control" id="id_url" maxlength="200" name="url" type="url">
            </div>
        
    
    <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a class="btn btn-danger" href="rec_clear.php?table=elearning">Clear</a>
            
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
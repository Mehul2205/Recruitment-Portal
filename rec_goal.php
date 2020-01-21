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
if(isset($_GET['stg_teaching']))
{
    $sql="DELETE FROM `goal` WHERE id='".$_SESSION['id']."';";
    $conn->query($sql);
    $stg_teaching = $_GET['stg_teaching'];
    $stg_research = $_GET['stg_research'];
    $ltg_teaching = $_GET['ltg_teaching'];
    $ltg_research = $_GET['ltg_research'];
    $stmt = $conn->prepare("INSERT INTO `goal` (`id`, `stg_teaching`, `stg_research`, `ltg_teaching`, `ltg_research` ) VALUES ( ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $_SESSION['id'], $stg_teaching, $stg_research, $ltg_teaching, $ltg_research );
    $stmt->execute();
}
$sql1 = "SELECT stg_teaching, stg_research, ltg_teaching, ltg_research FROM `goal` WHERE id='".$_SESSION['id']."';";
$result = $conn->query($sql1);
if($result->num_rows>0){
	while($row = $result->fetch_assoc()){
		    $stg_teaching1 = $row['stg_teaching'];
    		    $stg_research1 = $row['stg_research'];
    		    $ltg_teaching1 = $row['ltg_teaching'];
    		    $ltg_research1 = $row['ltg_research'];
	}
}else{
	    $stg_teaching1 = NULL;
	    $stg_research1 = NULL;
	    $ltg_teaching1 = NULL;
	    $ltg_research1 = NULL;
}

?>
<!DOCTYPE html>
<html lang="en" class=" "><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="scroll-viewwport" content="width=device-width, initial-scale=1">

    <title>Goals</title>

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
                                <h3>Your Goals</h3>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Please provide your latest information for the post of <?php  echo " ".$post."(".$department.")" ?></h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div class="jumbotron">
			<form>
				<div class="form-group">
				<label class="col-sm-6 control-label" for="id_stg_teaching">Short Term Teaching Goal</label>
				<textarea class="form-control" cols="40" id="id_stg_teaching" name="stg_teaching" rows="10" placeholder="<?php echo htmlspecialchars($stg_teaching1); ?>"></textarea>							</div>												
				<div class="form-group">
				<label class="col-sm-6 control-label" for="id_stg_research">Short Term Research Goal</label>
				<textarea class="form-control" cols="40" id="id_stg_research" name="stg_research" rows="10" placeholder="<?php echo htmlspecialchars($stg_research1); ?>"></textarea>							</div>
				<div class="form-group">
				<label class="col-sm-6 control-label" for="id_ltg_teaching">Long Term Teaching Goal</label>
				<textarea class="form-control" cols="40" id="id_ltg_teaching" name="ltg_teaching" rows="10" placeholder="<?php echo htmlspecialchars($ltg_teaching1); ?>"></textarea>							</div>												
				<div class="form-group">
				<label class="col-sm-6 control-label" for="id_ltg_research">Long Term Research Goal</label>
				<textarea class="form-control" cols="40" id="id_ltg_research" name="ltg_research" rows="10" placeholder="<?php echo htmlspecialchars($ltg_research1); ?>"></textarea>							</div>
				<p class="help-block"><small>All field must be within 500 characters. </small></p>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
			</div>
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
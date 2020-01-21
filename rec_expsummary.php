<?php
require 'rec_server.php';
session_start();

$firstname=$_SESSION['name'];
$lastname=$_SESSION['lastname'];
$img_url="images/".$_SESSION['id'].".jpg";
$department=$_SESSION['department'];
$post=$_SESSION['post'];
if(!file_exists($img_url))
{
    $img_url = "images/generic.jpg";
}

if(isset($_GET['experience_defense']))
{
    $sql="DELETE FROM `expsummary` WHERE id='".$_SESSION['id']."';";
    $conn->query($sql);
    $experience_defense = $_GET['experience_defense'];
    $experience_mtech = $_GET['experience_mtech'];
    $experience_phd = $_GET['experience_phd'];
    $ongoing_project = $_GET['ongoing_project'];
    $completed_project = $_GET['completed_project'];
    $teaching_lab = $_GET['teaching_lab'];
    $outreach_activity = $_GET['outreach_activity'];
    $description = $_GET['description'];
    $stmt = $conn->prepare("INSERT INTO `expsummary` (`id`, `experience_defense`, `experience_mtech`, `experience_phd`, `ongoing_project`, `completed_project`, `teaching_lab`, `outreach_activity`,`description`) VALUES (?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssssss", $_SESSION['id'], $experience_defense, $experience_mtech, $experience_phd, $ongoing_project, $completed_project, $teaching_lab, $outreach_activity,$description);
    $stmt->execute();

}

$sql1 = "SELECT experience_defense,experience_mtech,experience_phd,ongoing_project,completed_project,teaching_lab,outreach_activity,description FROM `expsummary` WHERE id='".$_SESSION['id']."';";
$result = $conn->query($sql1);
if($result->num_rows>0){
	while($row = $result->fetch_assoc()){
    $experience_defense1 = $row['experience_defense'];
    $experience_mtech1 = $row['experience_mtech'];
    $experience_phd1 = $row['experience_phd'];
    $ongoing_project1 = $row['ongoing_project'];
    $completed_project1 = $row['completed_project'];
    $teaching_lab1 = $row['teaching_lab'];
    $outreach_activity1 = $row['outreach_activity'];
    $description1 = $row['description'];
	}
}else{
    $experience_defense1 = NULL;
    $experience_mtech1 = NULL;
    $experience_phd1 = NULL;
    $ongoing_project1 = NULL;
    $completed_project1 = NULL;
    $teaching_lab1 = NULL;
    $outreach_activity1 = NULL;
    $description1 = NULL;
}

?>
<!DOCTYPE html>
<html lang="en" class=" "><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="scroll-viewwport" content="width=device-width, initial-scale=1">

    <title>Experience Summary</title>

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
                                <h3>Experience Summary</h3>
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
                <label for="id_experience_defense">Experience after PhD Defended</label>
                    
                        <input class="form-control" id="id_experience_defense" maxlength="120" name="experience_defense" type="text" placeholder="<?php echo htmlspecialchars($experience_defense1); ?>">
            </div>
        
    
        
            <div class="form-group">
                <label for="id_experience_mtech">Total Experience after obtaining M.Tech Degree (Not counting PhD enrolment period)</label>
                    
                        <input class="form-control" id="id_experience_mtech" maxlength="120" name="experience_mtech" type="text" placeholder="<?php echo htmlspecialchars($experience_mtech1); ?>">
            </div>
        
    
        
            <div class="form-group">
                <label for="id_experience_phd">Experience after PhD at the level you applied for or above in reputed University, R&amp;D Lab &amp; Relevant Industry(if applicable)</label>
                    
                        <input class="form-control" id="id_experience_phd" maxlength="120" name="experience_phd" type="text" placeholder="<?php echo htmlspecialchars($experience_phd1); ?>">
            </div>
        
    
        
            <div class="form-group">
                <label for="id_ongoing_project">No of ongoing sponsored project from Academia</label>
                    
                        <input class="form-control" id="id_ongoing_project" name="ongoing_project" type="number" value="<?php echo htmlspecialchars($ongoing_project1); ?>">
            </div>
        
    
        
            <div class="form-group">
                <label for="id_completed_project">No of completed sponsored project from Academia</label>
                    
                        <input class="form-control" id="id_completed_project" name="completed_project" type="number" value="<?php echo htmlspecialchars($completed_project1); ?>">
            </div>
        
    
        
            <div class="form-group">
                <label for="id_teaching_lab">No of experiments or computational project added to teaching lab where appropiate</label>
                    
                        <input class="form-control" id="id_teaching_lab" name="teaching_lab" type="number" value="<?php echo htmlspecialchars($teaching_lab1); ?>">
            </div>
        
    
        
            <div class="form-group">
                <label for="id_outreach_activity">No of Academic outreach activity equivalent to two self financed shortterm course</label>
                    
                        <input class="form-control" id="id_outreach_activity" name="outreach_activity" type="number" value="<?php echo htmlspecialchars($outreach_activity1); ?>">
            </div>
        				<div class="form-group">
					<label class="col-sm-6 control-label" for="id_description">Describe your last work experience</label>
					<textarea class="form-control" cols="40" id="id_description" name="description" rows="10" placeholder="<?php echo htmlspecialchars($description1); ?>"></textarea>									
					<p class="help-block"><small>This field must be within 2000 characters. In case you want to add more details add details in a separate page and attach it with application form</small></p>
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
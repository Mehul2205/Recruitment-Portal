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

if (isset($_POST['ug_core_course1']))
{
    $sql="DELETE FROM `subinterest` WHERE id='".$_SESSION['id']."';";
    $conn->query($sql);
    $ug_core_course1 = $_POST['ug_core_course1'];
    $ug_core_course2 = $_POST['ug_core_course2'];
    $ug_core_course3 = $_POST['ug_core_course3'];
    $ug_elective_course1 = $_POST['ug_elective_course1'];
    $ug_elective_course2 = $_POST['ug_elective_course2'];
    $ug_elective_course3 = $_POST['ug_elective_course3'];
    $pg_core_course1 = $_POST['pg_core_course1'];
    $pg_core_course2 = $_POST['pg_core_course2'];
    $pg_core_course3 = $_POST['pg_core_course3'];
    $pg_elective_course1 = $_POST['pg_elective_course1'];
    $pg_elective_course2 = $_POST['pg_elective_course2'];
    $pg_elective_course3 = $_POST['pg_elective_course3'];

    $stmt = $conn->prepare("INSERT INTO `subinterest` (`id`, `ug_core_course1`, `ug_core_course2`, `ug_core_course3`, `ug_elective_course1`, `ug_elective_course2`, `ug_elective_course3`, `pg_core_course1`, `pg_core_course2`, `pg_core_course3`, `pg_elective_course1`, `pg_elective_course2`, `pg_elective_course3`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssss", $_SESSION['id'], $ug_core_course1, $ug_core_course2, $ug_core_course3, $ug_elective_course1, $ug_elective_course2, $ug_elective_course3, $pg_core_course1, $pg_core_course2, $pg_core_course3, $pg_elective_course1, $pg_elective_course2, $pg_elective_course3);
    $stmt->execute();
    if ($_FILES["photograph"]["name"] != 0){
        // Where the file is going to be stored
        $target_dir = "images/";
        $file = $_FILES['photograph']['name'];
        $path = pathinfo($file);
        $filename = $_SESSION['id'];
        $ext = $path['extension'];
        $temp_name = $_FILES['photograph']['tmp_name'];
        $path_filename_ext = $target_dir.$filename.".".$ext;
        move_uploaded_file($temp_name,$path_filename_ext);
    }
}
$sql1 = "SELECT ug_core_course1, ug_core_course2, ug_core_course3, ug_elective_course1, ug_elective_course2, ug_elective_course3, pg_core_course1, pg_core_course2, pg_core_course3, pg_elective_course1, pg_elective_course2, pg_elective_course3 FROM `subinterest` WHERE id='".$_SESSION['id']."';";
$result = $conn->query($sql1);
if($result->num_rows>0){
	while($row = $result->fetch_assoc()){
    $ug_core_course11 = $row['ug_core_course1'];
    $ug_core_course21 = $row['ug_core_course2'];
    $ug_core_course31 = $row['ug_core_course3'];
    $ug_elective_course11 = $row['ug_elective_course1'];
    $ug_elective_course21 = $row['ug_elective_course2'];
    $ug_elective_course31 = $row['ug_elective_course3'];
    $pg_core_course11 = $row['pg_core_course1'];
    $pg_core_course21 = $row['pg_core_course2'];
    $pg_core_course31 = $row['pg_core_course3'];
    $pg_elective_course11 = $row['pg_elective_course1'];
    $pg_elective_course21 = $row['pg_elective_course2'];
    $pg_elective_course31 = $row['pg_elective_course3'];
	}
}else{
    $ug_core_course11 = NULL;
    $ug_core_course21 = NULL;
    $ug_core_course31 = NULL;
    $ug_elective_course11 =  NULL;
    $ug_elective_course21 = NULL;
    $ug_elective_course31 =  NULL;
    $pg_core_course11 =  NULL;
    $pg_core_course21 = NULL;
    $pg_core_course31 = NULL;
    $pg_elective_course11 = NULL;
    $pg_elective_course21 = NULL;
    $pg_elective_course31 =  NULL;

}

?>
<!DOCTYPE html>
<html lang="en" class=" "><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="scroll-viewwport" content="width=device-width, initial-scale=1">

	<title>Subjects Interested</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">

	<link href="css/select2.min.css" rel="stylesheet">

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
								<h3>Subjects of interests, which you would like to teach</h3>
							</div>
						</div>


						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="x_panel">
									<div class="x_title">
										<h2>Please provide your latest information for the post of <?php  echo $post."(".$department.")" ?></h2>
										<div class="clearfix"></div>
									</div>
									<div class="x_content">

										<div class="jumbotron">
											<form method="post" action="" enctype="multipart/form-data">
												<div class="form-group">
												<label for="id_ug_core_course1">At UG (B.Tech) Level: Core Courses (Three Options)</label>
												<input type="text" class="form-control" id="id_ug_core_course1" name="ug_core_course1" placeholder="<?php echo htmlspecialchars($ug_core_course11); ?>">
												<input type="text" class="form-control" id="id_ug_core_course2" name="ug_core_course2" placeholder="<?php echo htmlspecialchars($ug_core_course21); ?>">
												<input type="text" class="form-control" id="id_ug_core_course3" name="ug_core_course3" placeholder="<?php echo htmlspecialchars($ug_core_course31); ?>">
												</div>
												<div class="form-group">
												<label for="id_ug_elective_course1">At UG (B.Tech) Level: Elective Courses (Three Options)</label>
												<input type="text" class="form-control" id="id_ug_elective_course1" name="ug_elective_course1" placeholder="<?php echo htmlspecialchars($ug_elective_course11); ?>">
												<input type="text" class="form-control" id="id_ug_elective_course2" name="ug_elective_course2" placeholder="<?php echo htmlspecialchars($ug_elective_course21); ?>">
												<input type="text" class="form-control" id="id_ug_elective_course3" name="ug_elective_course3" placeholder="<?php echo htmlspecialchars($ug_elective_course31); ?>">
												</div>
												<div class="form-group">
												<label for="id_pg_core_course1">At PG/ Doctoral Level Level : Core Courses (Three Options)</label>
												<input type="text" class="form-control" id="id_pg_core_course1" name="pg_core_course1" placeholder="<?php echo htmlspecialchars($pg_core_course11); ?>">
												<input type="text" class="form-control" id="id_pg_core_course2" name="pg_core_course2" placeholder="<?php echo htmlspecialchars($pg_core_course21); ?>">
												<input type="text" class="form-control" id="id_pg_core_course3" name="pg_core_course3" placeholder="<?php echo htmlspecialchars($pg_core_course31); ?>">
												</div>
												<div class="form-group">
												<label for="id_pg_elective_course1">At PG/ Doctoral Level Level : Elective Courses (Three Options)</label>
												<input type="text" class="form-control" id="id_pg_elective_course1" name="ug_elective_course1" placeholder="<?php echo htmlspecialchars($ug_elective_course11); ?>">
												<input type="text" class="form-control" id="id_pg_elective_course2" name="ug_elective_course2" placeholder="<?php echo htmlspecialchars($ug_elective_course21); ?>">
												<input type="text" class="form-control" id="id_pg_elective_course3" name="ug_elective_course3" placeholder="<?php echo htmlspecialchars($ug_elective_course31); ?>">
												</div>
												<button type="submit" class="btn btn-primary">Submit</button>
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
		<script src="js/jquery.easypiechart.min.js.download"></script>
		<script src="js/bootstrap-progressbar.min.js.download"></script>

		<script src="js/moment.min.js.download"></script>
		<script src="js/daterangepicker.js.download"></script>
		<script src="js/daterangepicker.js.download"></script>
		<script src="js/select2.full.min.js.download"></script>

		<!-- Custom Theme Scripts -->
		<script src="js/custom.min.js.download"></script>
	</body>
</html>
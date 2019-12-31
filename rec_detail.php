<?php
require 'rec_server.php';
session_start();

$firstname=$_SESSION['name'];
$lastname=$_SESSION['lastname'];
//$img_url = glob ("images/".$_SESSION['id'].".*");
$img_url="images/".$_SESSION['id'].".jpg";
$department=$_SESSION['department'];
$post=$_SESSION['post'];

if(!file_exists($img_url))
{
    $img_url = "images/generic.jpg";
}

if (isset($_POST['placeofbirth']))
{
    $sql="DELETE FROM `personaldetails` WHERE id='".$_SESSION['id']."';";
    $conn->query($sql);
    $placeofbirth = $_POST['placeofbirth'];
    $fhname = $_POST['fhname'];
    $marital_status = $_POST['marital_status'];
    $Nationality = $_POST['Nationality'];
    $handicapped = $_POST['handicapped'];
    $religion = $_POST['religion'];
    $blood = $_POST['blood'];
    $mark = $_POST['mark'];
    $stmt = $conn->prepare("INSERT INTO `personaldetails` (`id`, `placeofbirth`, `fhname`, `marital_status`, `Nationality`, `handicapped`, `religion`, `blood`, `mark`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $_SESSION['id'], $placeofbirth, $fhname, $marital_status, $Nationality, $handicapped, $religion, $blood, $mark);
    $stmt->execute();
    //if (isset($_POST["submit"])){
        // Where the file is going to be stored
        $target_dir = "images/";
        $filename = $_SESSION['id'];

        // $ext = pathinfo($_FILES['photograph']['name'], PATHINFO_EXTENSION);
        $temp_name = $_FILES['photograph']['tmp_name'];
        $file = new SplFileInfo($_FILES['photograph']['name']);
        $ext  = $file->getExtension();
        $path_filename_ext = $target_dir."$filename".".".$ext;
        echo $path_filename_ext;
        move_uploaded_file($temp_name, $path_filename_ext);
        echo "done";
    //}
}
$sql1 = "SELECT placeofbirth, fhname, marital_status,Nationality, handicapped, religion, blood, mark FROM `personaldetails` WHERE id='".$_SESSION['id']."';";
$result = $conn->query($sql1);
if($result->num_rows>0){
	while($row = $result->fetch_assoc()){
    $placeofbirth1 = $row['placeofbirth'];
    $fhname = $row['fhname'];
    $marital_status1 = $row['marital_status'];
    $Nationality1 = $row['Nationality'];
    $handicapped1 = $row['handicapped'];
    $religion1 = $row['religion'];
    $blood1 = $row['blood'];
    $mark1 = $row['mark'];
	}
}else{
    $placeofbirth1 = NULL;
    $fhname = NULL;
    $marital_status1 = NULL;
    $Nationality1 = NULL;
    $handicapped1 = NULL;
    $religion1 = NULL;
    $blood1 = NULL;
    $mark1 = NULL;
}

?>
<!DOCTYPE html>
<html lang="en" class=" "><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="scroll-viewwport" content="width=device-width, initial-scale=1">

	<title>Personal Details</title>

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
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="#" class="site_title"><span>Application Portal</span></a>
                    </div>

                    <!-- menu profile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="<?php echo $img_url ?>" alt="Profile Picture" class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2><?php echo $firstname." ".$lastname?></h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <h3>Application Details</h3>
                            <ul class="nav side-menu">

                                <li><a id="menu_1"><i class="fa fa-user"></i> Personal Details <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">

                                        <li id="Application Details__Personal Details__Personal Details">
                                            <a href="rec_detail.php"></i> Personal Details</a>
                                        </li>


                                        <li id="Application Details__Personal Details__Contact">
                                            <a href="rec_contact.php"></i> Contact</a>
                                        </li>


                                        <li id="Application Details__Personal Details__Permanent Address">
                                            <a href="rec_permanent_add.php"></i> Permanent Address</a>
                                        </li>


                                        <li id="Application Details__Personal Details__Correspondence Address">
                                            <a href="rec_corr_add.php"></i> Correspondence Address</a>
                                        </li>

                                    </ul>
                                </li>


                                <li><a id="menu_2"><i class="fa fa-university"></i> Academic Qualification <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="">


                                        <li id="Application Details__Academic Qualification__Secondary Exam">
                                            <a href="rec_secondary.php"></i> Secondary Exam</a>
                                        </li>


                                        <li id="Application Details__Academic Qualification__Higher Secondary Exam">
                                            <a href="rec_higher_secondary.php"></i> Higher Secondary Exam</a>
                                        </li>


                                        <li id="Application Details__Academic Qualification__Bachelor&#39;s Degree">
                                            <a href="rec_bachelor.php"></i> Bachelor's Degree</a>
                                        </li>


                                        <li id="Application Details__Academic Qualification__Master&#39;s Degree">
                                            <a href="rec_master.php"></i> Master's Degree</a>
                                        </li>


                                        <li id="Application Details__Academic Qualification__PhD">
                                            <a href="rec_phd.php"></i> PhD</a>
                                        </li>


                                        <li id="Application Details__Academic Qualification__Other Degree/Diploma">
                                            <a href="rec_other.php"></i> Other Degree/Diploma</a></li>

                                        </ul>
                                    </li>


                                    <li><a id="menu_3"><i class="fa fa-wpforms"></i> Publications <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="">


                                            <li id="Application Details__Publications__Publication Summary">
                                                <a href="rec_psummary.php"></i> Publication Summary</a>
                                            </li>

                                        </ul>
                                    </li>


                                    <li><a id="menu_4"><i class="fa fa-industry"></i> Work Experience <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="">


                                            <li id="Application Details__Work Experience__Experience Summary">
                                                <a href="rec_expsummary.php"></i> Experience Summary</a>
                                            </li>


                                            <li id="Application Details__Work Experience__Work Experience">
                                                <a href="rec_wrok_experience.php"></i> Work Experience</a>
                                            </li>

                                        </ul>
                                    </li>


                                    <li><a id="menu_5"><i class="fa fa-wpforms"></i> Sponsored Projects <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="">


                                            <li id="Application Details__Sponsored Projects__Sponsored Projects">
                                                <a href="rec_spon_project.php"></i> Sponsored Projects</a>
                                            </li>

                                        </ul>
                                    </li>


                                    <li><a id="menu_6"><i class="fa fa-wpforms"></i> Other Achievements <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="">


                                            <li id="Application Details__Other Achievements__Awards">
                                                <a href="rec_awards.php"></i> Awards</a>
                                            </li>


                                            <li id="Application Details__Other Achievements__Scolarships">
                                                <a href="rec_scolarships.php"></i> Scolarships</a>
                                            </li>


                                            <li id="Application Details__Other Achievements__Recognition">
                                                <a href="rec_recognition.php"></i> Recognition</a>
                                            </li>

                                        </ul>
                                    </li>


                                    <li><a id="menu_7"><i class="fa fa-wpforms"></i> Patents <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="">


                                            <li id="Application Details__Patents__Patents">
                                                <a href="rec_patents.php"></i> Patents</a>
                                            </li>

                                        </ul>
                                    </li>


                                    <li><a id="menu_8"><i class="fa fa-wpforms"></i> Member of Professional Bodies <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="">


                                            <li id="Application Details__Member of Professional Bodies__Member of Professional Bodies">
                                                <a href="rec_members.php"></i> Member of Professional Bodies</a>
                                            </li>

                                        </ul>
                                    </li>


                                    <li><a id="menu_9"><i class="fa fa-wpforms"></i> Student Supervised <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="">


                                            <li id="Application Details__Student Supervised__Students Supervised">
                                                <a href="rec_supevised.php"></i> Students Supervised</a>
                                            </li>

                                        </ul>
                                    </li>


                                    <li><a id="menu_10"><i class="fa fa-wpforms"></i> Elearning Material <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="">


                                            <li id="Application Details__Elearning Material__Elearning Material">
                                                <a href="rec_elearning.php"></i> Elearning Material</a>
                                            </li>

                                        </ul>
                                    </li>


                                    <li><a id="menu_11"><i class="fa fa-wpforms"></i> References <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="">


                                            <li id="Application Details__References__References">
                                                <a href="rec_refrences.php"></i> References</a>
                                            </li>

                                        </ul>
                                    </li>


                                    <li><a id="menu_12"><i class="fa fa-wpforms"></i> Short term Courses Conducted <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="">


                                            <li id="Application Details__Short term Courses Conducted__Short term Courses">
                                                <a href="rec_stcourses.php"></i> Short term Courses</a>
                                            </li>

                                        </ul>
                                    </li>


                                    <li><a id="menu_13"><i class="fa fa-wpforms"></i> Outreach Activity <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="">


                                            <li id="Application Details__Outreach Activity__Outreach Activity">
                                                <a href="rec_outreach.php"></i> Outreach Activity</a>
                                            </li>

                                        </ul>
                                    </li>


                                    <li class="active"><a id="menu_14"><i class="fa fa-wpforms"></i> Additional Details <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="">


                                            <li id="Application Details__Additional Details__Additional Details">
                                                <a href="rec_add_details.php"></i> Additional Details</a>
                                            </li>

                                        </ul>
                                    </li>

                                    <li><a id="menu_15"><i class="fa fa-wpforms"></i>Additional Form<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="">


                                            <li id="Application Details__Additional_Form_Institute">
                                                <a href="rec_instactivity.php"></i> Institute Activities</a>
                                            </li>


                                            <li id="Application Details__Additional_Form_Department">
                                                <a href="rec_deprtactivity.php"></i> Department Activities</a>
                                            </li>


                                            <li id="Application Details__Additional_Form_Interest">
                                                <a href="rec_subinterest.php"></i> Subjects of Interest</a>
                                            </li>


                                            <li id="Application Details__Additional_Form_Goal">
                                                <a href="rec_goal.php"></i> Goals</a>
                                            </li>


                                            <li id="Application Details__Additional_Form_credit_point">
                                                <a href="rec_creditpoint.php"></i> Credit Point List</a>
                                            </li>

                                        </ul>
                                    </li>

                                    <li><a id="menu_16"><i class="fa fa-wpforms"></i> Fee Payment  <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="">
                                            <li id="Application Details__Additional Details__Additional Details">
                                                <a href="rec_payment.php"></i> Pay Fee</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li><a id="menu_17"><i class="fa fa-wpforms"></i> Print PDF Format <span class="fa fa-chevron-down"></span></a>

                                        <ul class="nav child_menu" style="">
                                            <li id="Application Details__Additional Details__Additional Details">
                                                <a href="rec_pdf_page.php"></i> Print PDF</a>
                                            </li>
                                        </ul>

                                    </li>
                                </ul>
                            </div>
                        </div>

						<!-- /sidebar menu -->

					</div>
				</div>

				<!-- top navigation -->

				<div class="top_nav">
					<div class="nav_menu">
						<nav>
							<div class="nav toggle">
								<a id="menu_toggle"><i class="fa fa-bars"></i></a>
							</div>

							<ul class="nav navbar-nav navbar-right">
								<li class="">
									<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										<?php echo $firstname." ".$lastname?>
										<span class=" fa fa-angle-down"></span>
									</a>
									<ul class="dropdown-menu dropdown-usermenu pull-right">
                                        <li>
                                            <a href="rec_logout.php">Log Out</a>
                                        </li>
									</ul>
								</li>


							</ul>
						</nav>
					</div>
				</div>

				<!-- /top navigation -->

				<!-- page content -->
				<div class="right_col" role="main" style="min-height: 1087px;">
					<div class="">
						<div class="page-title">
							<div class="title_left">
								<h3>Personal Details</h3>
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
													<label for="photograph">Photograph*</label>
													<input required type="file" class="form-control" id="photograph" name="photograph">
												</div>
												<div class="form-group">
													<label for="placeofbirth">Place of birth</label>
													<input type="text" class="form-control" id="placeofbirth" name="placeofbirth" placeholder="<?php echo htmlspecialchars($placeofbirth1); ?>">
												</div>
												<div class="form-group">
													<label for="fhname">Father/ Husband's Name</label>
													<input type="text" class="form-control" id="fhname" name="fhname" placeholder="<?php echo htmlspecialchars($fhname); ?>">
												</div>
												<div class="form-group">
													<label class="my-1 mr-2" for="marital_status">Martital Status</label>
													<select class="form-control my-1 mr-sm-2" id="marital_status" name="marital_status" value="<?php echo htmlspecialchars($marital_status1); ?>">
														<option value="married">Married</option>
														<option value="unmarried">Unmarried</option>
													</select>
												</div>
												<div class="form-group">
													<label class="my-1 mr-2" for="Nationality">Nationality</label>
													<select class="form-control my-1 mr-sm-2" id="Nationality" name="Nationality" value="<?php echo htmlspecialchars($Nationality1); ?>">
														<option value="Indian">Indian</option>
														<option value="Others">Others</option>
													</select>
												</div>
												<div class="form-group">
													<label class="my-1 mr-2" for="handicapped">Physically handicapped</label>
													<select class="form-control my-1 mr-sm-2" id="handicapped" name="handicapped" value="<?php echo htmlspecialchars($handicapped1); ?>">
														<option value="Yes">Yes</option>
														<option value="No">No</option>
													</select>
												</div>
												<div class="form-group">
													<label class="my-1 mr-2" for="religion">Religion</label>
													<select class="form-control my-1 mr-sm-2" id="religion" name="religion" value="<?php echo htmlspecialchars($religion1); ?>">
														<option value="Hindu" selected="selected">Hindu</option>
														<option value="Muslim">Muslim</option>
														<option value="Christian">Christian</option>
														<option value="Sikh">Sikh</option>
														<option value="Buddhist">Buddhist</option>
														<option value="Zorastrian">Zorastrian (Parsi)</option>
														<option value="Jain">Jain</option>
														<option value="Other">Other</option>
														<option value="None">None (Atheist)</option>
													</select>
												</div>
												<div class="form-group">
													<label class="my-1 mr-2" for="blood">Blood Group</label>
													<select class="form-control my-1 mr-sm-2" id="blood" name="blood" value="<?php echo htmlspecialchars($blood1); ?>">
														<option value="A+">A+</option>
														<option value="A-">A-</option>
														<option value="B+" selected="selected">B+</option>
														<option value="B-">B-</option>
														<option value="O+">O+</option>
														<option value="O-">O-</option>
														<option value="AB+">AB+</option>
														<option value="AB-">AB-</option>
														<option value="NA">Not Known</option>
													</select>
												</div>
												<div class="form-group">
													<label for="mark">Distinguishing mark</label>
													<input type="text" class="form-control" id="mark" name="mark" placeholder="<?php echo htmlspecialchars($mark1); ?>">
												</div>
												<button type="submit" class="btn btn-primary" id="submit" name="submit">Submit</button>
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
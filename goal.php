<?php
require 'server.php';
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
                                            <a href="detail.php"></i> Personal Details</a>
                                        </li>


                                        <li id="Application Details__Personal Details__Contact">
                                            <a href="contact.php"></i> Contact</a>
                                        </li>


                                        <li id="Application Details__Personal Details__Permanent Address">
                                            <a href="permanent_add.php"></i> Permanent Address</a>
                                        </li>


                                        <li id="Application Details__Personal Details__Correspondence Address">
                                            <a href="corr_add.php"></i> Correspondence Address</a>
                                        </li>

                                    </ul>
                                </li>


                                <li><a id="menu_2"><i class="fa fa-university"></i> Academic Qualification <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="">


                                        <li id="Application Details__Academic Qualification__Secondary Exam">
                                            <a href="secondary.php"></i> Secondary Exam</a>
                                        </li>


                                        <li id="Application Details__Academic Qualification__Higher Secondary Exam">
                                            <a href="higher_secondary.php"></i> Higher Secondary Exam</a>
                                        </li>


                                        <li id="Application Details__Academic Qualification__Bachelor&#39;s Degree">
                                            <a href="bachelor.php"></i> Bachelor's Degree</a>
                                        </li>


                                        <li id="Application Details__Academic Qualification__Master&#39;s Degree">
                                            <a href="master.php"></i> Master's Degree</a>
                                        </li>


                                        <li id="Application Details__Academic Qualification__PhD">
                                            <a href="phd.php"></i> PhD</a>
                                        </li>


                                        <li id="Application Details__Academic Qualification__Other Degree/Diploma">
                                            <a href="other.php"></i> Other Degree/Diploma</a></li>

                                        </ul>
                                    </li>


                                    <li><a id="menu_3"><i class="fa fa-wpforms"></i> Publications <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="">


                                            <li id="Application Details__Publications__Publication Summary">
                                                <a href="psummary.php"></i> Publication Summary</a>
                                            </li>

                                        </ul>
                                    </li>


                                    <li><a id="menu_4"><i class="fa fa-industry"></i> Work Experience <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="">


                                            <li id="Application Details__Work Experience__Experience Summary">
                                                <a href="expsummary.php"></i> Experience Summary</a>
                                            </li>


                                            <li id="Application Details__Work Experience__Work Experience">
                                                <a href="wrok_experience.php"></i> Work Experience</a>
                                            </li>

                                        </ul>
                                    </li>


                                    <li><a id="menu_5"><i class="fa fa-wpforms"></i> Sponsored Projects <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="">


                                            <li id="Application Details__Sponsored Projects__Sponsored Projects">
                                                <a href="spon_project.php"></i> Sponsored Projects</a>
                                            </li>

                                        </ul>
                                    </li>


                                    <li><a id="menu_6"><i class="fa fa-wpforms"></i> Other Achievements <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="">


                                            <li id="Application Details__Other Achievements__Awards">
                                                <a href="awards.php"></i> Awards</a>
                                            </li>


                                            <li id="Application Details__Other Achievements__Scolarships">
                                                <a href="scolarships.php"></i> Scolarships</a>
                                            </li>


                                            <li id="Application Details__Other Achievements__Recognition">
                                                <a href="recognition.php"></i> Recognition</a>
                                            </li>

                                        </ul>
                                    </li>


                                    <li><a id="menu_7"><i class="fa fa-wpforms"></i> Patents <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="">


                                            <li id="Application Details__Patents__Patents">
                                                <a href="patents.php"></i> Patents</a>
                                            </li>

                                        </ul>
                                    </li>


                                    <li><a id="menu_8"><i class="fa fa-wpforms"></i> Member of Professional Bodies <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="">


                                            <li id="Application Details__Member of Professional Bodies__Member of Professional Bodies">
                                                <a href="members.php"></i> Member of Professional Bodies</a>
                                            </li>

                                        </ul>
                                    </li>


                                    <li><a id="menu_9"><i class="fa fa-wpforms"></i> Student Supervised <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="">


                                            <li id="Application Details__Student Supervised__Students Supervised">
                                                <a href="supevised.php"></i> Students Supervised</a>
                                            </li>

                                        </ul>
                                    </li>


                                    <li><a id="menu_10"><i class="fa fa-wpforms"></i> Elearning Material <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="">


                                            <li id="Application Details__Elearning Material__Elearning Material">
                                                <a href="elearning.php"></i> Elearning Material</a>
                                            </li>

                                        </ul>
                                    </li>


                                    <li><a id="menu_11"><i class="fa fa-wpforms"></i> References <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="">


                                            <li id="Application Details__References__References">
                                                <a href="refrences.php"></i> References</a>
                                            </li>

                                        </ul>
                                    </li>


                                    <li><a id="menu_12"><i class="fa fa-wpforms"></i> Short term Courses Conducted <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="">


                                            <li id="Application Details__Short term Courses Conducted__Short term Courses">
                                                <a href="stcourses.php"></i> Short term Courses</a>
                                            </li>

                                        </ul>
                                    </li>


                                    <li><a id="menu_13"><i class="fa fa-wpforms"></i> Outreach Activity <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="">


                                            <li id="Application Details__Outreach Activity__Outreach Activity">
                                                <a href="outreach.php"></i> Outreach Activity</a>
                                            </li>

                                        </ul>
                                    </li>


                                    <li class="active"><a id="menu_14"><i class="fa fa-wpforms"></i> Additional Details <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="">


                                            <li id="Application Details__Additional Details__Additional Details">
                                                <a href="add_details.php"></i> Additional Details</a>
                                            </li>

                                        </ul>
                                    </li>

                                    <li><a id="menu_15"><i class="fa fa-wpforms"></i>Additional Form<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="">


                                            <li id="Application Details__Additional_Form_Institute">
                                                <a href="instactivity.php"></i> Institute Activities</a>
                                            </li>


                                            <li id="Application Details__Additional_Form_Department">
                                                <a href="deprtactivity.php"></i> Department Activities</a>
                                            </li>


                                            <li id="Application Details__Additional_Form_Interest">
                                                <a href="subinterest.php"></i> Subjects of Interest</a>
                                            </li>


                                            <li id="Application Details__Additional_Form_Goal">
                                                <a href="goal.php"></i> Goals</a>
                                            </li>


                                            <li id="Application Details__Additional_Form_credit_point">
                                                <a href="creditpoint.php"></i> Credit Point List</a>
                                            </li>

                                        </ul>
                                    </li>

                                    <li><a id="menu_16"><i class="fa fa-wpforms"></i> Fee Payment  <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="">
                                            <li id="Application Details__Additional Details__Additional Details">
                                                <a href="payment.php"></i> Pay Fee</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li><a id="menu_17"><i class="fa fa-wpforms"></i> Print PDF Format <span class="fa fa-chevron-down"></span></a>

                                        <ul class="nav child_menu" style="">
                                            <li id="Application Details__Additional Details__Additional Details">
                                                <a href="pdf_page.php"></i> Print PDF</a>
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
                                            <a href="logout.php">Log Out</a>
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
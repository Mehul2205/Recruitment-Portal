<?php
require 'server.php';
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


                                    <li><a id="menu_14"><i class="fa fa-wpforms"></i> Additional Details <span class="fa fa-chevron-down"></span></a>
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
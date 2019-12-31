<?php
require 'rec_server.php';
session_start();
$firstname=$_SESSION['name'];
$lastname=$_SESSION['lastname'];
$department=$_SESSION['department'];
$post=$_SESSION['post'];
$id=$_SESSION['id'];
$img_url="images/".$_SESSION['id'].".jpg";
if(!file_exists($img_url))
{
    $img_url = "images/generic.jpg";
}


if(isset($_GET['employer']))
{
$sql="INSERT INTO `workexperience` (`id`, `employer`, `address`, `designation`, `employment_type`, `govt`, `nagpur`, `joind`, `leaved`, `nature`, `last_salary`, `basic_pay`, `gp`, `level`) VALUES ('".$_SESSION['id']."', '".$_GET['employer']."', '".$_GET['address']."', '".$_GET['designation']."', '".$_GET['employment_type']."', '".$_GET['govt_servant']."', '".$_GET['iiitn_employee']."', '".$_GET['joining_date']."', '".$_GET['leaving_date']."', '".$_GET['nature_of_work']."', '".$_GET['last_salary_drawn']."', '".$_GET['basic_pay']."', '".$_GET['gp']."', '".$_GET['level']."')";
if ($conn->query($sql) === TRUE)
    {
        $location="rec_wrok_experience.php";
        echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL='.$location.'">';
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en" class=" "><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="scroll-viewwport" content="width=device-width, initial-scale=1">

    <title>Work Experience </title>

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
                                <h3>Work Experience</h3>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Please provide your latest information for the post of <?php  echo " ".$post."(".$department.")" ?><br> You can add as many entries as you want.</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <?php
                                        $sql = "SELECT i,id,employer,address,designation,employment_type,govt,nagpur,joind,leaved,nature,last_salary,basic_pay,gp,level FROM workexperience WHERE id=".$_SESSION['id'];
                                        $result = $conn->query($sql);
                                        $i=1;
                                        if ($result->num_rows > 0) {
                                            // output data of each row

                                            while($row = $result->fetch_assoc()) {
                                                echo "<div class='bg-success'>";
                                                echo "<strong>Entry</strong>".$i."<br>";
                                                echo "<strong>Employer:</strong> ".$row['employer'];
                                                echo "&nbsp <strong>Address:</strong> ".$row['address'];
                                                echo "&nbsp <strong>Designation:</strong> ".$row['designation'];
                                                echo "&nbsp <strong>Employed in Govt. Sector:</strong> ".$row['govt'];
                                                echo "&nbsp <strong>Employed in IIIT Nagpur: </strong>".$row['nagpur'];
                                                echo "&nbsp <strong>Joining Date:</strong> ".$row['joind'];
                                                echo "&nbsp <strong>Leaving Date:</strong> ".$row['leaved'];
                                                echo "&nbsp <strong>Nature of work:</strong> ".$row['nature'];
                                                echo "&nbsp <strong>Last salary drawn:</strong> ".$row['last_salary'];
                                                echo "&nbsp <strong>Basic pay:</strong> ".$row['basic_pay'];
                                                echo "&nbsp <strong>GP:</strong> ".$row['gp'];
                                                echo "&nbsp <strong>Level:</strong> ".$row['level'];
                                                echo "</div><br>";
                                                $i=$i+1;
                                            }

                                        }
                                    ?>



                                    <div class="x_content">
                                        <div class="jumbotron">
<form action="" method="GET">
        
            <div class="form-group">
                <labelfor="id_employer">Employer<span class="required">*</span></label>
                    
                        <input class="form-control" id="id_employer" maxlength="500" name="employer" type="text">
            </div>
        
    
        
            <div class="form-group">
                <label for="id_address">Address</label>
                    
                        <textarea class="form-control" cols="40" id="id_address" name="address" rows="10"></textarea>

                    
                        <p class="help-block"><small>Kindly provide full address of Employer</small></p>
            </div>
        
    
        
            <div class="form-group">
                <label for="id_designation">Designation<span class="required">*</span></label>
                    
                        <input class="form-control" id="id_designation" maxlength="100" name="designation" type="text">
            </div>
        
    
        
            <div class="form-group">
                <label for="id_employment_type">Employment type</label>
                    
                        <select class="form-control" id="id_employment_type" name="employment_type" tabindex="-1" aria-hidden="true">
<option value="Regular" selected="selected">Regular</option>
<option value="Temporary">Temporary</option>
<option value="Contractual">Contractual</option>
</select>
            </div>
        
    
        
            <div class="form-group">
                <label for="id_govt_servant">Employed in Govt. Sector</label>
                    
                        <input checked="checked" class="form-control" id="id_govt_servant" name="govt_servant" type="checkbox">
            </div>
        
    
        
            <div class="form-group">
                <label for="id_iiita_employee">Employed in IIIT Nagpur</label>
                    
                        <input checked="checked" class="form-control" id="id_iiitn_employee" name="iiitn_employee" type="checkbox">
            </div>
        
    
        
            <div class="form-group">
                <label for="id_joining_date">Joining date<span class="required">*</span></label>
                    
                        <input class="form-control" id="id_joining_date" name="joining_date" type="date" min="1950-01-01" max="2020-01-01">
            </div>
        
    
        
            <div class="form-group">
                <label for="id_leaving_date">Leaving date</label>
                    
                        <input class="form-control" id="id_leaving_date" name="leaving_date" type="date" min="1950-01-01" max="2020-01-01">
                    
                    
                        <p class="help-block"><small>Provide date of application if still working</small></p>
            </div>
        
    
        
            <div class="form-group">
                <label for="id_nature_of_work">Nature of work<span class="required">*</span></label>
                    
                        <input class="form-control" id="id_nature_of_work" maxlength="500" name="nature_of_work" type="text">
            </div>
        
    
        
            <div class="form-group">
                <label for="id_last_salary_drawn">Last salary drawn<span class="required">*</span></label>
                    
                        <input class="form-control" id="id_last_salary_drawn" maxlength="200" name="last_salary_drawn" type="text">
            </div>
        
    
        
            <div class="form-group">
                <label for="id_basic_pay">Basic pay</label>
                    
                        <input class="form-control" id="id_basic_pay" name="basic_pay" type="number">
                    
                    
                        <p class="help-block"><small>Applicable only for Govt Employee. Basic Pay should not include GP/AGP(if applicable)</small></p>
                    
            </div>
        
    
        
            <div class="form-group">
                <label for="id_gp">Gp</label>
                    
                        <input class="form-control" id="id_gp" name="gp" type="number">
                    
                    
                        <p class="help-block"><small>Applicable only for Govt Employee. Provide GP/AGP, if 6 CPC is followed</small></p>
                    
            </div>
        
    
        
            <div class="form-group">
                <label for="id_level">Level</label>
                    
                        <input class="form-control" id="id_level" name="level" type="number">

                        <p class="help-block"><small>Applicable only for Govt Employee. Provide level, if 7 CPC is followed</small></p>
            </div>
        
    
    <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a class="btn btn-danger" href="rec_clear.php?table=workexperience">Clear</a>
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
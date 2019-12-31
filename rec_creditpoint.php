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

    <title>Credit Point</title>

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
    <link href="css/cp.css" rel="stylesheet">
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
                                <h3>Credit Point List</h3>
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
                                            <h3>Recruitment Rules</h3>
                                            <br><br>
                                            <table class="table-hover thead-dark table-bordered"> 
                                                <tr>
                                                    <th>Desgination and Academic Grade Point</th>
                                                    <th>Essential Qualification</th>
                                                    <th>Essential Requirements</th>
                                                    <th>Cummulative Essential Credit Points</th>
                                                </tr>
                                                <tr>
                                                    <td>Assistant Professor PB-3 with Grade Pay of Rs.6000/-</td>
                                                    <td>Ph.D.</td>
                                                    <td>NIL</td>
                                                    <td>NIL</td>
                                                </tr>
                                                <tr>
                                                    <td>*Assistant Professor (On contract) PB-3 with Grade Pay of Rs.7000/</td>
                                                    <td>Ph.D.</td>
                                                    <td>01 year post Ph.D. experience of Teaching and Research in Institution of repute / Industry</td>
                                                    <td>10</td>
                                                </tr>
                                                <tr>
                                                    <td>Assistant Professor PB-3 with Grade Pay of Rs.8000/- with a minimum pay of Rs.30000/-</td>
                                                    <td>Ph.D.</td>
                                                    <td>03 years after Ph.D. or 06 years total teaching and research experience in reputed academic Institute / R&D Labs / relevant industry</td>
                                                    <td>20</td>
                                                </tr>
                                                <tr>
                                                    <td>Associate Professor PB-4 with Grade Pay of Rs.9500/- with a minimum pay of Rs.42800/- </td>
                                                    <td>Ph.D.</td>
                                                    <td>(6) years after Ph.D. of which atleast 3 years at the level of Assistant Professor with AGP Rs.8000/- Or (9) years total working experience, of which 3 years should be after Ph.D., with at least 3 years at the level of Assistant Professor with AGP Rs.8000/-</td>
                                                    <td>50</td>
                                                </tr>
                                                <tr>
                                                    <td>Professor PB-4 with Grade Pay of Rs.10500/- with minimum pay of Rs.48000/-</td>
                                                    <td>Ph.D.</td>
                                                    <td>10 years after Ph.D. or 13 years total working experience, out of which 07 years should be after Ph.D. At least 03 years at the level of Associate professor with AGP of Rs.9500/- or 04 years at the level of Associate Professor with AGP of Rs.9000/- or combination of Rs.9000/- and Rs.9500/- or equivalent in an Institution of repute / R&D lab or relevant industry.</td>
                                                    <td>80</td>
                                                </tr>
                                                <tr>
                                                    <td>Professor (HAG Scale) Rs.67000–79000</td>
                                                    <td>Ph.D.</td>
                                                    <td>Six years as Professor with AGP of Rs.10000/- or Rs.10500/- or a combination of Rs.10000/- and Rs.10500/- in an Institute of National Importance.</td>
                                                    <td>150</td>
                                                </tr>
                                            </table>
                                            <br><br><br>
                                            <h3>Credit Point System</h3>
                                            <br><br>
                                            <table class="table-hover thead-dark table-bordered">
                                                <tr>
                                                    <th>SNo.</th>
                                                    <th>Activity</th>
                                                    <th>Credit Points</th>
                                                </tr>
                                                <tr>
                                                    <td>1.</td>
                                                    <td>One external Sponsored R&D Projects completed or ongoing / Patent granted</td>
                                                    <td>8 / project or 8 / patent as inventor (In case of more than one person in a Project, the Principal Investigator gets 5 credit points and the rest to the divided equally among other members)</td>
                                                </tr>
                                                <tr>
                                                    <td>2.</td>
                                                    <td>Consultancy projects</td>
                                                    <td>2 Credit points @ Rs.5 lakhs of consultancy, subject to maximum of 10 Credit points</td>
                                                </tr>
                                                <tr>
                                                    <td>3.</td>
                                                    <td>Ph.D. completed (including thesis submitted cases)</td>
                                                    <td>8 per Ph.D. student. (In case there are more than one supervisor, then the Guide (1st Supervisor) gets 5 credit points per student and the rest to be divided equally among other supervisor(s))</td>
                                                </tr>
                                                <tr>
                                                    <td>4.</td>
                                                    <td>One Journal papers in SCI / Scopus (Paid Journals not allowed)</td>
                                                    <td>4 per paper since the last promotion. First author/Main supervisor will get 2 and rest will be divided among others.</td>
                                                </tr>
                                                <tr>
                                                    <td>5.</td>
                                                    <td>One Conference paper indexed in SCI / Scopus / Web of science Conference / any internationally renowned conference.</td>
                                                    <td>1 credit points/ paper up to a maximum of 10 credit points. First author / Main Supervisor will get 0.6 and rest will be divided among the rest.</td>
                                                </tr>
                                                <tr>
                                                    <td>6.</td>
                                                    <td>HOD, Dean, Chief Warden , Professor Incharge (Training & placement), Advisor (Estate), CVO, PI (Exam), TEQIP (Coordinator).</td>
                                                    <td>2 points per semester up to a max of 16 credits points since the last promotion.</td>
                                                </tr>
                                                <tr>
                                                    <td>7.</td>
                                                    <td>Warden, Assistant wardens, Associate Dean, Chairman / Convener institute academic committees, Faculty In charge Computer Center / IT Services / library / Admission / student activities and other institutional activities, </td>
                                                    <td>1 Credit / Semesters up to a maximum of 8 credits points since the last promotion.</td>
                                                </tr>
                                                <tr>
                                                    <td>8.</td>
                                                    <td>Chairman and Convener of different standing committee and special committee (Ex officio status will not be considered). Faculty in charges. (Each for one year duration) of different Units or equivalent</td>
                                                    <td>0.5 Credit / Semesters up to a max. of 3 credits points since the last promotion.</td>
                                                </tr>
                                                <tr>
                                                    <td>9.</td>
                                                    <td>Departmental activities identified by HOD like lab in charges, or department level committee for a min. period of one year.</td>
                                                    <td>0.5 Credit / Semesters up to a max of 3 credits points since the last promotion.</td>
                                                </tr>
                                                <tr>
                                                    <td>10.</td>
                                                    <td>Workshop / FDP / short term courses of min 05 working days duration offered as coordinator or convener</td>
                                                    <td>2 per course up to a maximum of 8 credits since the last promotion.</td>
                                                </tr>
                                                <tr>
                                                    <td>11.</td>
                                                    <td>For conducting national programs like GIAN etc. as course coordinator Program of 2 week duration</td>
                                                    <td>2 credit points per course up to a max of 4 credit points since the last promotion.</td>
                                                </tr>
                                                <tr>
                                                    <td>12.</td>
                                                    <td>National / International conference organized as Chairman / Secretary </td>
                                                    <td>3 per program up a max of 6 credits points since the last promotion.</td>
                                                </tr>
                                                <tr>
                                                    <td>13.</td>
                                                    <td>Length of service over and above the relevant minimum teaching experience required for a given cadre</td>
                                                    <td>2 credit points per year with maximum of 10 credit points since the last promotion.</td>
                                                </tr>
                                                <tr>
                                                    <td>14.</td>
                                                    <td>Theory Teaching of over and above 6 credit hrs. course</td>
                                                    <td>1 credits/credit hrs. up to a max of 6 credit points since the last promotion.</td>
                                                </tr>
                                                <tr>
                                                    <td>15.</td>
                                                    <td>PG Dissertation guided </td>
                                                    <td>0.5 credit points per project to a maximum of 10 points since the last promotion. </td>
                                                </tr>
                                                <tr>
                                                    <td>16.</td>
                                                    <td>UG Projects</td>
                                                    <td>0.25 credit points / project up to a maximum of 4 points since the last promotion</td>
                                                </tr>
                                                <tr>
                                                    <td>17.</td>
                                                    <td>Text/Reference Books published on relevant subjects from reputed international publishers</td>
                                                    <td>6 credit points per book up to a max. of 18 points since the last promotion.</td>
                                                </tr>
                                                <tr>
                                                    <td>18.</td>
                                                    <td>Text/ Reference book published on relevant subjects from reputed national publishers or book chapters in the books published by reputed international publishers</td>
                                                    <td>2 credit points / unit up to a max. of 6 points since the last promotion.</td>
                                                </tr>
                                                <tr>
                                                    <td>19.</td>
                                                    <td>Significant outreach Institute out Activities</td>
                                                    <td>1 credit points / activity up to a max of 4 credit points since the last promotion.</td>
                                                </tr>
                                            </table>
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
        <script type="text/javascript"></script>
    </body>
</html>
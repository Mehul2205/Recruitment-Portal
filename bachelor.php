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

if(isset($_GET['degree']))
{
    $degree = $_GET['degree'];
    $discipline = $_GET['discipline'];
    $institute = $_GET['institute'];
    $university = $_GET['university'];
    $year_passed = $_GET['year_passed'];
    $date_of_result = $_GET['date_of_result'];
    $marks = $_GET['marks'];

    $sql="DELETE FROM `bachelor` WHERE id='".$_SESSION['id']."';";
    $conn->query($sql);

    $stmt = $conn->prepare("INSERT INTO `bachelor` (`id`, `degree`, `discipline`, `institute`, `university`, `year_passed`, `date_of_result`, `marks`) VALUES (?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssss", $_SESSION['id'], $degree, $discipline, $institute, $university, $year_passed, $date_of_result, $marks);
    $stmt->execute();
}
$sql1 = "SELECT degree,discipline,institute,university,year_passed,date_of_result,marks FROM `bachelor` WHERE id='".$_SESSION['id']."';";
$result = $conn->query($sql1);
if($result->num_rows>0){
	while($row = $result->fetch_assoc()){
		$degree1 = $row['degree'];
		$discipline1 = $row['discipline'];
		$institute1 = $row['institute'];
		$university1 = $row['university'];
		$year_passed1 = $row['year_passed'];
		$date_of_result1 = $row['date_of_result'];
		$marks1 = $row['marks'];
	}
}else{
    $degree1 = NULL;
    $discipline1 = NULL;
    $institute1 = NULL;
    $university1 = NULL;
    $year_passed1 = NULL;
    $date_of_result1 = NULL;
    $marks1 = NULL;
}
?>
<!DOCTYPE html>
<html lang="en" class=" "><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="scroll-viewwport" content="width=device-width, initial-scale=1">

    <title>Bachelor's Degree</title>

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
                                <h3>Bachelor's Degree</h3>
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
<form method="get" action="">
    
        
            <div class="form-group">
                <label for="id_degree">Degree/Programme</label>
                <div>
                    
                        <input class="form-control" id="id_degree" maxlength="250" name="degree" type="text" placeholder="<?php echo htmlspecialchars($degree1); ?>">
                    
                    
                </div>
            </div>
        
    
        
            <div class="form-group">
                <label for="id_discipline">Discipline/Major</label>
                <div >
                    
                        <input class="form-control" id="id_discipline" maxlength="150" name="discipline" type="text" placeholder="<?php echo htmlspecialchars($discipline1); ?>">
                    
                    
                </div>
            </div>
        
    
        
            <div class="form-group">
                <label for="id_institute">Institution</label>
                <div >
                    
                        <input class="form-control" id="id_institute" maxlength="250" name="institute" type="text" placeholder="<?php echo htmlspecialchars($institute1); ?>">
                    
                    
                        <p class="help-block"><small>If you have directly enrolled in an university, kindly provide name of the university here</small></p>
                    
                </div>
            </div>
        
    
        
            <div class="form-group">
                <label for="id_university">University</label>
                <div >
                    
                        <input class="form-control" id="id_university" maxlength="250" name="university" type="text" placeholder="<?php echo htmlspecialchars($university1); ?>">
                    
                    
                </div>
            </div>
        
    
        
            <div class="form-group">
                <label for="id_year_passed">Year passed</label>
                    
                        <select class="form-control" id="id_year_passed" name="year_passed" tabindex="-1" aria-hidden="true" placeholder="<?php echo htmlspecialchars($year_passed1); ?>">
<option value="" selected="selected">---------</option>
<option value="1950">1950</option>
<option value="1951">1951</option>
<option value="1952">1952</option>
<option value="1953">1953</option>
<option value="1954">1954</option>
<option value="1955">1955</option>
<option value="1956">1956</option>
<option value="1957">1957</option>
<option value="1958">1958</option>
<option value="1959">1959</option>
<option value="1960">1960</option>
<option value="1961">1961</option>
<option value="1962">1962</option>
<option value="1963">1963</option>
<option value="1964">1964</option>
<option value="1965">1965</option>
<option value="1966">1966</option>
<option value="1967">1967</option>
<option value="1968">1968</option>
<option value="1969">1969</option>
<option value="1970">1970</option>
<option value="1971">1971</option>
<option value="1972">1972</option>
<option value="1973">1973</option>
<option value="1974">1974</option>
<option value="1975">1975</option>
<option value="1976">1976</option>
<option value="1977">1977</option>
<option value="1978">1978</option>
<option value="1979">1979</option>
<option value="1980">1980</option>
<option value="1981">1981</option>
<option value="1982">1982</option>
<option value="1983">1983</option>
<option value="1984">1984</option>
<option value="1985">1985</option>
<option value="1986">1986</option>
<option value="1987">1987</option>
<option value="1988">1988</option>
<option value="1989">1989</option>
<option value="1990">1990</option>
<option value="1991">1991</option>
<option value="1992">1992</option>
<option value="1993">1993</option>
<option value="1994">1994</option>
<option value="1995">1995</option>
<option value="1996">1996</option>
<option value="1997">1997</option>
<option value="1998">1998</option>
<option value="1999">1999</option>
<option value="2000">2000</option>
<option value="2001">2001</option>
<option value="2002">2002</option>
<option value="2003">2003</option>
<option value="2004">2004</option>
<option value="2005">2005</option>
<option value="2006">2006</option>
<option value="2007">2007</option>
<option value="2008">2008</option>
<option value="2009">2009</option>
<option value="2010">2010</option>
<option value="2011">2011</option>
<option value="2012">2012</option>
<option value="2013">2013</option>
<option value="2014">2014</option>
<option value="2015">2015</option>
<option value="2016">2016</option>
<option value="2017">2017</option>
<option value="2018">2018</option>
<option value="2019">2019</option>
<option value="2020">2020</option>
<option value="2021">2021</option>
</select>
            </div>
        
    
        
            <div class="form-group">
                <label for="id_date_of_result">Date of result</label>
                    
                        <input class="form-control" id="id_date_of_result" name="date_of_result" type="date" min="1950-01-01" max="2020-01-01" placeholder="<?php echo htmlspecialchars($date_of_result1); ?>">
                    
                    
                        <p class="help-block"><small>Only provide if your final result is not published yet.</small></p>
                    
            </div>
        
    
        
            <div class="form-group">
                <label for="id_marks">Percentage Score</label>
                    
                        <input class="form-control" id="id_marks" name="marks" step="0.01" type="number" placeholder="<?php echo htmlspecialchars($marks1); ?>">
                    
                    
                        <p class="help-block"><small>In case CGPA/DGPA is awarded please change it to percentage using norms of the awarding university. In case final result is not published yet, provide percentage score upto current semester.</small></p>
                    
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
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
    $funding_agency = $_GET['funding_agency'];
    $role = $_GET['role'];
    $other_investigators = $_GET['other_investigators'];
    $currency = $_GET['currency'];
    $cost = $_GET['cost'];
    $start_date = $_GET['start_date'];
    $completion_date = $_GET['completion_date'];
    $outcome = $_GET['outcome'];
    $stmt = $conn->prepare("INSERT INTO sponsored (id, title, funding_agency, role, other_investigators, currency, cost, start_date, completion_date, outcome) VALUES (?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssssss", $_SESSION['id'], $title, $funding_agency, $role, $other_investigators, $currency, $cost, $start_date, $completion_date, $outcome);
    $stmt->execute();
}
?>


<!DOCTYPE html>
<html lang="en" class=" "><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="scroll-viewwport" content="width=device-width, initial-scale=1">

    <title>Sponsored Projects</title>

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
                                <h3>Sponsored Projects</h3>
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
                                    $sql = "SELECT i, id, title, funding_agency, role, other_investigators, currency, cost, start_date, completion_date, outcome FROM sponsored WHERE id=".$_SESSION['id'];
                                    $result = $conn->query($sql);
                                    $i=1;
                                    if ($result->num_rows > 0) {
                                        // output data of each row

                                        while($row = $result->fetch_assoc()) {
                                            echo "<div class='bg-success'>";
                                            echo "<strong>Entry</strong>".$i."<br>";
                                            echo "<strong>title:</strong> ".$row['title'];
                                            echo "&nbsp <strong>funding_agency:</strong> ".$row['funding_agency'];
                                            echo "&nbsp <strong>role:</strong> ".$row['role'];
                                            echo "&nbsp <strong>other_investigators:</strong> ".$row['other_investigators'];
                                            echo "&nbsp <strong>currency: </strong>".$row['currency'];
                                            echo "&nbsp <strong>cost:</strong> ".$row['cost'];
                                            echo "&nbsp <strong>start_date:</strong> ".$row['start_date'];
                                            echo "&nbsp <strong>completion_date:</strong> ".$row['completion_date'];
                                            echo "&nbsp <strong>outcome:</strong> ".$row['outcome'];
                                            echo "</div><br>";
                                            $i=$i+1;
                                        }

                                    }
                                    ?>

                                    <div class="x_content">
                                        <div class="jumbotron">
<form>
    
        
            <div class="form-group">
                <label for="id_title">Title<span class="required">*</span></label>
                     
                        <input class="form-control" id="id_title" maxlength="500" name="title" type="text">
                         <p class="help-block"><small>Title of the Project</small></p>
                    
             </div>
        
    
        
            <div class="form-group">
                <label  for="id_funding_agency">Funding agency<span class="required">*</span></label>
                        <input class="form-control" id="id_funding_agency" maxlength="200" name="funding_agency" type="text">
            </div>
        
    
        
            <div class="form-group">
                <label for="id_role">Role<span class="required">*</span></label>
                    
                        <select class="form-control" id="id_role" name="role" tabindex="-1" aria-hidden="true">
<option value="PI" selected="selected">PI</option>
<option value="Co-PI">Co-PI</option>
</select>
            </div>
        
    
        
            <div class="form-group">
                <label for="id_other_investigators">Other investigators<span class="required">*</span></label>
                    
                        <textarea class="form-control" cols="40" id="id_other_investigators" name="other_investigators" rows="10"></textarea>
                        <p class="help-block"><small>Details of other investigator</small></p>
            </div>
        
    
        
            <div class="form-group">
                <label for="id_currency">Currency<span class="required">*</span></label>
                    
                        <input class="form-control" id="id_currency" maxlength="50" name="currency" type="text" value="INR">
            </div>
        
    
        
            <div class="form-group">
                <label for="id_cost">Cost<span class="required">*</span></label>
                        <input class="form-control" id="id_cost" name="cost" step="0.01" type="number">

                        <p class="help-block"><small>Cost of the project</small></p>
            </div>
        
    
        
            <div class="form-group">
                <label for="id_start_date">Start date<span class="required">*</span></label>
                    
                        <input class="form-control" id="id_start_date" name="start_date" type="date" min="1950-01-01" max="2020-01-01">
            </div>
        
    
        
            <div class="form-group">
                <label  for="id_completion_date">Completion date<span class="required">*</span></label>
                    
                        <input class="form-control" id="id_completion_date" name="completion_date" type="date" min="1950-01-01" max="2025-01-01">
                                            <p class="help-block"><small>Provide estimated completion date, if not completed.</small></p>
            </div>
        
    
        
            <div class="form-group">
                <label  for="id_outcome">Outcome of the Project<span class="required">*</span></label>
                    
                        <textarea class="form-control" cols="40" id="id_outcome" name="outcome" rows="10"></textarea>
            </div>
        
    
    <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a class="btn btn-danger" href="rec_clear.php?table=sponsored">Clear</a>
            
            
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
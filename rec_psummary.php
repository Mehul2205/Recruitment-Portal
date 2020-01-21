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

if (isset($_POST['non_sci_journals']))
{
    $sql="DELETE FROM `psummary` WHERE id='".$_SESSION['id']."';";
    $conn->query($sql);
    $non_sci_journals = $_POST['non_sci_journals'];
    $sci_journals = $_POST['sci_journals'];
    $sci_journals_phd = $_POST['sci_journals_phd'];
    $conference_papers = $_POST['conference_papers'];
    $book_chapters = $_POST['book_chapters'];
    $books = $_POST['books'];
    $invited_talks = $_POST['invited_talks'];
    $stmt = $conn->prepare("INSERT INTO psummary (id, non_sci_journals, sci_journals, sci_journals_phd, conference_papers, book_chapters, books, invited_talks) VALUES (?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssss", $_SESSION['id'], $non_sci_journals, $sci_journals, $sci_journals_phd, $conference_papers, $book_chapters, $books, $invited_talks);
    $stmt->execute();
    //if (isset($_POST["submit"])){
        // Where the file is going to be stored
        $target_dir = "publication_list/";
        $filename = $_SESSION['id'];

        // $ext = pathinfo($_FILES['photograph']['name'], PATHINFO_EXTENSION);
        $temp_name = $_FILES['publication_list']['tmp_name'];
        $file = new SplFileInfo($_FILES['publication_list']['name']);
        $ext  = $file->getExtension();
        $path_filename_ext = $target_dir.$filename.".".$ext;
        move_uploaded_file($temp_name, $path_filename_ext);
    //}
    /*
    if (isset($_FILES["publication_list"]["name"])){
        // Where the file is going to be stored
        $target_dir = "publication_list/";
        $file = $_FILES['publication_list']['name'];
        $path = pathinfo($file);
        $filename = $_SESSION['id'];
        $temp_name = $_FILES['publication_list']['tmp_name'];
        $path_filename_ext = $target_dir.$filename."."."pdf";
        move_uploaded_file($temp_name,$path_filename_ext);
    }*/
}

$sql1 = "SELECT non_sci_journals,sci_journals,sci_journals_phd,conference_papers,book_chapters,books,invited_talks FROM `psummary` WHERE id='".$_SESSION['id']."';";
$result = $conn->query($sql1);
if($result->num_rows>0){
	while($row = $result->fetch_assoc()){
   $non_sci_journals1 = $row['non_sci_journals'];
    $sci_journals1 = $row['sci_journals'];
    $sci_journals_phd1 = $row['sci_journals_phd'];
    $conference_papers1 = $row['conference_papers'];
    $book_chapters1 = $row['book_chapters'];
    $books1 = $row['books'];
    $invited_talks1 = $row['invited_talks'];

	}
}else{
   $non_sci_journals1 = NULL;
    $sci_journals1 = NULL;
    $sci_journals_phd1 = NULL;
    $conference_papers1 = NULL;
    $book_chapters1 = NULL;
    $books1 = NULL;
    $invited_talks1 = NULL;
}
?>
<!DOCTYPE html>
<html lang="en" class=" "><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="scroll-viewwport" content="width=device-width, initial-scale=1">

    <title>Publication Summary</title>

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
                                <h3>Publication Summary</h3>
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
<form method="post" enctype="multipart/form-data">
    
        
            <div class="form-group">
                <label for="id_non_sci_journals">No. of Non SCI Journal Articles</label>
                    
                        <input class="form-control" id="id_non_sci_journals" name="non_sci_journals" type="number" placeholder="<?php echo htmlspecialchars($non_sci_journals1); ?>">
                    
                    
            </div>
        
    
        
            <div class="form-group">
                <label for="id_sci_journals">No. of SCI Journal Articles</label>
                    
                        <input class="form-control" id="id_sci_journals" name="sci_journals" type="number" placeholder="<?php echo htmlspecialchars($sci_journals1); ?>">
                    
                    
            </div>
        
    
        
            <div class="form-group">
                <label  for="id_sci_journals_phd">No. of SCI Journal Articles after PhD</label>
                    
                        <input class="form-control" id="id_sci_journals_phd" name="sci_journals_phd" type="number" placeholder="<?php echo htmlspecialchars($sci_journals_phd1); ?>">
                    
                    
            </div>
        
    
        
            <div class="form-group">
                <label  for="id_conference_papers">No. of Conference Papers</label>
                    
                        <input class="form-control" id="id_conference_papers" name="conference_papers" type="number" placeholder="<?php echo htmlspecialchars($conference_papers1); ?>">
                    
                    
            </div>
        
    
        
            <div class="form-group">
                <label  for="id_book_chapters">No. of Book Chapters</label>
                    
                        <input class="form-control" id="id_book_chapters" name="book_chapters" type="number" placeholder="<?php echo htmlspecialchars($book_chapters1); ?>">
                    
                    
            </div>
        
    
        
            <div class="form-group">
                <label  for="id_books">No. of Books</label>
                    
                        <input class="form-control" id="id_books" name="books" type="number" placeholder="<?php echo htmlspecialchars($books1); ?>">
                    
                    
            </div>
        
    
        
            <div class="form-group">
                <label  for="id_invited_talks">No. of Invited Talks</label>
                    
                        <input class="form-control" id="id_invited_talks" name="invited_talks" type="number" placeholder="<?php echo htmlspecialchars($invited_talks1); ?>">
                    
                    
            </div>
        
    
        
            <div class="form-group">
                <label  for="publication_list">Publication list</label>
                    
                        <input class="form-control" id="publication_list" name="publication_list" type="file">
                    
                    
                        <p class="help-block"><small>Upload your list of publication in PDF format(within 50MB). The header of the pdf file must be 'Publication Summary'</small></p>
                    
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
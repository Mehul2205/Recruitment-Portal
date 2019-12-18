<?php
require 'server.php';

$sql="CREATE TABLE `appdata`.`personaldetails` ( `id` INT NOT NULL , `placeofbirth` VARCHAR(100) NOT NULL , `fhname` VARCHAR(100) NOT NULL , `marital_status` VARCHAR(100) NOT NULL , `Nationality` VARCHAR(100) NOT NULL , `handicapped` VARCHAR(100) NOT NULL , `religion` VARCHAR(100) NOT NULL , `blood` VARCHAR(100) NOT NULL , `mark` VARCHAR(150) NOT NULL , UNIQUE `id` (`id`)) ENGINE = InnoDB;";
 if ($conn->query($sql) === FALSE)
 {
     echo "Database error 2". $conn->error;
 }

$sql="CREATE TABLE `appdata`.`contact` ( `id` INT NOT NULL , `emergency_phone_number` VARCHAR(200) NOT NULL , `alternate_email` VARCHAR(200) NOT NULL , UNIQUE `id` (`id`)) ENGINE = InnoDB;";
 if ($conn->query($sql) === FALSE)
 {
     echo "Database error 2". $conn->error;
 }
$sql="CREATE TABLE `appdata`.`details` ( `id` INT NOT NULL AUTO_INCREMENT , `firstname` TEXT NOT NULL , `middlename` TEXT NULL , `lastname` TEXT NOT NULL , `dob` DATE NOT NULL , `gender` VARCHAR(50) NOT NULL , `category` VARCHAR(150) NOT NULL , `res_category` VARCHAR(150) NOT NULL , `email` VARCHAR(150) NOT NULL , `phone` VARCHAR(20) NOT NULL , `password` VARCHAR(100) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
if ($conn->query($sql) === FALSE)
 {
     echo "Database error 3". $conn->error;
 }

$sql="ALTER TABLE `details` ADD `department` VARCHAR(200) NOT NULL AFTER `password`;";

 if ($conn->query($sql) === FALSE)
 {
     echo "Database error 3". $conn->error;
 }
 $sql="ALTER TABLE `details` ADD `post` VARCHAR(200) NOT NULL AFTER `department`;";
  if ($conn->query($sql) === FALSE)
 {
     echo "Database error 3". $conn->error;
 }

 $sql="CREATE TABLE `appdata`.`paddress` ( `id` INT NOT NULL , `address_line1` VARCHAR(200) NOT NULL , `address_line2` VARCHAR(200) NOT NULL , `city` VARCHAR(200) NOT NULL , `pincode` VARCHAR(200) NOT NULL , `district` VARCHAR(200) NOT NULL , `state` VARCHAR(200) NOT NULL , UNIQUE `id` (`id`)) ENGINE = InnoDB;";

if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}

$sql="CREATE TABLE `appdata`.`caddress` ( `id` INT NOT NULL , `address_line1` VARCHAR(200) NOT NULL , `address_line2` VARCHAR(200) NOT NULL , `city` VARCHAR(200) NOT NULL , `pincode` VARCHAR(200) NOT NULL , `district` VARCHAR(200) NOT NULL , `state` VARCHAR(200) NOT NULL , `specialization1` VARCHAR(100) NOT NULL , `specialization2` VARCHAR(100) NOT NULL , `specialization3` VARCHAR(100) NOT NULL , UNIQUE `id` (`id`)) ENGINE = InnoDB;";

if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}

$sql="CREATE TABLE `appdata`.`secondary` ( `id` INT NOT NULL , `degree` VARCHAR(200) NOT NULL , `discipline` VARCHAR(200) NOT NULL , `institute` VARCHAR(200) NOT NULL , `university` VARCHAR(200) NOT NULL , `year_passed` VARCHAR(200) NOT NULL , `date_of_result` VARCHAR(200) NOT NULL , `marks` VARCHAR(200) NOT NULL , UNIQUE `id` (`id`)) ENGINE = InnoDB;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}
$sql="CREATE TABLE `appdata`.`hsecondary` ( `id` INT NOT NULL , `degree` VARCHAR(200) NOT NULL , `discipline` VARCHAR(200) NOT NULL , `institute` VARCHAR(200) NOT NULL , `university` VARCHAR(200) NOT NULL , `year_passed` VARCHAR(200) NOT NULL , `date_of_result` VARCHAR(200) NOT NULL , `marks` VARCHAR(200) NOT NULL , UNIQUE `id` (`id`)) ENGINE = InnoDB;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}
$sql="CREATE TABLE `appdata`.`bachelor` ( `id` INT NOT NULL , `degree` VARCHAR(200) NOT NULL , `discipline` VARCHAR(200) NOT NULL , `institute` VARCHAR(200) NOT NULL , `university` VARCHAR(200) NOT NULL , `year_passed` VARCHAR(200) NOT NULL , `date_of_result` VARCHAR(200) NOT NULL , `marks` VARCHAR(200) NOT NULL , UNIQUE `id` (`id`)) ENGINE = InnoDB;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}
$sql="CREATE TABLE `appdata`.`masters` ( `id` INT NOT NULL , `degree` VARCHAR(200) NOT NULL , `discipline` VARCHAR(200) NOT NULL , `institute` VARCHAR(200) NOT NULL , `university` VARCHAR(200) NOT NULL , `year_passed` VARCHAR(200) NOT NULL , `date_of_result` VARCHAR(200) NOT NULL , `marks` VARCHAR(200) NOT NULL , UNIQUE `id` (`id`)) ENGINE = InnoDB;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}

$sql="CREATE TABLE `appdata`.`phd` ( `id` INT NOT NULL , `degree` VARCHAR(200) NOT NULL , `discipline` VARCHAR(200) NOT NULL , `institute` VARCHAR(200) NOT NULL , `university` VARCHAR(200) NOT NULL , `date_of_enrollment` VARCHAR(200) NOT NULL , `date_of_defense` VARCHAR(200) , `marks` VARCHAR(200) NOT NULL , UNIQUE `id` (`id`)) ENGINE = InnoDB;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}

$sql="CREATE TABLE `appdata`.`other` (`id` INT NOT NULL , `degree` VARCHAR(200) NOT NULL , `discipline` VARCHAR(200) NOT NULL , `institute` VARCHAR(200) NOT NULL , `university` VARCHAR(200) NOT NULL , `year_passed` VARCHAR(200) , `date_of_result` VARCHAR(200), `marks` VARCHAR(200) ) ENGINE = InnoDB;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}
$sql="ALTER TABLE `other` ADD `i` INT NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`i`);";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}
$sql="CREATE TABLE `appdata`.`workexperience` ( `id` INT NOT NULL , `employer` VARCHAR(1000) NOT NULL , `address` VARCHAR(2000) NOT NULL , `designation` VARCHAR(1000) NOT NULL , `govt` VARCHAR(1000) NOT NULL , `nagpur` VARCHAR(1000) NOT NULL , `joind` VARCHAR(1000) NOT NULL , `leaved` VARCHAR(1000) NOT NULL , `nature` VARCHAR(1000) NOT NULL , `last_salary` VARCHAR(1000) NOT NULL , `basic_pay` VARCHAR(1000) NOT NULL , `gp` VARCHAR(1000) NOT NULL , `level` VARCHAR(1000) NOT NULL ) ENGINE = InnoDB;";

if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}
$sql="ALTER TABLE `workexperience` ADD `employment_type` VARCHAR(100) NOT NULL AFTER `designation`;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}
$sql="ALTER TABLE `workexperience` ADD `i` INT NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`i`);";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}
$sql="CREATE TABLE `appdata`.`sponsored` ( `i` INT NOT NULL AUTO_INCREMENT , `id` INT NOT NULL , `title` VARCHAR(200) NOT NULL , `funding_agency` VARCHAR(200) NOT NULL , `role` VARCHAR(1000) NOT NULL , `other_investigators` VARCHAR(1000) NOT NULL , `currency` VARCHAR(200) NOT NULL , `cost` VARCHAR(150) NOT NULL , `start_date` VARCHAR(100 ) NOT NULL , `completion_date` VARCHAR(100) NOT NULL , `outcome` VARCHAR(1000) NOT NULL , PRIMARY KEY (`i`)) ENGINE = InnoDB;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}

$sql="CREATE TABLE `appdata`.`awards` ( `i` INT NOT NULL AUTO_INCREMENT , `id` INT NOT NULL , `title` VARCHAR(1000) NOT NULL , `issuing_agency` VARCHAR(1000) NOT NULL , `issuing_date` VARCHAR(100) NOT NULL , PRIMARY KEY (`i`)) ENGINE = InnoDB;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}

$sql="CREATE TABLE `appdata`.`scholarships` ( `i` INT NOT NULL AUTO_INCREMENT , `id` INT NOT NULL , `title` VARCHAR(1000) NOT NULL , `issuing_agency` VARCHAR(1000) NOT NULL , `issuing_date` VARCHAR(100) NOT NULL , PRIMARY KEY (`i`)) ENGINE = InnoDB;";

if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}

$sql="CREATE TABLE `appdata`.`Recognition` ( `i` INT NOT NULL AUTO_INCREMENT , `id` INT NOT NULL , `title` VARCHAR(1000) NOT NULL , `issuing_agency` VARCHAR(1000) NOT NULL , `issuing_date` VARCHAR(100) NOT NULL , PRIMARY KEY (`i`)) ENGINE = InnoDB;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}

$sql="CREATE TABLE `appdata`.`patents` ( `i` INT NOT NULL AUTO_INCREMENT , `id` INT NOT NULL , `title` VARCHAR(500) NOT NULL , `short_description` VARCHAR(1000) NOT NULL , `inventors` VARCHAR(500) NOT NULL , `country` VARCHAR(100) NOT NULL , `patent_number` VARCHAR(100) NOT NULL , `patent_issuing_date` VARCHAR(100) NOT NULL , `application_number` VARCHAR(100) NOT NULL , `status` VARCHAR(100) NOT NULL , PRIMARY KEY (`i`)) ENGINE = InnoDB;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}

$sql="CREATE TABLE `appdata`.`members` ( `i` INT NOT NULL AUTO_INCREMENT , `id` INT NOT NULL , `name` VARCHAR(500) NOT NULL , `membership_category` VARCHAR(100) NOT NULL , `start_date` VARCHAR(100) NOT NULL , `end_date` VARCHAR(100) NOT NULL , PRIMARY KEY (`i`)) ENGINE = InnoDB;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}

$sql="CREATE TABLE `appdata`.`stcourses` ( `i` INT NOT NULL AUTO_INCREMENT , `id` INT NOT NULL , `name` VARCHAR(200) NOT NULL , `short_description` VARCHAR(1000) NOT NULL , `start_date` VARCHAR(100) NOT NULL , `end_date` VARCHAR(100) NOT NULL , PRIMARY KEY (`i`)) ENGINE = InnoDB;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}

$sql="CREATE TABLE `appdata`.`outreach` ( `i` INT NOT NULL AUTO_INCREMENT , `id` INT NOT NULL , `name` VARCHAR(500) NOT NULL , `short_description` VARCHAR(1000) NOT NULL , `start_date` VARCHAR(100) NOT NULL , `end_date` VARCHAR(100) NOT NULL , PRIMARY KEY (`i`)) ENGINE = InnoDB;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}

$sql="CREATE TABLE `appdata`.`add_details` ( `id` INT NOT NULL , `description` INT NOT NULL , UNIQUE (`id`)) ENGINE = InnoDB;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}

$sql = "ALTER TABLE `add_details` CHANGE `description` `description` VARCHAR(2500) NOT NULL;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}


$sql="CREATE TABLE `appdata`.`elearning` ( `i` INT NOT NULL AUTO_INCREMENT , `id` INT NOT NULL , `title` VARCHAR(500) NOT NULL , `short_description` VARCHAR(2000) NOT NULL , `url` VARCHAR(500) NOT NULL , PRIMARY KEY (`i`)) ENGINE = InnoDB;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}

$sql="CREATE TABLE `appdata`.`expsummary` ( `id` INT NOT NULL , `experience_defense` VARCHAR(200) NOT NULL , `experience_mtech` VARCHAR(200) NOT NULL , `experience_phd` VARCHAR(200) NOT NULL , `ongoing_project` VARCHAR(200) NOT NULL , `completed_project` VARCHAR(200) NOT NULL , `teaching_lab` VARCHAR(200) NOT NULL , `outreach_activity` VARCHAR(200) NOT NULL, `description` VARCHAR(2500) NOT NULL , UNIQUE (`id`)) ENGINE = InnoDB;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}

$sql="CREATE TABLE `appdata`.`supervised` ( `id` INT NOT NULL , `bachelors_students` VARCHAR(250) NOT NULL , `masters_students` VARCHAR(250) NOT NULL , `doctoral_students` VARCHAR(250) NOT NULL , `doctoral_students_sole` VARCHAR(250) NOT NULL , `doctoral_students_ps` VARCHAR(250) NOT NULL , `doctoral_students_cont` VARCHAR(250) NOT NULL , UNIQUE (`id`)) ENGINE = InnoDB;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}

$sql="CREATE TABLE `appdata`.`references` ( `i` INT NOT NULL AUTO_INCREMENT , `id` INT NOT NULL , `name` VARCHAR(200) NOT NULL , `phone_number` VARCHAR(100) NOT NULL , `email` VARCHAR(100) NOT NULL , `address` VARCHAR(1000) NOT NULL , PRIMARY KEY (`i`)) ENGINE = InnoDB;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}

$sql="CREATE TABLE `appdata`.`psummary` ( `id` INT NOT NULL , `non_sci_journals` VARCHAR(100) NOT NULL , `sci_journals` VARCHAR(100) NOT NULL , `sci_journals_phd` VARCHAR(100) NOT NULL , `conference_papers` VARCHAR(100) NOT NULL , `book_chapters` VARCHAR(100) NOT NULL , `books` VARCHAR(100) NOT NULL , `invited_talks` VARCHAR(100) NOT NULL , UNIQUE (`id`)) ENGINE = InnoDB;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}

$sql="ALTER TABLE `patents` ADD `application_date` VARCHAR(100) NOT NULL AFTER `application_number`;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}
$sql = "ALTER TABLE `details` ADD `reg_no` VARCHAR(100) NOT NULL AFTER `post`";
if ($conn->query($sql) === FALSE)
{
    echo "Database error lololol". $conn->error;
}

$sql="CREATE TABLE `appdata`.`instactivity` ( `id` INT NOT NULL , `responsibility` VARCHAR(200) NOT NULL , `organisation` VARCHAR(200) NOT NULL ,  `start_date` DATE NOT NULL ,  `end_date` DATE NOT NULL , UNIQUE `id` (`id`)) ENGINE = InnoDB;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}
$sql="CREATE TABLE `appdata`.`deprtactivity` ( `id` INT NOT NULL , `responsibility` VARCHAR(200) NOT NULL , `organisation` VARCHAR(200) NOT NULL ,  `start_date` DATE NOT NULL ,  `end_date` DATE NOT NULL , UNIQUE `id` (`id`)) ENGINE = InnoDB;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}
$sql="CREATE TABLE `appdata`.`subinterest` ( `id` INT NOT NULL , `ug_core_course1` VARCHAR(200) NOT NULL , `ug_core_course2` VARCHAR(200) NOT NULL , `ug_core_course3` VARCHAR(200) NOT NULL , `ug_elective_course1` VARCHAR(200) NOT NULL , `ug_elective_course2` VARCHAR(200) NOT NULL , `ug_elective_course3` VARCHAR(200) NOT NULL , `pg_core_course1` VARCHAR(200) NOT NULL , `pg_core_course2` VARCHAR(200) NOT NULL , `pg_core_course3` VARCHAR(200) NOT NULL , `pg_elective_course1` VARCHAR(200) NOT NULL , `pg_elective_course2` VARCHAR(200) NOT NULL , `pg_elective_course3` VARCHAR(200) NOT NULL , UNIQUE `id` (`id`)) ENGINE = InnoDB;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}
$sql="CREATE TABLE `appdata`.`goal` ( `id` INT NOT NULL , `stg_teaching` VARCHAR(500) NOT NULL , `stg_research` VARCHAR(500) NOT NULL , `ltg_teaching` VARCHAR(500) NOT NULL , `ltg_research` VARCHAR(500) NOT NULL , UNIQUE `id` (`id`)) ENGINE = InnoDB;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}


echo date('YM');
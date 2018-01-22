<?php 

//General redirect page, used to bring users back to respective (student/teacher) homepage in case of error, or other event e.g. logging out 
session_start();
if ($_SESSION['teacher'] == 1){
    echo "<meta http-equiv='refresh' content='0; url=teacherPage.php'>";
} else if ($_SESSION['teacher'] == 0){
    echo "<meta http-equiv='refresh' content='0; url=studentPage.php'>";
 } else {
     echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}

?>





<?php 
//If user is logged in as student, will be redirected to student homepage 
session_start(); 
if($_SESSION['teacher'] == 0){
    echo "<meta http-equiv='refresh' content='0; url=studentPage.php'>";
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        Your Teacher ID is <?php echo $_SESSION['userID']?> 
    </body>
</html>

<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $servername = "mysql1.it.nuigalway.ie:3306/mydb3574";
        $username = "mydb3574i";
        $password = "mydb3574i";
        $dbname = "mydb3574";
        
        $email = $_POST["email"];
        $usrPword = $_POST["pword"];
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
        $sql = "SELECT password, email, userID, teacher, teacherID FROM usr_info WHERE email='$email'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

        if(password_verify($usrPword, $row['password'])) {
           //User ID session variable set to obtained value from database if password verifies
           //If teacher = false, redirected to student homepage, else redirected to teacher homepage 
            $_SESSION["userID"] = $row['userID'];
            $_SESSION["teacher"] = $row['teacher'];
            echo "<script type='text/javascript'>alert('Login Successful');</script>";
            if($_SESSION["teacher"] == 0){
               echo "<meta http-equiv='refresh' content='0; url=studentPage.php'>";
            } else {
                echo "<meta http-equiv='refresh' content='0; url=teacherPage.php'>";
            }
        } else {
            //Session destroyed and user returned back to home page if login details dont match 
            session_unset();
            session_destroy();
            //debug line
            //echo "Error: " . $sql . "<br>" . $conn->error;
            echo "<script type='text/javascript'>alert('Login Unsuccessful');</script>";
            echo "<meta http-equiv='refresh' content='0; url=signIn.php'>";
            }
        ?>
    </body>
</html>

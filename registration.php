
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
        
        //Creates hash from posted password to store in database 
        $pwordHash = password_hash($_POST["pword"], PASSWORD_DEFAULT);
  
        //If nothing passed from signUp page, teacherID post set to 'null' string to set as NULL in database entry
        if(empty($_POST['teacherID'])){
            $_POST['teacherID'] = 'NULL';
        }
        
        //If nothing recieved from post for teacher checkbox, set to 0. If anything is recieved, set to 1
        if(!isset($_POST['teacher'])){
            $_POST['teacher'] = 0;
        } else {
            $_POST['teacher'] = 1;
        }
         
        //Connect to database, create new tuple from posted data
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $sql = "INSERT INTO usr_info (password, userFirstName, userLastName, email, teacher, teacherID)
                VALUES('".$pwordHash."', '".$_POST["firstname"]."', '".$_POST["lastname"]."', '".$_POST["email"]."',".$_POST["teacher"].",".$_POST["teacherID"].")";
        
        //If user is created successfully, sends confirmation alert which redirects to sign in. If error occurs, user given error alert and redirected to homepage.
        if ($conn->query($sql) === TRUE) {
            echo "<script type='text/javascript'>alert('User Creation Successful! Proceeding to Sign In page...');</script>";
            echo "<meta http-equiv='refresh' content='0; url=signIn.php'>";
        } else {
           echo "<script type='text/javascript'>alert('User Creation Unsuccessful. This may be due to the email address already being used, or a site issue. Returning to homepage...');</script>";
           echo "<meta http-equiv='refresh' content='0; url=index.php'>";
           //Debug Line
           //echo "Error: " . $sql . "<br>" . $conn->error;
        }$conn->close();
        ?>
    </body>
</html>

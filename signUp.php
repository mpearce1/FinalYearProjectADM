<!DOCTYPE html>

<script>
    //Script disables TeacherID input if teacher checkbox is ticked, to prevent teachers being assigned to other teachers 
    function toggle(checkboxID, toggleID) {
     var checkbox = document.getElementById(checkboxID);
     var toggle = document.getElementById(toggleID);
     updateToggle = checkbox.checked ? toggle.disabled=true : toggle.disabled=false;
}
</script>

<html>
    <head>
        <title>Sign Up</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form action="registration.php" method="post">
        First name: <input type="text" name="firstname" value=""><br>
         Last name: <input type="text" name="lastname" value=""><br>
        Email:  <input type="text" name="email" value=""><br>
        Password: <input type="password" name="pword" value=""><br>
        Check this box if you want to be a Teacher: <input id="disabler" type="checkbox" name="teacher" onClick="toggle('disabler', 'disabled')"><br>
        Were you given an Teacher ID? Put it in here: <input id="disabled" type="number" name="teacherID"><br>
        <input type="submit" value="Submit"><br>
</form>
    </body>
</html>

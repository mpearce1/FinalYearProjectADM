<?php 
//If user is logged in as teacher, will be redirected to teacher homepage
session_start(); 
if($_SESSION['teacher'] == 1){
    echo "<meta http-equiv='refresh' content='0; url=teacherPage.php'>";
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <p><a href="LessonA.php?lessonCode=a1">Lesson 1</a></p>
        <p><a href="LessonA.php?lessonCode=a2">Lesson 2</a></p>
        <p><a href="LessonA.php?lessonCode=a3">Lesson 3</a></p>
    </body>
</html>

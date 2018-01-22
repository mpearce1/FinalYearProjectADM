<?php session_start() ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <style>
        body {
            background-color: lightgoldenrodyellow;
            font-family: helvetica;
        }
        .instructions{
            background: lightcyan;
            margin: auto;
            width: 25%;
            border: 2px solid green;
            padding: 5px;
            text-align: center;
        }
        .questionBox1{
            position: absolute;
            text-align: center;
            padding: 15px;
            top: 0px;
            left: 20px;
            
        }
        
        .questionBox2{  
            position: absolute;
            text-align: center;
            padding: 15px;
            top: 0px;
            right: 20px 
  
        }
        
        .questionBox3{
           
            position: absolute;
            text-align: center;
            padding: 15px;
            bottom: 50px;
            left: 20px 
  
        }
        
        .questionBox4{
             
            position: absolute;
            text-align: center;
            padding: 15px;
            bottom: 50px;
            right: 20px 
  
        }
    
        .img {
            border: 1px solid red;
            display: block;
            margin: auto;
            width: 35%;
            max-width:400px;
            max-height:381px;
        }
        
        .wrapper {
            text-align: center;
        }

        .button {
            position: relative;
            top: 50%; 
            font-size: 18px;
            padding: 10px;
            margin-top: 30px;
        }
        
        
    </style>
    
    <?php
        $servername = "mysql1.it.nuigalway.ie:3306/mydb3574";
        $username = "mydb3574i";
        $password = "mydb3574i";
        $dbname = "mydb3574";
        
        //lessonID identifies lesson type & iteration on database; A indicates type, 1 indicates iteration 
        $lessonCode = $_GET['lessonCode'];
        
        //Connects to database, pulls answers and image links using lessonCode, assigns to respective variables
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $sql = "SELECT qBox1Pic, qBox2Pic,  qBox3Pic, qBox4Pic, qBox1Ans, qBox2Ans, qBox3Ans, qBox4Ans FROM lesson_data WHERE lessonCode='$lessonCode'";
        $result = $conn->query($sql);
	$row = $result->fetch_assoc();
        
        $qBox1Pic = $row['qBox1Pic'];
        $qBox2Pic = $row['qBox2Pic'];
        $qBox3Pic = $row['qBox3Pic'];
        $qBox4Pic = $row['qBox4Pic'];
        $qBox1Ans = $row['qBox1Ans'];
        $qBox2Ans = $row['qBox2Ans'];
        $qBox3Ans = $row['qBox3Ans'];
        $qBox4Ans = $row['qBox4Ans'];
        
        //If error occurs with getting lesson info from database, user redirected away from page 
        if ($conn->query($sql) === FALSE) {
            //Debug Line
            //echo "Error: " . $sql . "<br>" . $conn->error;
            echo "<meta http-equiv='refresh' content='5; url=redirect.php'>";
            echo "<script type='text/javascript'>alert('There was an error generating this lesson. Returning to homepage...')/script>";
        }
        
        $conn->close();
      ?>
    
    <script>
        var onesolved = false;
        var twosolved = false;
        var threesolved = false;
        var foursolved = false;
            
    function validateAnswer(questionWord, responseNum) {
        var answer, text;
        answer = document.getElementById(responseNum).value;
        if(answer === questionWord){
            text = "Ceart!";
            var result = text.fontcolor("green");
        } else {
            text = "Mícheart...bain triail eile as!";
            var result = text.fontcolor("red");
        }
        
        if(responseNum === 1){
            document.getElementById("response1").innerHTML = result;
            } 
        else if (responseNum === 2){
            document.getElementById("response2").innerHTML = result;
        }
        else if (responseNum === 3){
            document.getElementById("response3").innerHTML = result;
        }
        else{
           document.getElementById("response4").innerHTML = result; 
        }
    }
    
     function validateQuiz() {
            
            if (onesolved, twosolved, threesolved, foursolved === true){
                ddocument.getElementById("quizResponse").innerHTML = "PLACEHOLDER** Now that all the questions are right you would normally proceed to next lesson.";
            }
            else{
                document.getElementById("quizResponse").innerHTML = "You must get all the questions right before you can proceed!";
            }
        }
    
    </script>
    <body>
        
        <div class='instructions'>
            <h1> Tráth na gCeist </h1>
            Líon na bearnaí seo thíos le hainmneacha na hainmhí!
            <br><br>
            <i>Nuair atá siad ceart agat, brú "Ar Aghaidh" chun teacht ar an chéad cheach eile!</i>
            <br><br>
        </div>
        
        <div class="wrapper">
        <button class="button" type="button" onclick="validateQuiz()">Ar Aghaidh!</button>
        <p id="quizResponse"></p>
        </div>
        
        <div class ="questionBox1">
            <img class="img" src= <?php echo $qBox1Pic;?> alt="Lesson 1">
            <input style="margin: 5px; padding: 5px;" type="text" id="1"><br>
            <button style="margin: 5px; padding: 5px;"  type="button" onclick="validateAnswer(<?php echo $qBox1Ans;?>, 1)">Lean ort!</button>
            <p id="response1"></p>
        </div>
        
        <div class ="questionBox2">
            <img class="img" src=<?php echo $qBox2Pic;?> alt="Lesson 2">
            <input style="margin: 5px; padding: 5px;" type="text" id="2"><br>
            <button style="margin: 5px; padding: 5px;"  type="button" onclick="validateAnswer(<?php echo $qBox2Ans;?>, 2)">Lean ort!</button>
            <p id="response2"></p>
        </div>
        
        <div class ="questionBox3">
            <img class="img" src=<?php echo $qBox3Pic;?> alt="Lesson 3">
            <input style="margin: 5px; padding: 5px;" type="text" id="3"><br>
            <button style="margin: 5px; padding: 5px;"  type="button" onclick="validateAnswer(<?php echo $qBox3Ans;?>, 3)">Lean ort!</button>
            <p id="response3"></p>
        </div>
        
        <div class ="questionBox4">
            <img class="img" src=<?php echo $qBox4Pic;?> alt="Lesson 4">
            <input style="margin: 5px; padding: 5px;" type="text" id="4"><br>
            <button style="margin: 5px; padding: 5px;"  type="button" onclick="validateAnswer(<?php echo $qBox4Ans;?>, 4)">Lean ort!</button>
            <p id="response4"></p>
        </div>
    </body>
</html>

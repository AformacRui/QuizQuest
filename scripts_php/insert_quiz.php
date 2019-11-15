<?php
include("head.php");
include("../scripts_php/connexion.php");

session_start();
if(isset($_SESSION['userName'])) {
  echo "Your session is running " . $_SESSION['userName'];
}
?>

<body>
<?php include("../template/header.php");?>

<div class="container-fluid d-flex ">

    <div class="form-container d-flex">
    <?php include("../template/main_nav_global.php"); ?>
            
            <div class="main-container">
            <div class="main-box">
            <form action="quiz_inserted.php" method="post" class="form_inserted">
                <h3>Insert your Quiz here</h1><br><br>

                <!-- <h5>Your Nickname:</h5> <input type="text" name="nickname"><br> -->
                <h5>Quiz name:</h5> <input type="text" name="qname"><br>
                <h5>Category:</h5><br><input class="rad" type="radio" name="cat" value="Maths">Maths<br>
                           <input class="rad" type="radio" name="cat" value="Cinema">Cinéma<br>
                           <input class="rad" type="radio" name="cat" value="Sport">Sport<br>
                           <input class="rad" type="radio" name="cat" value="Musique">Musique<br>
                           <input class="rad" type="radio" name="cat" value="Histoire">Histoire<br>
                           <input class="rad" type="radio" name="cat" value="Geographie">Géographie<br><br><br> 

                <?php  
                $max=10;
                $j=$max+1;
                for($i=0; $i<$max;$i++)
                    for($i=0 ; $i<$max ; $i++)
                    {   
                        $n=$i+1;
                        echo "$n. Question : <input type='text' name='$i' style='width: 70%; height:10%';> <br>";
                        echo "$n. Response : <input type='text' name='$j' style='width: 70%; height:10%'> <br><br>";
                        
                        $j++;
                    
                    }
                ?>

            <input type="submit">
            </form>
            </div>
            </div>
    </div>
</div>

    <div class="footer-container">
            <?php include("../template/footer.php"); ?>
        </div>


</body>
</html>




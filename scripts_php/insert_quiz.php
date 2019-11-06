<?php
include("head.php");
?>

<body>
<?php include("../template/header.php");?>

<div class="container-fluid d-flex ">

    <div class="form-container">
    <?php include("../template/main_nav.php"); ?>
            
            <div class="main-container">
            <div class="row">
            <form action="quiz_inserted.php" method="post" class="form_inserted">
                <span class="quizT">Insert your Quiz here<br><br></span>

                Your Nickname: <input type="text" name="nickname"><br>
                Quiz name: <input type="text" name="qname"><br>
                Category:<br> <input type="radio" name="cat" value="Maths">Maths<br>
                           <input type="radio" name="cat" value="Cinema">Cinéma<br>
                           <input type="radio" name="cat" value="Sport">Sport<br>
                           <input type="radio" name="cat" value="Musique">Musique<br>
                           <input type="radio" name="cat" value="Histoire">Histoire<br>
                           <input type="radio" name="cat" value="Geographie">Géographie<br><br><br> 

                <?php  
                $max=10;
                $j=$max+1;
                for($i=0; $i<$max;$i++)
                    for($i=0 ; $i<$max ; $i++)
                    {   
                        
                        echo "Question: <input type='text' name='$i'> <br>";
                        echo "Response: <input type='text' name='$j'> <br>";
                        
                        $j++;
                    
                    }
                ?>

            <a a href="index.php"><input type="submit"></a>
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




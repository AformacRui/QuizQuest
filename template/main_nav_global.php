<?php  
    include("../scripts_php/connexion.php");
    include("../function/CharQuizFunc.php"); 
?>

<ul id="menu-nav" class="align-self-center mr-3">
                <h1>Thèmes</h1>
            <li><a href="">Maths</a>
                <ul>
                    <?php 
                        $listitems1= chargequizmenu($TB_QUIZ,$conn,1,0);

                        //echo $listitems;
                        if($listitems1!==NULL){
                            foreach($listitems1 as $i=>$list)
                            {

                                echo "<li><a href='template/response.php'>$list</a></li>";
                            }
                        }


                    ?>
<!--                     <li><a href="#">Quizz 1</a></li>
                    <li><a href="#">Quizz 2</a></li>
                    <li><a href="#">Quizz 3</a></li>
                    <li><a href="#">Quizz 4</a></li> -->
                </ul>
            </li>
            <li><a href="">Cinéma</a>
                <ul>
                    <?php  $listitems2= chargequizmenu($TB_QUIZ,$conn,2,0);

                        //echo $listitems;
                        if($listitems2!==NULL){
                            foreach($listitems2 as $i=>$list)
                            {
                                echo "<li><a href='template/response.php'>$list</a></li>";
                            }
                            
                        } 
                        ?>

<!--                     <li><a href="#">Quizz 1</a></li>
                    <li><a href="#">Quizz 2</a></li>
                    <li><a href="#">Quizz 3</a></li>
                    <li><a href="#">Quizz 4</a></li> -->
                </ul>
            </li>
            <li><a href="">Sport</a>
                <ul>
                    <?php  $listitems3= chargequizmenu($TB_QUIZ,$conn,3,0);

                        //echo $listitems;
                        if($listitems3!==NULL){
                            foreach($listitems3 as $i=>$list)
                            {
                                echo "<li><a href='template/response.php'>$list</a></li>";
                            }
                        }
                ?>
<!--                     <li><a href="#">Quizz 1</a></li>
                    <li><a href="#">Quizz 2</a></li>
                    <li><a href="#">Quizz 3</a></li>
                    <li><a href="#">Quizz 4</a></li> -->
                </ul>
            </li>

            <li><a href="">Musique</a>
                <ul>
                    <?php
                     $listitems4= chargequizmenu($TB_QUIZ,$conn,4,0);

                        //echo $listitems;
                        if($listitems4!==NULL){
                            foreach($listitems4 as $i=>$list)
                            {
                                echo "<li><a href='template/response.php'>$list</a></li>";
                            }
                        }
                        ?>
                    <!-- <li><a href="#">Quizz 1</a></li>
                    <li><a href="#">Quizz 2</a></li>
                    <li><a href="#">Quizz 3</a></li>
                    <li><a href="#">Quizz 4</a></li> -->
                </ul>
            </li>
            <li><a href="">Histoire</a>
                <ul>
                <?php
                     $listitems5= chargequizmenu($TB_QUIZ,$conn,5,0);

                        //echo $listitems;
                        if($listitems5!==NULL){
                            foreach($listitems5 as $i=>$list)
                            {
                                echo "<li><a href='template/response.php'>$list</a></li>";
                            }
                        }
                        ?>
                    <!-- <li><a href="#">Quizz 1</a></li>
                    <li><a href="#">Quizz 2</a></li>
                    <li><a href="#">Quizz 3</a></li>
                    <li><a href="#">Quizz 4</a></li> -->
                </ul>
            </li>
            <li><a href="">Géographie</a>
                <ul>
                <?php
                     $listitems6= chargequizmenu($TB_QUIZ,$conn,6,0);

                        //echo $listitems;
                        if($listitems6!==NULL){
                            foreach($listitems6 as $i=>$list)
                            {
                                echo "<li><a href='template/response.php'>$list</a></li>";
                            }
                        }
                        ?>
                    <!-- <li><a href="#">Quizz 1</a></li>
                    <li><a href="#">Quizz 2</a></li>
                    <li><a href="#">Quizz 3</a></li>
                    <li><a href="#">Quizz 4</a></li> -->
                </ul>
            </li>
        </ul>
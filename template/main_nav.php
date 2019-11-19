<?php  
    include("scripts_php/connexion.php");
    include("function/CharQuizFunc.php"); 
    $listitems6=NULL;
?>

<ul id="menu-nav" class="align-self-center mr-3">
                <h1>Thèmes</h1>
            <li><a href="">Maths</a>
                <ul>
                    <?php 
                        $listitems1= chargequizmenu($TB_QUIZ,$conn,1,0);
                        $listitemsID1 = chargequizmenuID($TB_QUIZ,$conn,1,0);

                        //echo $listitems;
                        if($listitems1[0]!==NULL){
                            foreach($listitems1 as $i=>$list)
                            {
                                echo "<li><form action='../scripts_php/response.php' method='post'>";
                                echo "<input name='id_q' type='hidden' value='$listitemsID1[$i]'>";
                                echo "<input name='qname' type='submit' value='$list'>";
                                echo "</form></li>"; 

/*                                 echo "<li id='$listitemsID1[$i]' value='$listitemsID1[$i]'><a href='../template/response.php'>$list</a></li>";
                                 */
                            }
                            
                        }
                        else{
                            if($_SESSION['userName']=='visitor')
                            {
                                echo "<li><a href='../scripts_php/not_connected.php'>Create</a></li>";
                            }

                            else {
                                echo "<li><a href='../scripts_php/insert_quiz.php'>Create</a></li>";
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
                    <?php  
                        $listitems2= chargequizmenu($TB_QUIZ,$conn,2,0);
                        $listitemsID2 = chargequizmenuID($TB_QUIZ,$conn,2,0);

                        //echo $listitems;
                        if($listitems2[0]!==NULL){
                            foreach($listitems2 as $i=>$list)
                            {
                                echo "<li><form action='../scripts_php/response.php' method='post'>";
                                echo "<input name='id_q' type='hidden' value='$listitemsID2[$i]'>";
                                echo "<input name='qname' type='submit' value='$list'>";
                                echo "</form></li>"; 
                            }
                            
                        } 
                        else{
                            if($_SESSION['userName']=='visitor')
                            {
                                echo "<li><a href='../scripts_php/not_connected.php'>Create</a></li>";
                            }

                            else {
                                echo "<li><a href='../scripts_php/insert_quiz.php'>Create</a></li>";
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
                    <?php  
                        $listitems3= chargequizmenu($TB_QUIZ,$conn,3,0);
                        $listitemsID3 = chargequizmenuID($TB_QUIZ,$conn,3,0);

                        //echo $listitems;
                        if($listitems3[0]!==NULL){
                            foreach($listitems3 as $i=>$list)
                            {
                                echo "<li><form action='../scripts_php/response.php' method='post'>";
                                echo "<input name='id_q' type='hidden' value='$listitemsID3[$i]'>";
                                echo "<input name='qname' type='submit' value='$list'>";
                                echo "</form></li>"; 
                            }
                        }
                        else{
                            if($_SESSION['userName']=='visitor')
                            {
                                echo "<li><a href='../scripts_php/not_connected.php'>Create</a></li>";
                            }

                            else {
                                echo "<li><a href='../scripts_php/insert_quiz.php'>Create</a></li>";
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
                     $listitemsID4 = chargequizmenuID($TB_QUIZ,$conn,4,0);

                        //echo $listitems;
                        if($listitems4[0]!==NULL){
                            foreach($listitems4 as $i=>$list)
                            {
                                echo "<li><form action='../scripts_php/response.php' method='post'>";
                                echo "<input name='id_q' type='hidden' value='$listitemsID4[$i]'>";
                                echo "<input name='qname' type='submit' value='$list'>";
                                echo "</form></li>"; 
                            }
                        }
                        else{
                            if($_SESSION['userName']=='visitor')
                            {
                                echo "<li><a href='../scripts_php/not_connected.php'>Create</a></li>";
                            }

                            else {
                                echo "<li><a href='../scripts_php/insert_quiz.php'>Create</a></li>";
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
                     $listitemsID5 = chargequizmenuID($TB_QUIZ,$conn,5,0);

                        //echo $listitems;
                        if($listitems5[0]!==null){
                            foreach($listitems5 as $i=>$list)
                            {
                                echo "<li><form action='../scripts_php/response.php' method='post'>";
                                echo "<input name='id_q' type='hidden' value='$listitemsID5[$i]'>";
                                echo "<input name='qname' type='submit' value='$list'>";
                                echo "</form></li>"; 
                            }
                        }
                        else{
                            if($_SESSION['userName']=='visitor')
                            {
                                echo "<li><a href='../scripts_php/not_connected.php'>Create</a></li>";
                            }

                            else {
                                echo "<li><a href='../scripts_php/insert_quiz.php'>Create</a></li>";
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
                     $listitems6 = chargequizmenu($TB_QUIZ,$conn,6,0);
                     $listitemsID6 = chargequizmenuID($TB_QUIZ,$conn,6,0);
                     //var_dump($listitems6);

                        //echo $listitems;
                        if($listitems6[0]!==null){
                            foreach($listitems6 as $i=>$list)
                            {
                                echo "<li><form action='../scripts_php/response.php' method='post'>";
                                echo "<input name='id_q' type='hidden' value='$listitemsID6[$i]'>";
                                echo "<input name='qname' type='submit' value='$list'>";
                                echo "</form></li>"; 
                                
                            }
                        }

                        else{
                            if($_SESSION['userName']=='visitor')
                            {
                                echo "<li><a href='../scripts_php/not_connected.php'>Create</a></li>";
                            }

                            else {
                                echo "<li><a href='../scripts_php/insert_quiz.php'>Create</a></li>";
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
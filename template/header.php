<?php

if(isset($_SESSION['userName'])) 
{
    if($_SESSION['userName']!=="visitor"){


    $user = $_SESSION['userName'];
    $stmt = $conn->prepare("SELECT * FROM person where nickname = '$user'");
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach($stmt->fetchAll() as $k=>$v) {
            $perm=$v['User_type'];
    }
//var_dump($perm);
        if($perm=='Dev')
        {
        echo"<div class='header-container'>";
                echo "<header class='wrapper clearfix'>";
                echo "<a href='../index.php'><h1 class='title'>QuizQuest</h1></a>";
                    echo "<nav class='d-inline'>";
                        echo "<ul class='flex-column flex-sm-row'>";
                            echo "<li><a href='../scripts_php/logout.php' class='btn btn-default btn-lg' role='button' aria-pressed='true'><p>Logout</p></a></li>";
                            echo "<li><a href='../scripts_php/menage.php' class='btn btn-default btn-lg' role='button' aria-pressed='true'><p>Menage</p></a></li>";
                            echo "<li><a href='../scripts_php/insert_quiz.php' class='btn btn-default btn-lg' role='button' aria-pressed='true'><p>Q_Créateur</p></a></li>";
                        echo "</ul>";
                    echo "</nav>";
                echo "</header>";
            echo "</div>";

        }

    else {
        echo"<div class='header-container'>";
                    echo "<header class='wrapper clearfix'>";
                    echo "<a href='../index.php'><h1 class='title'>QuizQuest</h1></a>";
                        echo "<nav class='d-inline'>";
                            echo "<ul class='flex-column flex-sm-row'>";
                                echo "<li><a href='../scripts_php/logout.php' class='btn btn-default btn-lg' role='button' aria-pressed='true'><p>Logout</p></a></li>";
                                echo "<li><a href='../scripts_php/insert_quiz.php' class='btn btn-default btn-lg' role='button' aria-pressed='true'><p>Q_Créateur</p></a></li>";
                            echo "</ul>";
                        echo "</nav>";
                    echo "</header>";
                echo "</div>";
    }
}

else {
    echo"<div class='header-container'>";
            echo "<header class='wrapper clearfix'>";
            echo "<a href='../index.php'><h1 class='title'>QuizQuest</h1></a>";
                echo "<nav class='d-inline'>";
                    echo "<ul class='flex-column flex-sm-row'>";
                        echo "<li><a href='../scripts_php/login.php' class='btn btn-default btn-lg' role='button' aria-pressed='true'><p>Connexion</p></a></li>";
                        echo "<li><a href='../scripts_php/not_connected.php' class='btn btn-default btn-lg' role='button' aria-pressed='true'><p>Q_Créateur</p></a></li>";
                    echo "</ul>";
                echo "</nav>";
            echo "</header>";
        echo "</div>";
}

}
else {
    $_SESSION['userName'] = "visitor";
}

?>

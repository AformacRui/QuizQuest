<<<<<<< HEAD
<div class="header-container">
    <header class="wrapper clearfix">
    <a href="../index.php"><h1 class="title">QuizQuest</h1></a>
        <nav class="d-inline">
            <ul class="flex-column flex-sm-row">
                <li><a href="../scripts_php/login.php" class="btn btn-default btn-lg" role="button" aria-pressed="true"><p>Connexion</p></a></li>
                <li><a href="../scripts_php/insert_quiz.php" class="btn btn-default btn-lg" role="button" aria-pressed="true"><p>Q_Créateur</p></a></li>
            </ul>
        </nav>
    </header>
</div>
=======
<?php

$DB_USER='Herui';
$DB_PASSWORD='143OMG541ZINK';
$DB_HOST= 'localhost';
$DB_NAME='QuizQuest';

//conexion to server
$conn = new PDO("mysql:host=".$DB_HOST.";dbname=".$DB_NAME,$DB_USER,$DB_PASSWORD);

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

    else if($perm=='Admin' || $perm=='Usr'){
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
>>>>>>> abda4d5af3903e4c5153d73f41b343a3c1f76375

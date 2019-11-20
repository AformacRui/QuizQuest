<?php
session_start();
if(isset($_SESSION['userName'])) {
  echo "Your session is running " . $_SESSION['userName'];
}

include("head.php");
include("../scripts_php/connexion.php");
?>

<body>

    <?php include("../template/header.php");?>
    
    <div class="main-admin">
        <div class="sidebar">
        <img src="/images/Admin-Users.png" width="100px" height="100px">
            <ul>
                <li>Gestion utilisateur</li>
                <li>Gestion Quizz</li>
            </ul>
        </div>

        <div class="content">

            <h3>Hello Admin</h3>
            
        </div>
    </div>
    
</body>
</html>

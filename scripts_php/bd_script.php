<?php



include("connexion.php");



try{
    $cat = "CREATE TABLE IF NOT EXISTS $TB_Cat (
        ID_category int(3) AUTO_INCREMENT NOT NULL,
        Name_cat TEXT,
        PRIMARY KEY (ID_category)
        )";

        $conn->prepare($cat)->execute();
        echo " SUCCESS IN CATEGORY ";
}catch (PDOException $e) {
    echo 'ERROR IN CATEGORY : ' . $e->getMessage();
}


try{
    $quiz = "CREATE TABLE IF NOT EXISTS $TB_QUIZ (
        ID_quiz int(20) AUTO_INCREMENT NOT NULL,
        id_cat int(3),
        
        Nom varchar(250),
        Creator varchar(250),
        active int(1),
        PRIMARY KEY (ID_quiz),
        FOREIGN KEY (id_cat) references $TB_Cat(ID_category)
        )";

        $conn->prepare($quiz)->execute();
        echo " SUCCESS IN QUIZ ";
}catch (PDOException $e) {
    echo 'ERROR IN QUIZ : ' . $e->getMessage();
}


try{
    $ques = "CREATE TABLE IF NOT EXISTS $TB_Question (
        ID_question int(20) AUTO_INCREMENT NOT NULL,
        id_quiz INT(20),
        Question TEXT,
        PRIMARY KEY (ID_question),
        FOREIGN KEY (id_quiz) references $TB_QUIZ(ID_quiz)
        )";

        $conn->prepare($ques)->execute();
        echo " SUCCESS IN QUESTION ";
}catch (PDOException $e) {
    echo 'ERROR IN QUESTION : ' . $e->getMessage();
}


try{
    $res = "CREATE TABLE IF NOT EXISTS $TB_Response (
        ID_response int(20) AUTO_INCREMENT NOT NULL,
        id_quiz INT(20),
        Response TEXT,
        valor INT(1),
        PRIMARY KEY (ID_response),
        FOREIGN KEY (id_quiz) references $TB_QUIZ(ID_quiz)
        )";

        $conn->prepare($res)->execute();
        echo " SUCCESS IN RESPONSE ";
}catch (PDOException $e) {
    echo 'ERROR IN RESPONSE : ' . $e->getMessage();
}




try{
    $per = "CREATE TABLE IF NOT EXISTS $TB_per (
        ID_per int(20) AUTO_INCREMENT NOT NULL,
        Nickname TEXT,
        PassW varchar(255),
        User_type varchar(100),
        PRIMARY KEY (ID_per)
        )";

        $conn->prepare($per)->execute();
        echo " SUCCESS IN PERSONE ";
}catch (PDOException $e) {
    echo 'ERROR IN PAYS : ' . $e->getMessage();
}

try {
    $Per_qui = "CREATE TABLE IF NOT EXISTS $TB_person_quiz (
    ID_person INT(20) NOT NULL,
    ID_quiz INT(20) NOT NULL,
    PRIMARY KEY (ID_person,ID_quiz),
    FOREIGN KEY (ID_person) references $TB_per(ID_per),
    FOREIGN KEY (ID_quiz) references $TB_QUIZ(ID_quiz)
    )";
    
    $conn->prepare($Per_qui)->execute();
    echo " SUCCESS IN PERSONE_QUIZ ";
    
    }catch (PDOException $e) {
        echo 'ERROR IN PERSONE_QUIZ : ' . $e->getMessage();
    } 

  
    
    try {
    $cat1 = "INSERT INTO $TB_Cat (Name_cat)
    VALUES ('Maths')";
    $conn->prepare($cat1)->execute();
    echo 'MATH INSERTED';

    }catch (PDOException $e) {
        echo 'ERROR IN INSERT : ' . $e->getMessage();
    } 

    try {
        $cat2 = "INSERT INTO $TB_Cat (Name_cat)
        VALUES ('Cinema')";
        $conn->prepare($cat2)->execute();
        echo 'CINEMA INSERTED';
        
        }catch (PDOException $e) {
            echo 'ERROR IN INSERT : ' . $e->getMessage();
        } 

    try {
        $cat3 = "INSERT INTO $TB_Cat (Name_cat)
        VALUES ('Sport')";
        $conn->prepare($cat3)->execute();
        echo 'Sport INSERTED';
    }catch (PDOException $e) {
        echo 'ERROR IN INSERT : ' . $e->getMessage();
    } 

    try {
        $cat4 = "INSERT INTO $TB_Cat (Name_cat)
        VALUES ('Musique')";
        $conn->prepare($cat4)->execute();
        echo 'MUSIQUE INSERTED';
    }catch (PDOException $e) {
        echo 'ERROR IN INSERT : ' . $e->getMessage();
    } 

    try {
        $cat5 = "INSERT INTO $TB_Cat (Name_cat)
        VALUES ('Histoire')";
        $conn->prepare($cat5)->execute();
        echo 'HISTOIRE INSERTED';
    }catch (PDOException $e) {
        echo 'ERROR IN INSERT : ' . $e->getMessage();
    } 

    try {
        $cat6 = "INSERT INTO $TB_Cat (Name_cat)
        VALUES ('Geographie')";
        $conn->prepare($cat6)->execute();
        echo 'GEOGRAPHIE INSERTED';
    }catch (PDOException $e) {
        echo 'ERROR IN INSERT : ' . $e->getMessage();
    } 


    try {
        $dev1 = "INSERT INTO $TB_per (Nickname, PassW, User_type)
        VALUES ('AformacRui','DevPassUltimate','Dev')";
        $conn->prepare($dev1)->execute();
        echo 'DEV INSERTED';
    }catch (PDOException $e) {
        echo 'ERROR IN INSERT : ' . $e->getMessage();
    }

    try {
        $dev2 = "INSERT INTO $TB_per (Nickname, PassW, User_type)
        VALUES ('manogeek','DevPassUltimate','Dev')";
        $conn->prepare($dev2)->execute();
        echo 'DEV INSERTED';
    }catch (PDOException $e) {
        echo 'ERROR IN INSERT : ' . $e->getMessage();
    }


?>
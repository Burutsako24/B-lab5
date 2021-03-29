<?php 
    require("dbConnect.php");
    //var_dump($_POST);
    //var_dump($_GET);
    $manage_function = $_REQUEST["manage_function"];
    if($manage_function=="new-record"){        
        $mid = $_POST["majorID"];
        $mName = $_POST["majorName"];
        $sID = $_POST["schoolID"];

        $sql = "INSERT INTO Major(MID, Name, SchoolID) 
        VALUES ('$mid', '$mName', '$sID');";

        $result = $conn->query($sql);
        //header("location: URL" );
        header("location: http://localhost/itd62-276/Lab5/major-view.php" );
        exit(0);

    }else if($manage_function=="edit-record"){
        $mid = $_POST["majorID"];
        $mName = $_POST["majorName"];
        $sID = $_POST["schoolID"];

        $sql = "UPDATE major SET Name ='$mName',SchoolID = '$sID' WHERE MID ='$mid';";

        $result = $conn->query($sql);
        header("location: http://localhost/itd62-276/Lab5/major-view.php" );
        exit(0);
        //echo "edit-record";
        // UPDATE Major SET Name='' , SchoolID='' WHERE MID='1'
    }else if($manage_function=="delete-record"){
        $mid = $_GET["MID"];

        $sql = "DELETE from major where mid='$mid';";
        
        //echo $sql;
        //die();

        $result = $conn->query($sql);
        header("location: http://localhost/itd62-276/Lab5/major-view.php" );
        exit(0);
    }
?>
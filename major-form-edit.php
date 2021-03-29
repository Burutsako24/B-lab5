<?php 
    require("dbConnect.php");
    $mid = $_GET["MID"];
    $mnane = ""; $sid = "";
    $sql = "SELECT * FROM  major where MID='$mid' ";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
        $mnane = $row["Name"]; 
        $sid = $row["SchoolID"]; 
    }

    $sql = "    SELECT *  
                FROM  School ";
    $result = $conn->query($sql);
?>
<!DOCTYPE HTML>
<html> 
<body>
<form action="major-manage.php" method="post">
<input type="hidden" name="manage_function" value="edit-record">
   majorID: <input type="text" name="majorID" readonly value="<?=$mid?>"><br>
   Major Name: <input type="text" name=" majorName" value="<?=$mnane?>"><br>
   School: <select name="schoolID">
   <?php while($row = $result->fetch_assoc()) { $i++;?>
    <option <?=($row["SID"]==$sid)?"selected":""?> value="<?=$row["SID"]?>"><?=$row["Name"]?></option>
   <?php }?>
   </SELECT> <br>
   <input type="submit">
</form>
    <a href="major-view.php">
        <button class="w3-button w3-yellow">Yellow</button></a>
    <table id="table_show">

</body>
</html>

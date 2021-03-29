<?php 
    require("dbConnect.php");
    $sql = "    SELECT *  
                FROM  School ";
    $result = $conn->query($sql);
?>
<!DOCTYPE HTML>
<html> 
<body>
<form action="major-manage.php" method="post">
<input type="hidden" name="manage_function" value="new-record">
   majorID: <input type="text" name="majorID"><br>
   Major Name: <input type="text" name=" majorName"><br>
   School: <select name="schoolID">
   <?php while($row = $result->fetch_assoc()) { $i++;?>
    <option value="<?=$row["SID"]?>"><?=$row["Name"]?></option>
   <?php }?>
   </SELECT> <br>
   <input type="submit">
</form>
    <a href="major-view.php">
        <button class="w3-button w3-yellow">Yellow</button></a>
    <table id="table_show">

</body>
</html>

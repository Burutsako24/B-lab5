<?php 
    require("dbConnect.php");
    $sql = "    SELECT * FROM School ";
    $result = $conn->query($sql);
    $arr_school= array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) { 
            $arr_school[$row["SID"]] = $row["Name"];
        }
    }
    //var_dump($arr_school);
    //die();
    $sql = "    SELECT * FROM Major ";
    $result = $conn->query($sql);


?>
<!DOCTYPE HTML>
<html> 
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
    #table_show {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 80%;
    }

    #customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
    }

    #table_show tr:nth-child(even){background-color: #f2f2f2;}

    #table_show tr:hover {background-color: #ddd;}

    #table_show th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
    }
</style>
<body>
    <a href="major-form.php">
        <button class="w3-button w3-yellow">Yellow</button></a>
    <?php if ($result->num_rows > 0) { ?>
    <table id="table_show">
        <tr>
            <th>No</th>
            <th>ID</th>
            <th>Name</th>
            <th>School</th>
        </tr>
        <?php $i=0; while($row = $result->fetch_assoc()) { $i++;?>
            <tr>
                <td><?=$i?></td>
                <td><?=$row["MID"]?></td>
                <td><?=$row["Name"]?></td>
                <td><?=$arr_school[$row["SchoolID"]]?></td>
            </tr>
        <?php } ?>
    </table>
    <?php }else{
        echo "<center>No Data</center>";
    } ?>
</body>
</html>
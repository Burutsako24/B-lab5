<?php 
    require("dbConnect.php");
    $sql = "    SELECT Major.*,School.SID, School.Name as schoolName 
                FROM Major JOIN School on Major.SchoolID = School.SID";
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
            <th>imajorID</th>
            <th>majorName</th>
            <th>majorHeader</th>
        </tr>
        <?php $i=0; while($row = $result->fetch_assoc()) { $i++;?>
            <tr>
                <td><?=$i?></td>
                <td><?=$row["imajorID"]?></td>
                <td><?=$row["majorName"]?></td>
                <td><?=$row["majorHeader"]?></td>
                <td><a href="http://localhost/itd62-276/Lab6/major-form-edit.php?MID=<?=$row["MID"]?>">EDIT
                    </a></td>
                <td>
                    <a href="http://localhost/itd62-276/Lab6/major-manage.php?manage_function=delete-record&MID=<?=$row["MID"]?>">DEL
                    </a></td>
            </tr>
        <?php } ?>
    </table>
    <?php }else{
        echo "<center>No Data</center>";
    } ?>
</body>
</html>
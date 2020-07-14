
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
  
</head>
<body>
<?php 

$City = $_GET['City'];
$Type = $_GET['Type']; 
$link = mysqli_connect("localhost", "root", "root", "mydatabase"); 
  
if ($link == false) { 
    die("ERROR: Could not connect. "
                .mysqli_connect_error()); 
} 
  
$sql = "SELECT * FROM bike where City='$City' and Type='$Type' "; 
if ($res = mysqli_query($link, $sql)) { 
    if (mysqli_num_rows($res) > 0) {      
        
        while ($row = mysqli_fetch_array($res)) 
        { 
                     echo "<div>";
            echo '<img src="data:Image/png;base64,'.base64_encode($row['Image'] ).'" height="250" widh2="300"/>';  
            echo "<h3>City:"  .$row['City']. "</h3>"; 
            echo "<h3>Type:"  .$row['Type']. "</h3>"; 
            echo "<h3>Bike_Name:"  .$row['Bike_Name']. "</h3>"; 
            echo "<h3>Rent:"  .$row['Rent']. "</h3>";  
            echo "<h3>Deposite:"  .$row['Deposite']. "</h3>";               
       
        } 
       
    } 
    else { 
        echo "No matching records are found."; 
    } 
} 
else { 
    echo "ERROR: Could not able to execute $sql. "
                                .mysqli_error($link); 
} 
mysqli_close($link); 
?> 

</body>
</html>

 <?php
 $host = "localhost";
 $dbusername = "root";
 $dbpassword = "";
 $db="login"

// Create connection
 $conn= mysqli_connect("localhost","root","","login" );
// Check connection
 if ($conn)
   
    echo "Connected successfully";
$sql="INSERT INTO user (id, name,email,password) values ('8',ali','ali@gmail.com','ali')";
$query = mysqli_query ($conn,$sql);
if($query)
{
    echo "data inserted successfully";
}
?>
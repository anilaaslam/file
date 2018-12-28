
 
<?php
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['passwod'];
if(!empty($username)|| !empty($email) || !empty($password)){
	$host="localhost";
	$dbusername="root";
	$dbpassword="";
	$dbname="login";
	$conn= mysqli_connect($host,$dbusername,$dbpassword );
	if (mysqli_connect_error()){
		die('connect error('.mysql_connect_errno().')'.mysqli_connect_error());}

		else{
			$SELECT="SELECT email from register where email =? limit 1";
			$insert="INSERT Into user($username,$email, $password) values(?,?,?)";
			$stmt=$conn->prepare($SELECT);
			$stmt->bind_param("s",$email);
			$stmt->execute();
			$stmt->bind_result($email);
			$stmt->store_result();
			$rnum=$stmt->num_rows;
			if($rnum==0){
				$stmt->close();

				$stmt=$conn->prepare($insert);
				$stmt->bind_param("ssssii",$username,$email,$password);
				$stmt->execute();
				echo "new record inserted successfully";

			}else {echo "someone already register using this email.";}
			$stmt->cloce();

			$stmt->close();

		}


	} else{
		echo "all field are required";
		die();
	}

	?>





<!DOCTYPE html>
<html>
<head>
	<title>Register form</title>
</head>
<body>
 <form action="form1.php" method="POST">
 	<table>
 		<tr>
 			<td>name :</td>
 			<td><input type="text" name="username" required="true"></td>
 		</tr>
 		<tr>
 			 <td>Email Address:</td>
 			<td><input type="varchar" name="email" required="true"></td>
 		</tr>
 		<tr>
 			<td>password</td>
 			<td><input type="password" name="password" required="true"></td>
 		</tr>
 		<tr>
 			<td><input type="submit" value="submit"></td>
 		</tr>
 		 
 	</table>
 </form>
</body>
</html>
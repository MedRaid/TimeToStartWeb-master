<?php
   // include db connect class
    include_once 'db_connect.php';

    // connecting to db
    $db = new DB_CONNECT();

  
    $UserName = $_POST["UserName"];
    $Password = $_POST["Password"];
  $FirstName = $_POST["FirstName"];
   $LastName = $_POST["LastName"];
  $Email= $_POST["Email"];
   $Tel= $_POST["Tel"];

   $Country= $_POST["Country"];
	//    $Tel = $_POST["Tel"];
	//	    $Email = $_POST["Email"];
		//	    $Country = $_POST["Country"];
		   $sql="SELECT * FROM rest_pays where name='$Country' " ;

$resultat=mysqli_query($db->connect(),$sql);
$row=mysqli_fetch_array($resultat);

$pays=$row["id"];
if($pays == null){
	$pays="0";
}
$role="a:0:{}";
$type="membre";
    $statement = mysqli_prepare($db->connect(), 
	"INSERT INTO rest_users (username,username_canonical,password, name, lastname,email,email_canonical, tel,enabled,roles,type) VALUES 
	('$UserName', '$UserName', '$Password', '$FirstName', '$LastName','$Email','$Email', '$Tel', 1,'$role','$type')");
 //$statement = mysqli_prepare($con, "INSERT INTO user (UserName,Password) VALUES ('$UserName', '$Password')");
  //mysqli_stmt_bind_param($statement, "sssslss", $username, $FirstName, $LastName, $password, $Tel, $Email, $Country);
   // mysqli_stmt_bind_param($statement, "ss", $username,$password);

    mysqli_stmt_execute($statement);
    
    
    mysqli_stmt_close($statement);
     $db->close();
?>
<?php
   // include db connect class
    include_once 'db_connect.php';

    // connecting to db
    $db = new DB_CONNECT();

    $UserName = $_POST["UserName"];
    $Password = $_POST["Password"];
    
	
	
	$sql="SELECT * FROM rest_users WHERE username = '$UserName' AND password = '$Password'" ;
$resultat=mysqli_query($db->connect(),$sql);
$user=array();
while($row=mysqli_fetch_array($resultat))
{
$pays=$row["pays"];
$sql1="SELECT * FROM rest_pays where id='$pays' " ;
$resultat1=mysqli_query($db->connect(),$sql1);
$row1=mysqli_fetch_array($resultat1);

$pays=utf8_encode($row1["name"]);
$username=utf8_encode($row["username"]);
$firstname=utf8_encode($row["name"]);
$lastname=utf8_encode($row["lastname"]);
$email=utf8_encode($row["email"]);
$mdp=utf8_encode($row["password"]);

	array_push($user,array("id"=>$row["id"],"Country"=>$pays,"UserName"=>$username,"Password"=>$mdp
	,"FirstName"=>$firstname,
	"LastName"=>$lastname,
	"Email"=>$email,
	"Tel"=>$row["tel"]));
}
   
    echo json_encode($user);
		$db->close();
?>




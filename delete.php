<?php

include ("session.php");

?>

<?php

include "condb.php";

$id= $_GET['i'];         
$a = "DELETE FROM user1 WHERE id =$id";
$b = mysqli_query($con,$a);
 header('location:display.php');   
 ?>   
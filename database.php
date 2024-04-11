<?php 

$db_server="localhost";
$db_user="root";
$db_pass="";
$db_name="passwordsdb";
$conn=null;

try{
  $conn= mysqli_connect( $db_server , $db_user , $db_pass , $db_name );
}

catch(mysqi_sql_exception){
 echo "not connected";
}


if($conn){
  echo "Hello there";
}


?>

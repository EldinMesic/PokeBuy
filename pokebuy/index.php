<?php
session_start();
include "db_conn.php";


if(!isset($_SESSION['products'])){
  $sql = "SELECT * FROM pokemons";
  $stmt = $spoj->prepare($sql);

  
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($db_id, $db_name, $db_image, $db_description, $db_price);

  $pokemonArray = array();
  for($i = 0; $i<$stmt->num_rows; $i++){
    $stmt->fetch();

    $pokemonArray[] = array(
      'id'=>$db_id,
      'name'=>$db_name,
      'image'=>$db_image,
      'description'=>$db_description,
      'price'=>$db_price
    );

    

  }
  
  $_SESSION['products'] = $pokemonArray;
	$spoj->close();
  exit();
}
header("Location: home.php");

?>
<?php
class DatabaseManager{
    protected $connection;

	public function __construct($dbhost = 'localhost', $dbuser = 'root', $dbpass = '', $dbname = 'pokebuy') {
		$this->connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
		if ($this->connection->connect_error) {
			$this->error('Failed to connect to MySQL - ' . $this->connection->connect_error);
		}
	}

    public function getAllProducts(){
        $sql = "SELECT * FROM pokemons";
        $stmt = $this->connection->prepare($sql);
      
        
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
        


        return json_encode($pokemonArray);
    } 

    
}











?>
<?php 

	include("ConnectionBD.php");

	class CRUD{

	private $database;

	public function __construct(){
		$this->database = new ConnectionBD();
	} 

 	//Protegendo contra SQL Injection (\)
 	public function escape($data){

 		$link = $this->database->getConnection();

 		if (!is_array($data)){
 			$data = mysqli_real_escape_string($link, $data);
 		}else{
 			$array = $data;

 			foreach ($array as $key => $value) {
 				$key = mysqli_real_escape_string($link, $key);
 				$value = mysqli_real_escape_string($link, $value);

 				$data[$key] = $value;
 			}
 		}

 		$this->database->closeConnection($link);
 		return $data;
 	}

 	//Executando as querys do MySQL
 	public function execute($query, $insertId = false){
 		$link = $this->database->getConnection();

 		$result = @mysqli_query($link, $query) or die(@mysqli_error($link));
 		
 		if($insertId)
 			$result = mysql_insert_id($link);

 		$this->database->closeConnection($link);
 		return $result;
 	}

	//CRUD

	//Create - Adiciona ao banco os comentários ou posts
	public function create($table, array $data, $insertId = false){
		$data = $this->escape($data);

		$fields = implode(', ', array_keys($data));
		$values = "'".implode("', '", $data)."'";

		$query = "INSERT INTO {$table} ( {$fields} ) VALUES ( {$values} )";

		return $this->execute($query, $insertId);	
	}

	//Read - Ler os dados dos posts e dos comentários do banco
	public function read($table, $params = null, $fields = "*"){
		$params = isset($params) ? " {$params}": null;

		$query = "SELECT {$fields} FROM {$table}{$params}";
		$result = $this->execute($query);

		if(!mysqli_num_rows($result)){
			return false;
		}else{
			while ($res = mysqli_fetch_assoc($result)) {
				$data[] = $res;
			}

			return $data;
		}

	}

	//Update - Alterar os dados do banco
	public function update($table, array $data, $where = null, $insertId = false){
		$data = $this->escape($data);
		foreach ($data as $key => $value) {
			$fields[] = "{$key} = '{$value}'";
		}

		$fields = implode(', ', $fields);
		$where = isset($where) ? " WHERE {$where}": null;

		$query = "UPDATE {$table} SET  {$fields}{$where}";

		return $this->execute($query, $insertId);
	}

	//Delete - deletar algum dado do banco
	public function delete($table, $where = null){
		$where = isset($where) ? " WHERE {$where}": null;

		$query = "DELETE FROM {$table}{$where}";
		
		return $this->execute($query);
	}

}
 ?>
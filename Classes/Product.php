<?php
class Product{
	// Connection
	private $conn;
	// Table
	private $db_table = "Product";
	// Columns
	public $id;
	public $name;
	public $vendor_id;
	public $price;
	public $category_id;
	public $created;
	// Db connection
	public function __construct($db){
		$this->conn = $db;
	}
	// GET ALL
	public function getProducts(){
		$sqlQuery = "SELECT id, name, vendor_id, price, category_id, created FROM " . $this->db_table . "";
		$stmt = $this->conn->prepare($sqlQuery);
		$stmt->execute();
		return $stmt;
	}
	// CREATE
	public function createProduct(){
		$sqlQuery = "INSERT INTO
		". $this->db_table ."
		SET
		name = :name, 
		vendor_id = :vendor_id, 
		price = :price, 
		category_id = :category_id, 
		created = :created";
		
		$stmt = $this->conn->prepare($sqlQuery);
		
		// sanitize
		$this->name=htmlspecialchars(strip_tags($this->name));
		$this->vendor_id=htmlspecialchars(strip_tags($this->vendor_id));
		$this->price=htmlspecialchars(strip_tags($this->price));
		$this->category_id=htmlspecialchars(strip_tags($this->category_id));
		$this->created=htmlspecialchars(strip_tags($this->created));
		
		// bind data
		$stmt->bindParam(":name", $this->name);
		$stmt->bindParam(":vendor_id", $this->vendor_id);
		$stmt->bindParam(":price", $this->price);
		$stmt->bindParam(":category_id", $this->category_id);
		$stmt->bindParam(":created", $this->created);
		
		if($stmt->execute()){
			return true;
		}
		return false;
	}
	// READ single
	public function getOneProduct(){
		$sqlQuery = "SELECT
		id, 
		name, 
		vendor_id, 
		price, 
		category_id, 
		created
		FROM
		". $this->db_table ."
		WHERE 
		id = ?
		LIMIT 0,1";
		$stmt = $this->conn->prepare($sqlQuery);
		$stmt->bindParam(1, $this->id);
		$stmt->execute();
		$dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$this->name = $dataRow['name'];
		$this->vendor_id = $dataRow['vendor_id'];
		$this->price = $dataRow['price'];
		$this->category_id = $dataRow['category_id'];
		$this->created = $dataRow['created'];
	}        
	// UPDATE
	public function updateProduct(){
		$sqlQuery = "UPDATE
		". $this->db_table ."
		SET
		name = :name, 
		vendor_id = :vendor_id, 
		price = :price, 
		category_id = :category_id, 
		created = :created
		WHERE 
		id = :id";
		
		$stmt = $this->conn->prepare($sqlQuery);
		
		$this->name=htmlspecialchars(strip_tags($this->name));
		$this->vendor_id=htmlspecialchars(strip_tags($this->vendor_id));
		$this->price=htmlspecialchars(strip_tags($this->price));
		$this->category_id=htmlspecialchars(strip_tags($this->category_id));
		$this->created=htmlspecialchars(strip_tags($this->created));
		$this->id=htmlspecialchars(strip_tags($this->id));
		
		// bind data
		$stmt->bindParam(":name", $this->name);
		$stmt->bindParam(":vendor_id", $this->vendor_id);
		$stmt->bindParam(":price", $this->price);
		$stmt->bindParam(":category_id", $this->category_id);
		$stmt->bindParam(":created", $this->created);
		$stmt->bindParam(":id", $this->id);
		
		if($stmt->execute()){
			return true;
		}
		return false;
	}
	// DELETE
	function deleteProduct(){
		$sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
		$stmt = $this->conn->prepare($sqlQuery);
		
		$this->id=htmlspecialchars(strip_tags($this->id));
		
		$stmt->bindParam(1, $this->id);
		
		if($stmt->execute()){
			return true;
		}
		return false;
	}
}
?> 

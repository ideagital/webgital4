<?php
class Models
{
	public $db;

	function __construct($connectDB)
	{
		$this->db = $connectDB;
	}

	function findFirst($fields,$tables,$conditions=1){
		try
  		{
			$stmt = $this->db->prepare("SELECT $fields FROM $tables WHERE $conditions ;");
		    $stmt->execute();
		    $data=$stmt->fetch(PDO::FETCH_BOTH);
		    return $data[0];
		}
		catch(PDOException $e)
		{
			echo $e->getMessage(); 
		   	return false;
		}
	}
	function find($fields,$tables,$conditions=1){
		try
  		{
			$stmt = $this->db->prepare("SELECT $fields FROM $tables WHERE $conditions ;");
			$stmt->execute();
			$data=$stmt->fetch(PDO::FETCH_BOTH);
			 return $data;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage(); 
		   	return false;
		}
	}

	function findAll($fields,$tables,$conditions=1){
		try
  		{
			$stmt = $this->db->prepare("SELECT $fields FROM $tables WHERE $conditions ;");
			$stmt->execute();
			$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
			 return $data;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage(); 
		   	return false;
		}
	}

	function deleteFirst($tables,$conditions=1){
		try
  		{
			$stmt = $this->db->prepare("DELETE FROM $tables WHERE $conditions");
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage(); 
		   	return false;
		}
	}
	
	function updateFirst($tables,$fields,$conditions){
		try
		{
			$stmt = $this->db->prepare("UPDATE $tables SET $fields WHERE $conditions");
			$stmt->execute();
			$data=$stmt->fetch(PDO::FETCH_BOTH);
			return $data;
  		}
		catch(PDOException $e)
		{
			echo $e->getMessage(); 
		   	return false;
		}
	}

}
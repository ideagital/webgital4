<?php
/**
 * Model
 */
class appModel extends Models
{
	public function indexAction()
	{

	}

	function insertRank($sql){
		try
  		{
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage(); 
		   	return false;
		}
	}

	function editRank($sql){
		try
  		{
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage(); 
		   	return false;
		}
	}

}
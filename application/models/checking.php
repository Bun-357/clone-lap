<?php

class Checking extends CI_Model
{
	var $checkCode; 
	var $comment; 
	var $count; 
	var $empCode; 
	
	function __construct()
	{
		$this->load->database();
		parent::__construct();
	}
	
		###### SET : checkCode () ######
	function setCheckCode($checkCode)
	{
		$this->checkCode = $checkCode;
	}

	###### GET : checkCode () ######
	function getCheckCode()
	{
		return $this->checkCode;
	}


		###### SET : comment () ######
	function setComment($comment)
	{
		$this->comment = $comment;
	}

	###### GET : comment () ######
	function getComment()
	{
		return $this->comment;
	}

	###### SET : count () ######
	function setCount($count)
	{
		$this->count = $count;
	}

	###### GET : count () ######
	function getCount()
	{
		return $this->count;
	}
	###### SET : empCode () ######
	function setEmpCode($empCode)
	{
		$this->empCode = $empCode;
	}

	###### GET : empCode () ######
	function getEmpCode()
	{
		return $this->empCode;
	}

	function add()
	{
		$this->db->insert('checkings', $this);
	}
	
	public function findByAll()
	{
		$this ->db->select('checkCode,comment,difference,total,count,empCode');
		$query = $this->db->get('checkings');
		return $query ;
	}

	
}

/*## ??? WHERE ##		
		$where = array(
			$field	=> $value
		);		
		$query = $this->db->get_where('checkings', $where);
		
		return $query;
	}

		function findByAll()
	{
		$query = $this->db->get('checkings');
		return $query;
	}*/

?>
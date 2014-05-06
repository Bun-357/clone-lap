<?php
class Employee extends CI_Model
{
	var $empCode; //รหัสเจ้าหน้าที่พัสดุ
	var $empName; //ชื่อเจ้าหน้าที่พัสดุ

	###### SET : empCode (รหัสเจ้าหน้าที่พัสดุ) ######
	function setEmpCode($empCode)
	{
		$this->empCode = $empCode;
	}

	###### GET : empCode (รหัสเจ้าหน้าที่พัสดุ) ######
	function getEmpCode()
	{
		return $this->empCode;
	}

	###### SET : empName (ชื่อเจ้าหน้าที่พัสดุ) ######
	function setEmpName($empName)
	{
		$this->empName = $empName;
	}

	###### GET : empName (ชื่อเจ้าหน้าที่พัสดุ) ######
	function getEmpName()
	{
		return $this->empName;
	}

	
}
?>
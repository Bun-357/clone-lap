<?php
class Category extends CI_Model
{
	var $categoryCode; //รหัสประเภททรัพย์สิน	
	var $categoryName; //ชื่อประเภททรัพย์สิน

	###### SET : categoryCode (รหัสประเภททรัพย์สิน) ######
	function setCategoryCode($categoryCode)
	{
		$this->categoryCode = $categoryCode;
	}

	###### GET : categoryCode (รหัสประเภททรัพย์สิน) ######
	function getCategoryCode()
	{
		return $this->categoryCode;
	}
	
	###### SET : categoryName (ชื่อประเภททรัพย์สิน) ######
	function setCategoryName($categoryName)
	{
		$this->categoryName = $categoryName;
	}

	###### GET : categoryName (ชื่อประเภททรัพย์สิน) ######
	function getCategoryName()
	{
		return $this->categoryName;
	}



}
?>
<?php
class Division extends CI_Model
{
	var $divisionCode; //รหัสแผนก
	var $divisionName; //ชื่อแผนก

		###### SET : divisionCode (รหัสแผนก) ######
	function setDivisionCode($divisionCode)
	{
		$this->divisionCode = $divisionCode;
	}

	###### GET : divisionCode (รหัสแผนก) ######
	function getDivisionCode()
	{
		return $this->divisionCode;
	}

	###### SET : divisionName (ชื่อแผนก) ######
	function setDivisionName($divisionName)
	{
		$this->divisionName = $divisionName;
	}

	###### GET : divisionName (ชื่อแผนก) ######
	function getDivisionName()
	{
		return $this->divisionName;
	}


}
?>
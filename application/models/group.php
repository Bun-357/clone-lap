<?php
class Group extends CI_Model
{
	var $groupCode; //รหัสหมวดหมู่
	var $groupName; //ชื่อหมวดหมู่

	###### GET : groupCode (รหัสหมวดหมู่) ######
	function getGroupCode()
	{
		return $this->groupCode;
	}

	###### GET : groupName (ชื่อหมวดหมู่) ######
	function getGroupName()
	{
		return $this->groupName;
	}

}
?>
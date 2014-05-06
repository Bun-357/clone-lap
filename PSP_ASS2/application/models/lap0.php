<?php
/*
Model Lap0
สร้างโดย นาย หฤษฏ์ สุริยะโชติ
สร้างเมื่อ 29/4/2557



function ทั้งหมด
openfile :: ดึงข้อมูลจากไฟล์ที่กำหนดแล้ว
browseOpenFile :: ดึงข้อมูลไฟล์ การค้นหน้าจากหน้า V


*/
class Lap0 extends CI_Model//r
{
	function __construct()//r
	{
		parent::__construct();//r
	}
	/*function openfile()//ดึงข้อมูลจากไฟล์ที่กำหนดแล้ว//d
	{//d
		$data['test'] = fopen("Lab0-testcase.php","r");//d
		return $data;//d
	}//d*/
	function browseOpenFile($fileName)//ดึงข้อมูลไฟล์ การค้นหน้าจากหน้า //a
	{//a
		$data = file($fileName);//a
		return $data;//a
	}//a
}


?>
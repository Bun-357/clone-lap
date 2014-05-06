<?php
/*
#########################
Model: Book
ผู้พัฒนา: อ.รุ่งฤทธิ์ อนุตรวิรามกุล
พัฒนาเมื่อ: 2014-02-11 11:11 AM
ภายในประกอบด้วย
Database: BookStore
========
Book (books)
========
- bookId
- bookTitle
- bookAuthor
- bookISDN
- bookDate
========
+ add()
+ findByPK($bookId)
+ findByKeyword($field, $value)
+ findByAll()
+ delete()
#########################
*/
class Book extends CI_Model
{
	var $bookId; //PK
	var $bookTitle; //ชื่อหนังสือ
	var $bookAuthor; //ชื่อผู้แต่ง
	var $bookISDN; //รหัสหนังสือ
	var $bookDate; //วันที่หนังสือเข้า
	
	function __construct()
	{
		$this->load->database();
		parent::__construct();
	}
	
	###### SET : bookId (PK) ######
	function setBookId($bookId)
	{
		$this->bookId = $bookId;
	}

	###### GET : bookId (PK) ######
	function getBookId()
	{
		return $this->bookId;
	}

	###### SET : bookTitle (ชื่อหนังสือ) ######
	function setBookTitle($bookTitle)
	{
		$this->bookTitle = $bookTitle;
	}

	###### GET : bookTitle (ชื่อหนังสือ) ######
	function getBookTitle()
	{
		return $this->bookTitle;
	}

	###### SET : bookAuthor (ชื่อผู้แต่ง) ######
	function setBookAuthor($bookAuthor)
	{
		$this->bookAuthor = $bookAuthor;
	}

	###### GET : bookAuthor (ชื่อผู้แต่ง) ######
	function getBookAuthor()
	{
		return $this->bookAuthor;
	}

	###### SET : bookISDN (รหัสหนังสือ) ######
	function setBookISDN($bookISDN)
	{
		$this->bookISDN = $bookISDN;
	}

	###### GET : bookISDN (รหัสหนังสือ) ######
	function getBookISDN()
	{
		return $this->bookISDN;
	}
	
	###### SET : bookDate (วันที่หนังสือเข้า) ######
	function setBookDate($bookDate)
	{
		$this->bookDate = $bookDate;
	}

	###### GET : bookDate (วันที่หนังสือเข้า) ######
	function getBookDate()
	{
		return $this->bookDate;
	}

	function add()
	{
		$this->db->insert('books', $this);
	}
	
	function findByPK($bookId)
	{
		$where = array(
			'bookId'	=> $this->getBookId()
		);
		$query = $this->db->get_where('books', $where);
		return $query;
	}
	
	### $this->Book->findByKeyword('bookTitle', 'แฮร์พอตเตอร์') ###
	function findByKeyword($field, $value)
	{
		## แบบ LIKE ##
		$this->db->like($field, $value);		
		$query = $this->db->get('books');
		
		## แบบ WHERE ##		
		//$where = array(
		//	$field	=> $value
		//);		
		//$query = $this->db->get_where('books', $where);
		
		return $query;
	}

	function findByAll()
	{
		$query = $this->db->get('books');
		return $query;
	}
	
	function delete()
	{
		$where = array(
			'bookId'	=> $this->getBookId()
		);	
		$this->db->delete('books', $where);
	}
}
?>
<?php
/*
#########################
ระบบร้านหนังสือ
ผู้พัฒนา: อ.รุ่งฤทธิ์ อนุตรวิรามกุล
พัฒนาเมื่อ: 2014-02-11 11:11 AM
ภายในประกอบด้วย

- index() สำหรับแสดงผลในหน้าแรก
- search() สำหรับแสดงผลการค้นหาหนังสือ
- add() เพิ่มหนังสือ
- delete($bookId) ลบหนังสือ
#########################
*/
class Home extends CI_Controller 
{
	function __construct()
	{		
		parent::__construct();
		$this->load->model('Book'); //ใช้ $this->Book ได้แล้ว
	}
	
	## แสดงผลครั้งแรก ##
	function index()
	{		
		$data['listbooks'] = $this->Book->findByAll();
		
		$this->load->view('home', $data);		
	}
	
	## ค้นหาหนังสือตามชื่อ ##
	function search()
	{
		$bookTitle = $this->input->post('bookTitle');
		
		$data['listbooks'] = $this->Book->findByKeyword('bookTitle', $bookTitle);
		$this->load->view('home', $data);		
	}

	## เพิ่มหนังสือ ##
	function add()
	{
		/*
		- bookTitle
		- bookAuthor
		- bookISDN
		- bookDate
		*/
		$bookTitle = $this->input->post('bookTitle');
		$bookAuthor = $this->input->post('bookAuthor');
		$bookISDN = $this->input->post('bookISDN');
		$bookDate = $this->input->post('bookDate');
		
		$this->Book->setBookTitle($bookTitle);
		$this->Book->setBookAuthor($bookAuthor);
		$this->Book->setBookISDN($bookISDN);
		$this->Book->setBookDate($bookDate);
		$this->Book->add();
		
		$this->index();
	}
	
	## ลบหนังสือจาก รหัส PK ##
	function delete($bookId)
	{
		$this->Book->setBookId($bookId);
		$this->Book->delete();
		
		$this->index();
	}
}

?>
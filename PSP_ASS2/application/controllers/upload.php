<?php
/*
#########################
ระบบนับคอมเม้นในโค้ดและเซ็คการแอดโค้ดเพิ่ม ลบ โมดิฟาย นำมาใช้ใหม่
ผู้พัฒนา: นาย บรรหาร เนรวงค์
พัฒนาเมื่อ: 2014-04-29 11:11 AM
ภายในประกอบด้วย

- index() หาบรรทัด และ คอมเม้น
- do_upload() อัพไฟล์ใส่ในโฟลเดอร์ที่กำหนด
#########################
*/

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{
		$this->load->view('upload_form', array('error' => ' ' ));
	}

	function do_upload()
	{
		$config['upload_path'] = './uploads/';
		//$config['allowed_types'] = 'gif|jpg|png|php|html';
		$config['allowed_types'] = '*';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->load->view('upload_success', $data);
		}
	}
	
	function readFile(){
	
		$this->load->helper('file');
		//$data = array('dataFile' => $this->input->post('file'));
		
		$data['dataFile'] = $this->input->post('file');
		
		//$this->load->view('upload_success', $data);
	}
}
?>
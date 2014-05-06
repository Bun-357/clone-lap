<meta charset="utf-8" />
<?php

class CtrlChecking extends CI_Controller 
{
	function __construct()
	{		
		parent::__construct();
		$this->load->model('Checking'); 
	}

	function index()
	{		
		//$data['assetCode'] = $this->Asset->findByAll();
		$this->load->model('Assets');
		$this->load->view('home');		
	}

	function add()
	{
		$this->Checking->setComment($this->input->post('comment'));
		$this->Checking->setCount($this->input->post('count'));
		$this->Checking->setEmpCode($this->input->post('empCode'));
		$this->Checking->add();
		
		CtrlChecking::showeChecking();
		
		
	}

	function showeChecking()
	{		
		$this->load->database();
		$data['data'] = $this->Checking->findByAll();
		
		$this->load->view('showchecking',$data);		
	}

	function selectpaeg($page)
	{
		if ($page==1)
			{
				$this->load->view('asset');
			}
		else if ($page==2)
			{
				$this->load->view('checking');
			}
		else if ($page==3)
			{
				$this->load->view('repairing');
			}
		else if ($page==4)
			{
				EventCtrlChecking::index2();
			}
	}
	
/*	function search()
	{
		$itemCode = $this->input->post('itemCode');
		
		$data['listproducts'] = $this->Product->findByKeyword('itemCode', $itemCode);
		$this->load->view('v_home', $data);		
	} */
}

?>
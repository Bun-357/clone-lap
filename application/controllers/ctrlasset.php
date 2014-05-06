<?php

class CtrlAsset extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->database();  //connect database
		$this->load->model('Asset');
		$this->load->model('Employee');
		$this->load->model('Group');
		$this->load->model('Category');
		$this->load->model('Division');
		
	}
	function index()
	{
		$this->load->view('home', array('error' => ' ' ));	
	}
	
	public function doGenerate()
	{ 	
		
			$data['today'] = date("Y-m-d H:i:s"); 
			$data['assetName'] = $this->input->post('assetName');
			$data['amount'] = $this->input->post('amount');
			$data['categoryCode'] = $this->input->post('categoryCode');
			$data['divisionCode'] = $this->input->post('divisionCode');
			$data['price'] = $this->input->post('price');
			$data['unit'] = $this->input->post('unit');
			$data['location'] = $this->input->post('location');
			$data['empCode'] = $this->input->post('empCode');
			$data['dates'] = $this->input->post('dates');
			
			$this->Asset->setCategoryCode($this->input->post('categoryCode'));
			$this->Asset->setEmpCode($this->input->post('empCode'));
			$this->Asset->setDivisionCode($this->input->post('divisionCode'));

			$this->load->view('asset',$data);
	}
	
	public function doAdd()
	{ 		
		$amount = $this->input->post('amount');
		$timeId =time(); 
		$assetCode = $this->input->post('divisionCode')."-".$timeId;
		
		for($i=1;$i<=$amount;$i++)
		{
			$today = date("Y-m-d H:i:s"); 
			$this->Asset->setAssetCode($this->input->post('assetCode').$i); 
			$this->Asset->setAssetName($this->input->post('assetName')); 
			$this->Asset->setPrice($this->input->post('price')); 
			$this->Asset->setUnit($this->input->post('unit')); 
			$this->Asset->setLocation($this->input->post('location')); 
			$this->Asset->setDates($this->input->post('dates')); 
			$this->Asset->setEmpCode($this->input->post('empCode')); 
			$this->Asset->setCategoryCode($this->input->post('categoryCode')); 
			$this->Asset->setDivisionCode($this->input->post('divisionCode')); 
			
			$this->Asset->setCategoryCode($this->input->post('categoryCode'));
			
			$this->Asset->add(); 
			
		}
		Ctrlasset::doFineByKeyword();
	}
	
	function doFineByKeyword()
    {
		$keyword = $this->input->post('keyword');

		$data['assetName'] = $this->Asset->fineByKeyword($keyword);
		$this->load->view('viewsearch',$data);
    }
	
	function doSearch($assetCode)
    {
		$data['asset'] = $this->Asset->search($assetCode);
		$this->load->view('viewupdate',$data);
    }
	
	function detail($assetCode)
    {
		$data['asset'] = $this->Asset->detail($assetCode);
		$this->load->view('viewdetail',$data);
    }
	
	function edit()
    {
		$this->Asset->setAssetName($this->input->post('assetName')); 
		$this->Asset->setPrice($this->input->post('price')); 
		$this->Asset->setUnit($this->input->post('unit')); 
		$this->Asset->setLocation($this->input->post('location')); 
		$this->Asset->setEmpCode($this->input->post('empCode')); 
		$this->Asset->setCategoryCode($this->input->post('categoryCode')); 
		$this->Asset->setDivisionCode($this->input->post('divisionCode')); 
		$this->Asset->setDates($this->input->post('dates')); 
		
		$this->Asset->edit(); 
		
		Ctrlasset::doFineByKeyword();
	
    }

	function selectpaeg($page)
	{
		if ($page==1)
			{
				$this->load->view('asset');
			}
		if ($page==2)
			{
				$this->load->view('checking');
			}
		if ($page==3)
			{
				$this->load->view('repairing');
			}
	}
}
?>
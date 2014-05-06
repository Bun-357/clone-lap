<?php 
/*
#########################
ระบบคำนวนเงินเดือน เวลาทำงาน และค่าคอมมิสชั่น
ผู้พัฒนา: นาย บรรหาร เนรวงค์
พัฒนาเมื่อ: 2014-05-02 13:10 AM

ภายในประกอบด้วย

- index()
- findTimeWork() หาเวลาทำงาน
- findNewSalary() หาเงินเดือนใหม่
- findCommission() หาค่าคอมมิสชั่น
- findAverage() หาค่าเฉลี่ยของเงินเดือน คอมมิสชั่น ยอดขาย เงินเดือนใหม่
- findMin() หาค่าน้อยสุดของเงินเดือน คอมมิสชั่น ยอดขาย เงินเดือนใหม่
- findMax() หาค่ามากที่สุดของเงินเดือน คอมมิสชั่น ยอดขาย เงินเดือนใหม่
#########################
*/
class PspAss3 extends CI_Controller {

	function __construct()
	{		
		parent::__construct();
		$this->load->helper(array('form', 'url'));//a
		$this->load->helper('date');
		
	}
	public function index()
	{
		$this->load->model('Program3Model'); //โหลดโมเดล Program3Model
		
		$listEmp = $this->Program3Model->findByAll();
		
		foreach($listEmp->result() as $row){
			$this->Program3Model->setEmpId($row->empid);//เซ็ททไอดีี่จะค้นหา 

			$salaryOld = $row->salary;
			$yearsDiff = $this->findTimeWork();//หาเวลาทำงานแต่ล่ะID
			$newSalary = $this->findNewSalary($yearsDiff,$salaryOld);//เรียกใช้findNewSalary() หาเงินเดือนใหม่
			$saleAmount= $row->saleamount;
			$commission = $this->findCommission($saleAmount);//สั่งหาค่าคอมมิสชั่น
		}
		$data['listEmp'] = $this->Program3Model->findByAll();
		
		$this->findAverage();//สั่งหาค่าเฉลี่ย
		$this->findMin();
		$this->findMax();
		
		$data['averageSalary'] = $this->Program3Model->getAverageSalary();//ดึงค่าเฉลี่ยเงินเดือนที่เก็บไว้ไปให้วิว
		$data['averageSaleAmount'] = $this->Program3Model->getAverageSaleAmount();
		$data['averageCommission'] = $this->Program3Model->getAverageCommission();
		$data['averageNewSalary'] = $this->Program3Model->getAverageNewSalary();
		
		$data['minSalary'] = $this->Program3Model->getMinSalary();//ดึงค่าน้อยสุดไปให้วิว
		$data['minSaleAmount'] = $this->Program3Model->getMinSaleAmount();
		$data['minCommission'] = $this->Program3Model->getMinCommission();
		$data['minNewSalary'] = $this->Program3Model->getMinNewSalary();
		
		$data['maxSalary'] = $this->Program3Model->getMaxSalary();//ดึงค่ามากที่สุดไปให้วิว
		$data['maxSaleAmount'] = $this->Program3Model->getMaxSaleAmount();
		$data['maxCommission'] = $this->Program3Model->getMaxCommission();
		$data['maxNewSalary'] = $this->Program3Model->getMaxNewSalary();
		
		
		$this->load->view('psp_ass3',$data);
		//$this->load->view('testController',$data);
	}
	
	function findTimeWork(){
	
		$this->load->model('Program3Model'); //โหลดโมเดล Program3Model
		//$this->Program3Model->setEmpId("57001");//เซ็ททไอดีี่จะค้นหา 
		$date = $this->Program3Model->findByPK();
		
		foreach($date->result() as $row){
			$dateOld  = $row->datein;
		}
		$dataNow = unix_to_human(now());//ดึงค่าเวลาปัจจุบันมาใช้ date("Y-m-d H:i:s");
		$dataNow = date("Y-m-d");//ปรับฟอแมตให้เหลือแค่ ปี เดือน วัน
		
		$timeDiff = abs(strtotime($dataNow) - strtotime($dateOld));
		$yearsDiff = floor($timeDiff / (365*60*60*24));

		//$newSalary = $this->findNewSalary($yearsDiff,$salaryOld);//เรียกใช้findNewSalary() หาเงินเดือนใหม่
		//$commission = $this->findCommission($saleAmount);//สั่งหาค่าคอมมิสชั่น
		
		//$data['salaryOld'] = $salaryOld;
		//$data['commission'] = $commission;
		//$this->load->view('testController',$data);
		return $yearsDiff;
	}
	
	function findNewSalary($yearsDiff,$salaryOld){
		$newSalary = 0;
		
		if($yearsDiff >= 10){//กรณีอำยุงำนตั้งแต่ 10 ปีขึ้นไป ให้ขึ้นเงินเดือน 10%
			$newSalary = (float)$salaryOld * 0.1;
		}else{//กรณีอำยุงำนไม่ถึง 10 ปี ขึ้นเงินเดือน 5%
			$newSalary = (float)$salaryOld * 0.05;
		}
		
		$this->load->model('Program3Model'); //โหลดโมเดล Program3Model
		$this->Program3Model->setNewSalary($newSalary);//เซ็ทค่าเงือนเดือนใหม่ตามที่หาได้
		$this->Program3Model->updateNewSalary();//อัพเดทลงในฐานข้อมูล
		
		
		return $newSalary;
	}
	
	function findCommission($saleAmount){
		$commission = 0;
		
		if($saleAmount >= 500000){//กรณีมียอดขำยตั้งแต่ 500,000 ขึ้นไป คิดค่ำนำยหน้ำเป็น 0.2% จำกยอดขำย
			$commission = $saleAmount*0.002;
		}
		
		if($saleAmount < 500000){//กรณียอดขำยไม่ถึง 500,000 บำท คิดค่ำนำยหน้ำเป็น 0.1% จำกยอดขำย
			$commission = $saleAmount*0.001;
		}
		
		$this->load->model('Program3Model'); //โหลดโมเดล Program3Model
		$this->Program3Model->setCommission($commission);//เซ็ทค่าคอมมิสชั่นตามที่หาได้
		$this->Program3Model->updateCommission();//อัพเดทลงในฐานข้อมูล
		
		return $commission;
	}
	
	function findAverage(){
		$this->load->model('Program3Model'); //โหลดโมเดล Program3Model
		$dataAll = $this->Program3Model->findByAll();//เพื่อดึงข้อมูลมาทั้งหมด
		
		$zimaSalary = 0;//เก็บค่าเงือนเดือนทั้งหมดรวมกัน
		$countArray = 0;//นับจำนวนอาเรยไว้เพื่อนำมาเป้นตัวหารหาค่าเฉลี่ย
		
		foreach($dataAll->result() as $row){//วนลูปเพื่อคำนวณค่าเฉลี่ยของSalary
			$zimaSalary  = (double)$zimaSalary + (double)$row->salary;
			$countArray = $countArray + 1;
		}
		
		$averageSalary = (double)$zimaSalary / (double)$countArray;//คำนวณค่าเฉลี่ย
		$this->Program3Model->setAverageSalary($averageSalary);//เก็บค่าไว้รอแสดงผล
		//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
		$zimaSaleAmount = 0;//เก็บค่ายอดขายทั้งหมดรวมกัน
		$countArray = 0;//นับจำนวนอาเรยไว้เพื่อนำมาเป้นตัวหารหาค่าเฉลี่ย
		
		foreach($dataAll->result() as $row){//วนลูปเพื่อคำนวณค่าเฉลี่ยของSaleAmount
			$zimaSaleAmount  = (double)$zimaSaleAmount + (double)$row->saleamount;
			$countArray = $countArray + 1;
		}
		
		$averageSaleAmount = (double)$zimaSaleAmount / (double)$countArray;//คำนวณค่าเฉลี่ย
		$this->Program3Model->setAverageSaleAmount($averageSaleAmount);//เก็บค่าไว้รอแสดงผล
		//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
		$zimaCommission = 0;//เก็บค่าคอมมิสชั่นทั้งหมดรวมกัน
		$countArray = 0;//นับจำนวนอาเรยไว้เพื่อนำมาเป้นตัวหารหาค่าเฉลี่ย
		
		foreach($dataAll->result() as $row){//วนลูปเพื่อคำนวณค่าเฉลี่ยของCommission
			$zimaCommission  = (double)$zimaCommission + (double)$row->commission;
			$countArray = $countArray + 1;
		}
		
		$averageCommission = (double)$zimaCommission / (double)$countArray;//คำนวณค่าเฉลี่ย
		$this->Program3Model->setAverageCommission($averageCommission);//เก็บค่าไว้รอแสดงผล
		//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
		
		$zimaNewSalary = 0;//เก็บค่าเงินเดือนใหม่ั้งหมดรวมกัน
		$countArray = 0;//นับจำนวนอาเรยไว้เพื่อนำมาเป้นตัวหารหาค่าเฉลี่ย
		
		foreach($dataAll->result() as $row){//วนลูปเพื่อคำนวณค่าเฉลี่ยของCommission
			$zimaNewSalary   = (double)$zimaNewSalary  + (double)$row->newsalary;
			$countArray = $countArray + 1;
		}
		
		$averageNewSalary = (double)$zimaNewSalary / (double)$countArray;//คำนวณค่าเฉลี่ย
		$this->Program3Model->setAverageNewSalary($averageNewSalary);//เก็บค่าไว้รอแสดงผล
		//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
		
	}
	
	function findMin(){
		$this->load->model('Program3Model'); //โหลดโมเดล Program3Model
		$dataAll = $this->Program3Model->findByAll();//เพื่อดึงข้อมูลมาทั้งหมด
		
		$minSalary = array();
		$count = 0;
		
		foreach ($dataAll->result() as $row) {
			$minSalary[$count] = $row->salary;
			$count = $count+1;
		}
		
		$this->Program3Model->setMinSalary(min($minSalary));//เก็บค่าไว้รอแสดงผล
		
		//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
		
		$minSaleAmount = array();
		$count = 0;
		
		foreach ($dataAll->result() as $row) {
			$minSaleAmount[$count] = $row->saleamount;
			$count = $count+1;
		}
		
		$this->Program3Model->setMinSaleAmount(min($minSaleAmount));//เก็บค่าไว้รอแสดงผล
		//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
		
		$minCommission = array();
		$count = 0;
		
		foreach ($dataAll->result() as $row) {
			$minCommission[$count] = $row->commission;
			$count = $count+1;
		}
		
		$this->Program3Model->setMinCommission(min($minCommission));//เก็บค่าไว้รอแสดงผล
		//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
		
		$minNewSalary = array();
		$count = 0;
		
		foreach ($dataAll->result() as $row) {
			$minNewSalary[$count] = $row->newsalary;
			$count = $count+1;
		}
		
		$this->Program3Model->setMinNewSalary(min($minNewSalary));//เก็บค่าไว้รอแสดงผล
		//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
		
	}
	
	function findMax(){
		$this->load->model('Program3Model'); //โหลดโมเดล Program3Model
		$dataAll = $this->Program3Model->findByAll();//เพื่อดึงข้อมูลมาทั้งหมด
		
		$maxSalary = array();
		$count = 0;
		
		foreach ($dataAll->result() as $row) {
			$maxSalary[$count] = $row->salary;
			$count = $count+1;
		}
		
		$this->Program3Model->setMaxSalary(max($maxSalary));//เก็บค่าไว้รอแสดงผล
		
		//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
		
		$maxSaleAmount = array();
		$count = 0;
		
		foreach ($dataAll->result() as $row) {
			$maxSaleAmount[$count] = $row->saleamount;
			$count = $count+1;
		}
		
		$this->Program3Model->setMaxSaleAmount(max($maxSaleAmount));//เก็บค่าไว้รอแสดงผล
		//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
		
		$maxCommission = array();
		$count = 0;
		
		foreach ($dataAll->result() as $row) {
			$maxCommission[$count] = $row->commission;
			$count = $count+1;
		}
		
		$this->Program3Model->setMaxCommission(max($maxCommission));//เก็บค่าไว้รอแสดงผล
		//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
		
		$maxNewSalary = array();
		$count = 0;
		
		foreach ($dataAll->result() as $row) {
			$maxNewSalary[$count] = $row->newsalary;
			$count = $count+1;
		}
		
		$this->Program3Model->setMaxNewSalary(max($maxNewSalary));//เก็บค่าไว้รอแสดงผล
		//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
		
	}
}

/* End of file pspAss3.php */
/* Location: ./application/controllers/pspAss3.php */
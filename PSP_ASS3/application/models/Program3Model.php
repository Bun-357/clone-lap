<?php
/*#####################################################################
*
* By :: Tanapat Limsombat 552535002
* Responsibility :: Model
* Create Date :: 03/05/2557
*
* Function :: 1.getData()
*			  2.findByKeyword()
*			  3.findByPK()
*			  4.findByAll()
*
######################################################################*/
class Program3Model extends CI_Model {

var $empId;
var $empLname;
var $dateIn;
var $team;
var $salary;
var $saleAmount;
var $commission; //ค่าคอมมิสชั่น
var $newSalary; //เงือนเดือนใหม่
var $averageSalary; //ค่าเฉลี่ยเงินเดือน
var $averageCommission; //ค่าเฉลี่ยคอมมิสชั่น
var $averageNewSalary; //ค่าเฉลี่ยเงินเดือนใหม่
var $averageSaleAmount; //ค่าเฉลี่ยยอดขาย
var $minSalary; //เงินเดือนน้อยสุด
var $minSaleAmount; //ยอดขายน้อยสุด
var $minCommission; //ยอดขายน้อยสุด
var $minNewSalary; //เงินเดือนใหม่น้อยสุด
var $maxSalary; //เงินเดือนมากที่สุด
var $maxSaleAmount; //ยอดขายมากที่สุด
var $maxCommission; //คอมมิสชั่นมากที่สุด
var $maxNewSalary; //เงินเดือนใหม่มากที่สุด

function __construct()
	{
		$this->load->database();
		parent::__construct();
	}

	###### SET : empId () ######
	function setEmpId($empId)
	{
		$this->empId = $empId;
	}

	###### GET : empId () ######
	function getEmpId()
	{
		return $this->empId;
	}

	###### SET : empLname () ######
	function setEmpLname($empLname)
	{
		$this->empLname = $empLname;
	}

	###### GET : empLname () ######
	function getEmpLname()
	{
		return $this->empLname;
	}

	###### SET : dateIn () ######
	function setDateIn($dateIn)
	{
		$this->dateIn = $dateIn;
	}

	###### GET : dateIn () ######
	function getDateIn()
	{
		return $this->dateIn;
	}

	###### SET : team () ######
	function setTeam($team)
	{
		$this->team = $team;
	}

	###### GET : team () ######
	function getTeam()
	{
		return $this->team;
	}

	###### SET : salary () ######
	function setSalary($salary)
	{
		$this->salary = $salary;
	}

	###### GET : salary () ######
	function getSalary()
	{
		return $this->salary;
	}

	###### SET : saleAmount () ######
	function setSaleAmount($saleAmount)
	{
		$this->saleAmount = $saleAmount;
	}

	###### GET : saleAmount () ######
	function getSaleAmount()
	{
		return $this->saleAmount;
	}
	
		###### SET : commission (ค่าคอมมิสชั่น) ######
	function setCommission($commission)
	{
		$this->commission = $commission;
	}

	###### GET : commission (ค่าคอมมิสชั่น) ######
	function getCommission()
	{
		return $this->commission;
	}
	
		###### SET : newSalary (เงือนเดือนใหม่) ######
	function setNewSalary($newSalary)
	{
		$this->newSalary = $newSalary;
	}

	###### GET : newSalary (เงือนเดือนใหม่) ######
	function getNewSalary()
	{
		return $this->newSalary;
	}
	
		###### SET : averageSalary (ค่าเฉลี่ยเงินเดือน) ######
	function setAverageSalary($averageSalary)
	{
		$this->averageSalary = $averageSalary;
	}

	###### GET : averageSalary (ค่าเฉลี่ยเงินเดือน) ######
	function getAverageSalary()
	{
		return $this->averageSalary;
	}
	
		###### SET : averageCommission (ค่าเฉลี่ยคอมมิสชั่น) ######
	function setAverageCommission($averageCommission)
	{
		$this->averageCommission = $averageCommission;
	}

	###### GET : averageCommission (ค่าเฉลี่ยคอมมิสชั่น) ######
	function getAverageCommission()
	{
		return $this->averageCommission;
	}
	
		###### SET : averageNewSalary (ค่าเฉลี่ยเงินเดือนใหม่) ######
	function setAverageNewSalary($averageNewSalary)
	{
		$this->averageNewSalary = $averageNewSalary;
	}

	###### GET : averageNewSalary (ค่าเฉลี่ยเงินเดือนใหม่) ######
	function getAverageNewSalary()
	{
		return $this->averageNewSalary;
	}
	
		###### SET : averageSaleAmount (ค่าเฉลี่ยยอดขาย) ######
	function setAverageSaleAmount($averageSaleAmount)
	{
		$this->averageSaleAmount = $averageSaleAmount;
	}

	###### GET : averageSaleAmount (ค่าเฉลี่ยยอดขาย) ######
	function getAverageSaleAmount()
	{
		return $this->averageSaleAmount;
	}
	
		###### SET : minSalary (เงินเดือนน้อยสุด) ######
	function setMinSalary($minSalary)
	{
		$this->minSalary = $minSalary;
	}

	###### GET : minSalary (เงินเดือนน้อยสุด) ######
	function getMinSalary()
	{
		return $this->minSalary;
	}
	
		###### SET : minSaleAmount (ยอดขายน้อยสุด) ######
	function setMinSaleAmount($minSaleAmount)
	{
		$this->minSaleAmount = $minSaleAmount;
	}

	###### GET : minSaleAmount (ยอดขายน้อยสุด) ######
	function getMinSaleAmount()
	{
		return $this->minSaleAmount;
	}
	
		###### SET : minCommission (ยอดขายน้อยสุด) ######
	function setMinCommission($minCommission)
	{
		$this->minCommission = $minCommission;
	}

	###### GET : minCommission (ยอดขายน้อยสุด) ######
	function getMinCommission()
	{
		return $this->minCommission;
	}
	
		###### SET : minNewSalary (เงินเดือนใหม่น้อยสุด) ######
	function setMinNewSalary($minNewSalary)
	{
		$this->minNewSalary = $minNewSalary;
	}

	###### GET : minNewSalary (เงินเดือนใหม่น้อยสุด) ######
	function getMinNewSalary()
	{
		return $this->minNewSalary;
	}
	
		###### SET : maxSalary (เงินเดือนมากที่สุด) ######
	function setMaxSalary($maxSalary)
	{
		$this->maxSalary = $maxSalary;
	}

	###### GET : maxSalary (เงินเดือนมากที่สุด) ######
	function getMaxSalary()
	{
		return $this->maxSalary;
	}
	
		###### SET : maxSaleAmount (ยอดขายมากที่สุด) ######
	function setMaxSaleAmount($maxSaleAmount)
	{
		$this->maxSaleAmount = $maxSaleAmount;
	}

	###### GET : maxSaleAmount (ยอดขายมากที่สุด) ######
	function getMaxSaleAmount()
	{
		return $this->maxSaleAmount;
	}
	
		###### SET : maxCommission (คอมมิสชั่นมากที่สุด) ######
	function setMaxCommission($maxCommission)
	{
		$this->maxCommission = $maxCommission;
	}

	###### GET : maxCommission (คอมมิสชั่นมากที่สุด) ######
	function getMaxCommission()
	{
		return $this->maxCommission;
	}
	
		###### SET : maxNewSalary (เงินเดือนใหม่มากที่สุด) ######
	function setMaxNewSalary($maxNewSalary)
	{
		$this->maxNewSalary = $maxNewSalary;
	}

	###### GET : maxNewSalary (เงินเดือนใหม่มากที่สุด) ######
	function getMaxNewSalary()
	{
		return $this->maxNewSalary;
	}

	
	function getData()
			{
				$this->db->select('');
				$query = $this->db->get('tbl_data');
				return $query;

			}

	function findByKeyword()
	{
		## แบบ LIKE ##
		$this->db->like('emplname',$this->getEmpLname());		
		$query = $this->db->get('tbl_data');
		
		return $query;
	}

	function findByPK()
	{
		$where = array
		(
			'empid'	=> $this->getEmpId()
		);
		$query = $this->db->get_where('tbl_data', $where);
		return $query;
	}

	function findByAll()
	{
		$query = $this->db->get('tbl_data');
		return $query;
	}
	
	function updateCommission() {
		$this->db->where('empid', $this->getEmpId());
		$this->db->update('tbl_data', array('commission' => $this->getCommission()));
		return true;
	}
	
	function updateNewSalary() {
		$this->db->where('empid', $this->getEmpId());
		$this->db->update('tbl_data', array('newsalary' => $this->getNewSalary()));
		return true;
	}
}



?>
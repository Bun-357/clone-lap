<?php
class Asset extends CI_Model 
{
	var $assetCode ; //รหัสทรัพย์สิน
	var $assetName ; //ชื่อทรัพย์สิน
	var $price ; //ราคาทรัพย์สิน
	var $unit ; //หน่วยนับ
	var $location; //สถานที่ตั้งทรัพย์สิน
	var $dates ; //วันที่รับทรัพย์สิน
	var $empCode; //รหัสเจ้าหน้าที่พัสดุ
	var $categoryCode; //รหัสประเภททรัพย์สิน	
	var $divisionCode; //รหัสแผนก
	var $fiscalYear; //ปีงบประมาณ
	
	###### SET : assetCode  (รหัสทรัพย์สิน) ######
	function setAssetCode ($assetCode )
	{
		$this->assetCode  = $assetCode ;
	}

	###### GET : assetCode  (รหัสทรัพย์สิน) ######
	function getAssetCode ()
	{
		return $this->assetCode ;
	}

	###### SET : assetName  (ชื่อทรัพย์สิน) ######
	function setAssetName ($assetName)
	{
		$this->assetName  = $assetName ;
	}

	###### GET : assetName  (ชื่อทรัพย์สิน) ######
	function getAssetName ()
	{
		return $this->assetName ;
	}

	###### SET : price  (ราคาทรัพย์สิน) ######
	function setPrice ($price )
	{
		$this->price  = $price ;
	}

	###### GET : price  (ราคาทรัพย์สิน) ######
	function getPrice ()
	{
		return $this->price ;
	}
	
	###### SET : unit  (หน่วยนับ) ######
	function setUnit ($unit )
	{
		$this->unit  = $unit ;
	}

	###### GET : unit  (หน่วยนับ) ######
	function getUnit ()
	{
		return $this->unit ;
	}
	
	###### SET : location (สถานที่ตั้งทรัพย์สิน) ######
	function setLocation($location)
	{
		$this->location = $location;
	}

	###### GET : location (สถานที่ตั้งทรัพย์สิน) ######
	function getLocation()
	{
		return $this->location;
	}
	
	###### SET : dates  (วันที่รับทรัพย์สิน) ######
	function setDates ($dates )
	{
		$this->dates  = $dates ;
	}

	###### GET : dates  (วันที่รับทรัพย์สิน) ######
	function getDates ()
	{
		return $this->dates ;
	}
	
	###### SET : empCode (รหัสเจ้าหน้าที่พัสดุ) ######
	function setEmpCode($empCode)
	{
		$this->empCode = $empCode;
	}

	###### GET : empCode (รหัสเจ้าหน้าที่พัสดุ) ######
	function getEmpCode()
	{
		return $this->empCode;
	}
	
	###### SET : categoryCode (รหัสประเภททรัพย์สิน) ######
	function setCategoryCode($categoryCode)
	{
		$this->categoryCode = $categoryCode;
	}

	###### GET : categoryCode (รหัสประเภททรัพย์สิน) ######
	function getCategoryCode()
	{
		return $this->categoryCode;
	}
	
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
	
	###### SET : fiscalYear (ปีงบประมาณ) ######
	function setFiscalYear($fiscalYear)
	{
		$this->fiscalYear = $fiscalYear;
	}

	###### GET : fiscalYear (ปีงบประมาณ) ######
	function getFiscalYear()
	{
		return $this->fiscalYear;
	}


	function add() 
	{ 
		$this->db->insert('assets',$this);
	}

	function getAsset($assetCode)
	{
		$this->db->like('assetCode',$assetCode);
		$query = $this->db->get('assets');
		return $query;
	}	

	function fineBykeyword($keyword)
    {
		$this->db->select('*');
        $this->db->select('assetName,COUNT(assets.dates) AS num');
		$this->db->from('assets');
        $this->db->like('assetName',$keyword);
        $this->db->group_by('assets.dates');
		$query = $this->db->get();
		return $query;
    }
	
	function detail($assetCode)
    {	
		$this->db->select('*');
		$this->db->from('assets');
        $this->db->like('assetCode',$assetCode);
		$query = $this->db->get();
		return $query;
    }
	
	function search($assetCode)
    {
		$this->db->select('*');
		$this->db->from('assets');
        $this->db->where('assetCode',$assetCode);
		$query = $this->db->get();
		return $query;
    }
	function edit()
    {
		$data = array(
			'assetName'		=>$this->assetName,
			'unit'			=>$this->unit,
			'categoryCode'	=>$this->categoryCode,
			'divisionCode'	=>$this->divisionCode,
			'price'			=>$this->price,
			'location'		=>$this->location,
			'empCode'		=>$this->empCode,
			'fiscalYear'	=>$this->fiscalYear,
		);
		$this->db->update('assets', $data,'dates = "'. $this->dates.'"');
    }
	function getCategoryName($categoryCode)
    {
		$this->db->select('categoryName');
		$this->db->from('categorys');
		$this->db->where('categoryCode',$categoryCode);
		$query = $this->db->get();
		return $query;
    }
	function getCategoryNames() 
	{ 
		$query = $this->db->query('SELECT categoryName FROM categorys WHERE categoryCode = "'. $this->getCategoryCode() .'"  ');
		if($query->num_rows() > 0)
		{
			return $query->row()->categoryName;
		}
		else
		{
			return '';
		}
	}
	function getEmpNames() 
	{ 
		$query = $this->db->query('SELECT empName FROM employees WHERE empCode = "'. $this->getEmpCode() .'"  ');
		if($query->num_rows() > 0)
		{
			return $query->row()->empName;
		}
		else
		{
			return '';
		}
	}
	function getDivisionNames() 
	{ 
		$query = $this->db->query('SELECT divisionName FROM divisions WHERE divisionCode = "'. $this->getDivisionCode() .'"  ');
		if($query->num_rows() > 0)
		{
			return $query->row()->divisionName;
		}
		else
		{
			return '';
		}
	}
	

}
?>
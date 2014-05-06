<?php
/*
#########################
ระบบนับคอมเม้นในโค้ดและเซ็คการแอดโค้ดเพิ่ม ลบ โมดิฟาย นำมาใช้ใหม่
ผู้พัฒนา: นาย บรรหาร เนรวงค์
พัฒนาเมื่อ: 2014-04-29 11:11 AM
ภายในประกอบด้วย

- index()
-	findComment()  หาจำนวนบรรทัดของคอมเม้น
-  findRowCode() หาจำนวนบรรทัดของโค้ด { กับ } นับเป็นบรรทัดด้วย
- findAdded() หาจำนวนบรรทัดโค้ดที่ถูกแอดเพิ่มมาใหม่
- findReused() หาจำนวนบรรทัดโค้ดที่ถูกนำมาใช้โดยไม่มีการแก้ไข
- findModified() หาจำนวนบรรทัดโค้ดที่ถูก modified
- findDelete() หาจำนวนบรรทัดโค้ดที่ถูกdelete
- findMethod()หาจำนวนเมธอดที่ใช้ในโค้ด
- findBase() หาจำนวนบรรทัดโค้ดเดิมๆ หรือ Base เกิดจากการนำReused,Modified,Deleteมารวมกัน
#########################
*/
class CountCode extends CI_Controller 
{
	var $numRowAll = 0;//a
	 var $numRowComment = 0;//a
	 var $checkNullRowInCode = 0;//a
    var $checkNullRowInComment = 0;//a
	var $checkComment = 0;//a
	var $numCodes = 0;//a
	var $added = 0;//a
	var $reused = 0;//a
	var $modified  = 0;//a
	var $delete = 0;//a
	var $base = 0;//a
	var $method =0;//a
	
	function __construct()
	{		
		parent::__construct();
		$this->load->helper(array('form', 'url'));//a
		
	}
	function index(){
		$data['base'] = $this->base ;//a
		$data['deleted'] = $this->delete ;//a
		$data['reused'] = $this->reused;//a
		$data['added'] = $this->added;//a
		$data['modified'] = $this->modified ;//a
		$data['method'] = $this->method;//a
		$data['numComment'] = $this->numRowComment ;//a
		$data['numCode'] = $this->numCodes;//a
		$this->load->view('psp_ass2',$data);//a
		//$this->getFileName();
	}
	## getFileName##
	function getFileName()//a
	{	//a
		$this->load->helper('file');//a
		//$data = array('dataFile' => $this->input->post('file'));
		
		$fileName = $this->input->post('file');//a
		
		$this->load->model('Lap0');//โหลดโมเดล//a
		$file = $this->Lap0->browseOpenFile($fileName);//ดึงข้อมูลจากชื่อไฟล์ที่ส่งไป//a
		//print_r($file);
		$this->findComment($file);//a
		$this->findRowCode($file);//a
		$this->findAdded($file);//a
		$this->findReused($file);//a
		$this->findModified($file);//a
		$this->findDelete($file);//a
		$this->findMethod($file);//a
		$this->findBase();//a
		
		//$this->load->view('upload_success',$data);//a
		
			
	}
	## findComment##
	function findComment($file)//m
	{		
	
		//$this->load->model('Lap0');//โหลดโมเดล//d
		//$dataFile = $this->Lap0->browseOpenFile($fileName);//เริ่มนับบรรทัด//d
		//print_r($file);
		//print_r(str_replace("//","world",$dataFile));
		//$cars=array("Volvo","BMW","Toyota");
		//$numRowAll = count($file);//บรรทัดทั้งหมด//d
		//$numRowAll = count($cars);//บรรทัดทั้งหมด
		//$data['numRowAll'] = $numRowAll;//d
		
		
		
		//$dataComment = explode(" ",$dataFile);
		
			//$x = chunk_split($dataFile,1,"...");
			//print_r($x);
			$e = 0;//เช็คถ้ามี /* ......*/ e=1 ถ้าจบคอมเม้น*/ e =0
			foreach($file as $row){//m
			
				$taps = " ";
				$texts = $taps.$row;//ใส่แท้ปหน้าบรรทัดทุกๆอัน แก้บัค 
				
				if(str_word_count($texts,0,'*/<>?{}') > 0 ){///ถ้าบรรทัดนี้มีข้อความ//a
					
							
							 $i =0;//เช็คคอมเม้นแบบ" // "							
							if(strpos($texts,"//")&& $e == 0){//m
								$i = 1;
								
							}
							
							
							if(strpos($texts,"/*")){///เช็คคอมเม้นแบบ"/*
								$e = 1;
								$i = 0;//a
								
							}
								
							if ($e > 0)//ถ้าบรรทัดนี้คือคอมเม้น e จะมากกว่า 0 /*______*/
								{
									$this->checkComment  = $this->checkComment  +1;//m
									
							}//a
										
								
							if(strpos($texts,"*/")){//เช็คการจบคอมเม้นแบบ */
								$e = 0;
								$i = 0;
							}
							if ($i > 0 )//ถ้าบรรทัดนี้คือคอมเม้น i จะมากกว่า 0 //
								{
									$this->numRowComment = $this->numRowComment +1;// a
								}
								
					
					}else{//ถ้าบรรทัดนี้ว่าง//a
					
						
						if($e > 0){//แสดงว่ายังอยู่ใน /*______*/    //a
								$this->checkNullRowInComment = $this->checkNullRowInComment + 1;//a
							}else{//a
								$this->checkNullRowInCode = $this->checkNullRowInCode + 1;//a
								}//a
					}//a
					
			}
			$this->numRowComment = ($this->numRowComment + $this->checkComment)+1;//a//บัคนับบรรทัดได้น้อยกว่าจริง 1  เสมอ
			
			
		//$data['numRowAll'] = $numRowAll;//d
		$data['numComment'] = $this->numRowComment ;//�ӹǹ��÷Ѵ������//m
		//$data['numNullInComment'] = $checkNullRowInComment -1;//จำนวนบรรทัดว่างใน  /*......*///a//บัคนับบรรทัดได้มากกว่าจริง 1  เสมอ
		$data['numNullInCode'] = $this->checkNullRowInCode;//��÷Ѵ��ҧ���//a
		//$data['numCode'] = $numRowCode - $checkNullRowInCode;//��÷Ѵ��//m
		//$this->load->view('countCode', $data);//m
	}
	
	
	function findRowCode($file)//a
	{	//a
		$countRow = 0;//a
		foreach($file as $row){//a
				$taps = " ";//a
				$row = trim($row," ");//a
				$texts = $taps.$row;//ใส่แท้ปหน้าบรรทัดทุกๆอัน แก้บัค //a
			if(strpos($texts,"//") >1){//หาตำแน่ง // ถ้ามากกว่า 1 แสดงว่าไม่ใช่คอมเม้น//a
				$countRow = $countRow +1;//a
			}
			
			if(strpos($texts,"{") ==1){//หาตำแน่ง // ถ้ามากกว่า 1 แสดงว่าไม่ใช่คอมเม้น//a
				$countRow = $countRow +1;//a
			}//a
			
			if(strpos($texts,"}") ==1){//หาตำแน่ง // ถ้ามากกว่า 1 แสดงว่าไม่ใช่คอมเม้น//a
				$countRow = $countRow +1;//a
			}//a
			
		
		}//a
		$this->numCodes = $countRow - ($this->checkComment-$this->checkNullRowInComment-3);//บัคหาได้เยอะกว่าความจริง 3//a
		
		$data['countRow'] = $this->numCodes;//a
		//$this->load->view('countCode',$data);//a	
	}//a
	function findAdded($file)//a
	{	//a
		$count = 0;//a
		
		foreach($file as $row){//a
			$taps = " ";//a
			$row = trim($row," ");//a
			$texts = $taps.$row;//ใส่แท้ปหน้าบรรทัดทุกๆอัน แก้บัค //a
			if(strpos($texts,"//a") >1){//หาตำแน่ง //a ถ้ามากกว่า 1 แสดงว่ามี//a//a
					$count = $count +1;//a
			}//a
		}
		$this->added = $count;
		$data['added'] = $this->added;//a
		//$this->load->view('countCode',$data);//a
		
	}
	
	function findReused($file)//a
	{	//a
		$count = 0;//a
		
		foreach($file as $row){//a
			$taps = " ";//a
			$row = trim($row," ");//a
			$texts = $taps.$row;//ใส่แท้ปหน้าบรรทัดทุกๆอัน แก้บัค //a
			if(strpos($texts,"//r") >1){//หาตำแน่ง //r ถ้ามากกว่า 1 แสดงว่ามี//r//a
					$count = $count +1;//a
			}//a
		}
		$this->reused = $count;
		$data['reused'] = $this->reused;//a
		//$this->load->view('countCode',$data);//a
		
	}
	
	function findModified($file)//a
	{	//a
		$count = 0;//a
		
		foreach($file as $row){//a
			$taps = " ";//a
			$row = trim($row," ");//a
			$texts = $taps.$row;//ใส่แท้ปหน้าบรรทัดทุกๆอัน แก้บัค //a
			if(strpos($texts,"//m") >1){//หาตำแน่ง //m ถ้ามากกว่า 1 แสดงว่ามี//m//a
					$count = $count +1;//a
			}//a
		}
		$this->modified = $count;
		$data['modified'] = $this->modified ;//a
		//$this->load->view('countCode',$data);//a
		
	}
	
	function findDelete($file)//a
	{	//a
		$count = 0;//a
		
		foreach($file as $row){//a
			$taps = " ";//a
			$row = trim($row," ");//a
			$texts = $taps.$row;//ใส่แท้ปหน้าบรรทัดทุกๆอัน แก้บัค //a
			if(strpos($texts,"//d") >1){//หาตำแน่ง //dถ้ามากกว่า 1 แสดงว่ามี//d//a
					$count = $count +1;//a
			}//a
		}
		$this->delete = $count;//a
		$data['delete'] = $this->delete ;//a
		//$this->load->view('countCode',$data);//a
		
	}
	
	function findMethod($file)//a
	{	//a
		$count = 0;//a
		
		foreach($file as $row){//a
			$taps = " ";//a
			$row = trim($row," ");//a
			$texts = $taps.$row;//ใส่แท้ปหน้าบรรทัดทุกๆอัน แก้บัค //a
			if(strpos($texts,'function') == 2){//หาตำแน่ง functionถ้าเท่ากับ 1 แสดงว่ามีfunction//a
					$count = $count +1;//a
			}//a
		}
		$this->method = $count;//a
		//$data['delete'] = $this->delete ;//a
		//$this->load->view('countCode',$data);//a
		
	}
	
	function findBase(){//a
	
		$this->base = $this->delete + $this->modified + $this->reused;
		$data['base'] = $this->base ;//a
		$data['deleted'] = $this->delete ;//a
		$data['reused'] = $this->reused;//a
		$data['added'] = $this->added;//a
		$data['modified'] = $this->modified ;//a
		$data['method'] = $this->method;//a
		$data['numComment'] = $this->numRowComment ;//a
		$data['numCode'] = $this->numCodes;//a
		$this->load->view('psp_ass2',$data);//a
	}
}
/* End of file countCode.php */
/* Location: ./application/controllers/countCode.php */
?>
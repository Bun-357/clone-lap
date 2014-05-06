<!doctype html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>บันทึกรายละเอียดทรัพย์สินถาวร</title>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/ui-darkness/jquery-ui.css"/>
	<link rel="stylesheet" type="text/css" href="/css/index.css"/>
</head>

<body>
<script type="text/javascript">
		$(function() {
			$("#datepicker").datepicker({
				dateFormat: "yy-mm-dd",
				onSelect: function(dateText, inst) {
					var date = $.datepicker.parseDate(inst.settings.dateFormat || $.datepicker._defaults.dateFormat,dateText,inst.settings);
					var dateText1 = $.datepicker.formatDate("D,d M yy", date, inst.settings);
					date.setDate(date.getDate()+7);
					var dateText2 = $.datepicker.formatDate("D,d M yy", date, inst.settings);
					$("#dateoutput").html("Chosen date is <b>" + dateText1 + "</b>; chosen date + 7 days yields <b>" + dateText2 + "</b>");
				}
			});
		});
</script>
<div id="header"><center><img src="/images/header.jpg" width="1024" height="250"></center></div>
<div id="manu">
 <table width="598" align="center">
		<tr>
   	 	 <td><a href="1" class="font-manu">บันทึกรายละเอียดทรัพย์สินถาวร</a></td>
       	 <td><a href="2" class="font-manu">ตรวจนับทรัพย์สินถาวร</a></td>
       	 <td><a href="3" class="font-manu">ซ่อมแซม และบำรุงทรัพย์สินถาวร</a></td>
  		</tr>
  </table>
</div>

<div id="Search"><form action="<?php echo site_url('ctrlasset/doFineByKeyword');?>" method = "post">
  <input type="text" name = "keyword" /><input type="submit" value = "Search" />
  </form>
</div>

<div id="detail-add">
  <table width="633" height="221" align="centre">
	<tr>
		<form action="<?php echo site_url('ctrlasset/doFineByKeyword');?>" method = "post">
		<td></td><td></td><td></td>
		<td><td>
		</form>
	</tr>
	<?php echo form_open_multipart('ctrlasset/doGenerate');?>
  		<tr>
			<td colspan="4" align="center" bgcolor="#00CC99"><font size="+2"> บันทึกรายละเอียดทรัพย์สินถาวร </font></td>
		</tr>
    	<tr>

            <td width="92" align="right" class="font-detail">ชื่อทรัพย์สิน:</td>
            <td width="229"><input type="text" name="assetName" id="assetName" required/></td>
			
			<td align="right" class="font-detail">หน่วยนับ:</td><td><input type="text" name="unit" id="unit" required/></td>
        </tr>
        
         <tr>
			<td align="right" class="font-detail">ประเภท:</span></td>
			<td><select name="categoryCode"> 
			<?php $con = mysql_connect("localhost","root",""); 
			mysql_select_db("asset",$con); mysql_query("SET NAMES utf8"); 
			$sql = "SELECT * FROM categorys"; $result = mysql_query($sql); 
			while ($data = mysql_fetch_array($result) ) 
			{ 
				echo "<option value=$data[categoryCode]>$data[categoryName]</option>"; 
			} 
			?> 	
		   </select></td>
		   <td align="right" class="font-detail">แผนก:</td><td><select name="divisionCode"> 
			<?php $con = mysql_connect("localhost","root",""); 
			mysql_select_db("asset",$con); mysql_query("SET NAMES utf8"); 
			$sql = "SELECT * FROM divisions"; $result = mysql_query($sql); 
			while ($data = mysql_fetch_array($result) ) 
			{ 
				echo "<option value=$data[divisionCode]>$data[divisionName]</option>"; 
			} 
			?> 
			</select></td>
        </tr>       
        <tr>
			<td align="right" class="font-detail">หมายเลขห้อง:</td>
			<td><input type="text" name="location" id="location" required/></td>
			<td align="right" class="font-detail">ผู้ดูแลทรัพย์สิน:</td><td><select name="empCode" > 
			<?php $con = mysql_connect("localhost","root",""); 
			mysql_select_db("asset",$con); mysql_query("SET NAMES utf8"); 
			$sql = "SELECT * FROM employees"; $result = mysql_query($sql); 
			while ($data = mysql_fetch_array($result) ) 
			{ 
				echo "<option value=$data[empCode]>$data[empName]</option>"; 
			} 
			?> 
            </select></td>
        </tr>
        <tr>
            <!--<td align="right"><span class="font">วันที่:</span></TD><td><input id="datepicker" type="text" name="dates"/></td>-->
            <td align="right" class="font-detail">ราคา:</td>
            <td><input type="text" name="price" id="price" required/></td>
			<td align="right" class="font-detail">วันที่:</span></TD><td><input id="datepicker" type="text" name="dates" required/></td>
        </tr>
		<tr>
		<td align="right" class="font-detail">จำนวน:</td>
		<td><input type="text" name="amount" id="amount" required/></td>
		<td align="right" class="font-detail">ปีงบประมาณ:</td>
        <td><input type="text" name="fiscalYear" id="fiscalYear" required/></td>
		<tr align="center">
		</tr>
		<?php $con = mysql_connect("localhost","root",""); 
			mysql_select_db("asset",$con); mysql_query("SET NAMES utf8"); 
			$sql = "SELECT * FROM assets"; $result = mysql_query($sql); 
			while ($data = mysql_fetch_array($result) ) 
			{ 
				 "<option value=$data[assetCode]>$data[assetCode]</option>"; 
			} 
			?> 
		
			<td align="center" colspan="4" bgcolor="#00CC99"><input name="submit" type="submit" value="View"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		    <input name="clear" type="reset" value="Clear"></td>
		</tr>
		</form>
  </table></div>
<p>&nbsp;</p>
<div id="detail-view">
	
   <?php if ($this->input->post())
   {?>
		<table  width="949" height="30" align="center">
				<tr>
					<td align="center" bgcolor="#00CC99">รหัสทรัพย์สิน</td>
					<td align="center" bgcolor="#00CC99">ชื่อทรัพย์สิน</td>
					<td align="center" bgcolor="#00CC99">ประเภท</td>
					<td align="center" bgcolor="#00CC99">หน่วยนับ</td>
					<td align="center" bgcolor="#00CC99">ราคา</td>
					<td align="center" bgcolor="#00CC99">ผู้ดูแลทรัพย์สิน</td>
					<td align="center" bgcolor="#00CC99">แผนก</td>
					<td align="center" bgcolor="#00CC99">หมายเลขห้อง</td>
					<td align="center" bgcolor="#00CC99">วันที่รับทรัพย์สิน</td>
				</tr>
		<?php for($i=1;$i<=$amount;$i++)
		{	?>
			<tr>
				<td align="center"><?php echo "NCU-".$categoryCode.$divisionCode."-".substr($dates,2,9)."-".$i;?></td> 
				<td align="center"><?php echo $assetName;?></td> 
				<td align="center"><?php echo $this->Asset->getCategoryNames();?></td>
				<td align="center"><?php echo $unit;?></td> 				
				<td align="center"><?php echo $price;?></td> 
				<td align="center"><?php echo $this->Asset->getEmpNames();?></td>
				<td align="center"><?php echo $divisionCode;?></td> 
				<td align="center"><?php echo $location;?></td> 
				<td align="center"><?php echo $dates;?></td>	
			</tr>
		<?php }?>
		<?php echo form_open_multipart('ctrlasset/doAdd');?>
		<tr>
			<td align="center" colspan="9" bgcolor="#00CC99"><input name="submit" type="submit" value="Add"></td>
		</tr>
		<tr>
			<td>
			<input type="text" name="assetCode" id="assetCode"  value="<?php echo "NCU-".$divisionCode.$dates."-";?>" style="display:none"/>
			<input type="text" name="assetName" id="assetName"  value="<?php echo $assetName;?>" style="display:none"/>
			<input type="text" name="unit" id="unit"  value="<?php echo $unit;?>" style="display:none"/>
			<input type="text" name="categoryCode" id="categoryCode"  value="<?php echo $categoryCode;?>" style="display:none"/>
			<input type="text" name="price" id="price"  value="<?php echo $price;?>" style="display:none"/>
			<input type="text" name="empCode" id="empCode"  value="<?php echo $empCode;?>" style="display:none"/>
			<input type="text" name="divisionCode" id="divisionCode"  value="<?php echo $divisionCode;?>" style="display:none"/>
			<input type="text" name="location" id="location"  value="<?php echo $location;?>" style="display:none"/>
			<input type="text" name="dates" id="dates"  value="<?php echo $dates;?><?php echo substr($today,10,19);?>" style="display:none"/>
			<input type="text" name="amount" id="amount"  value="<?php echo $amount;?>" style="display:none"/>
			<input type="text" name = "keyword" style="display:none"/>						
		</form>
			</td>
		</tr>
		<?php }?>
  </table>
	
</div>
</body>
</html>
<!doctype html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>บันทึกรายละเอียดทรัพย์สินถาวร</title>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/ui-darkness/jquery-ui.css"/>
	<link rel="stylesheet" type="text/css" href="/css/index.css"/>
</head>

<body>
<script type="text/javascript">
		$(function() {
			$("#datepicker").datepicker({
				dateFormat: "yy-mm-dd",
				onSelect: function(dateText, inst) {
					var date = $.datepicker.parseDate(inst.settings.dateFormat || $.datepicker._defaults.dateFormat,dateText,inst.settings);
					var dateText1 = $.datepicker.formatDate("D,d M yy", date, inst.settings);
					date.setDate(date.getDate()+7);
					var dateText2 = $.datepicker.formatDate("D,d M yy", date, inst.settings);
					$("#dateoutput").html("Chosen date is <b>" + dateText1 + "</b>; chosen date + 7 days yields <b>" + dateText2 + "</b>");
				}
			});
		});
</script>
<div id="header"><center><img src="/images/header.jpg" width="1024" height="250"></center></div>
<div id="manu">
 <table width="598" align="center">
		<tr>
   	 	 <td><a href="1" class="font-manu">บันทึกรายละเอียดทรัพย์สินถาวร</a></td>
       	 <td><a href="2" class="font-manu">ตรวจนับทรัพย์สินถาวร</a></td>
       	 <td><a href="3" class="font-manu">ซ่อมแซม และบำรุงทรัพย์สินถาวร</a></td>
  		</tr>
  </table>
</div>

<div id="Search"><form action="<?php echo site_url('ctrlasset/doFineByKeyword');?>" method = "post">
  <input type="text" name = "keyword" /><input type="submit" value = "Search" />
  </form>
</div>

<div id="detail-add">
  <table width="633" height="221" align="centre">
	<tr>
		<form action="<?php echo site_url('ctrlasset/doFineByKeyword');?>" method = "post">
		<td></td><td></td><td></td>
		<td><td>
		</form>
	</tr>
	<?php echo form_open_multipart('ctrlasset/doGenerate');?>
  		<tr>
			<td colspan="4" align="center" bgcolor="#00CC99"><font size="+2"> บันทึกรายละเอียดทรัพย์สินถาวร </font></td>
		</tr>
    	<tr>

            <td width="92" align="right" class="font-detail">ชื่อทรัพย์สิน:</td>
            <td width="229"><input type="text" name="assetName" id="assetName" required/></td>
			
			<td align="right" class="font-detail">หน่วยนับ:</td><td><input type="text" name="unit" id="unit" required/></td>
        </tr>
        
         <tr>
			<td align="right" class="font-detail">ประเภท:</span></td>
			<td><select name="categoryCode"> 
			<?php $con = mysql_connect("localhost","root",""); 
			mysql_select_db("asset",$con); mysql_query("SET NAMES utf8"); 
			$sql = "SELECT * FROM categorys"; $result = mysql_query($sql); 
			while ($data = mysql_fetch_array($result) ) 
			{ 
				echo "<option value=$data[categoryCode]>$data[categoryName]</option>"; 
			} 
			?> 	
		   </select></td>
		   <td align="right" class="font-detail">แผนก:</td><td><select name="divisionCode"> 
			<?php $con = mysql_connect("localhost","root",""); 
			mysql_select_db("asset",$con); mysql_query("SET NAMES utf8"); 
			$sql = "SELECT * FROM divisions"; $result = mysql_query($sql); 
			while ($data = mysql_fetch_array($result) ) 
			{ 
				echo "<option value=$data[divisionCode]>$data[divisionName]</option>"; 
			} 
			?> 
			</select></td>
        </tr>       
        <tr>
			<td align="right" class="font-detail">หมายเลขห้อง:</td>
			<td><input type="text" name="location" id="location" required/></td>
			<td align="right" class="font-detail">ผู้ดูแลทรัพย์สิน:</td><td><select name="empCode" > 
			<?php $con = mysql_connect("localhost","root",""); 
			mysql_select_db("asset",$con); mysql_query("SET NAMES utf8"); 
			$sql = "SELECT * FROM employees"; $result = mysql_query($sql); 
			while ($data = mysql_fetch_array($result) ) 
			{ 
				echo "<option value=$data[empCode]>$data[empName]</option>"; 
			} 
			?> 
            </select></td>
        </tr>
        <tr>
            <!--<td align="right"><span class="font">วันที่:</span></TD><td><input id="datepicker" type="text" name="dates"/></td>-->
            <td align="right" class="font-detail">ราคา:</td>
            <td><input type="text" name="price" id="price" required/></td>
			<td align="right" class="font-detail">วันที่:</span></TD><td><input id="datepicker" type="text" name="dates" required/></td>
        </tr>
		<tr>
		<td align="right" class="font-detail">จำนวน:</td>
		<td><input type="text" name="amount" id="amount" required/></td>
		<td align="right" class="font-detail">ปีงบประมาณ:</td>
            <td><input type="text" name="fiscalYear" id="fiscalYear" required/></td>
		<tr align="center">
		</tr>
		<?php $con = mysql_connect("localhost","root",""); 
			mysql_select_db("asset",$con); mysql_query("SET NAMES utf8"); 
			$sql = "SELECT * FROM assets"; $result = mysql_query($sql); 
			while ($data = mysql_fetch_array($result) ) 
			{ 
				 "<option value=$data[assetCode]>$data[assetCode]</option>"; 
			} 
			?> 
		
			<td align="center" colspan="4" bgcolor="#00CC99"><input name="submit" type="submit" value="View"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		    <input name="clear" type="reset" value="Clear"></td>
		</tr>
		</form>
  </table></div>
<p>&nbsp;</p>
<div id="detail-view">
	
   <?php if ($this->input->post())
   {?>
		<table  width="949" height="30" align="center">
				<tr>
					<td align="center" bgcolor="#00CC99">รหัสทรัพย์สิน</td>
					<td align="center" bgcolor="#00CC99">ชื่อทรัพย์สิน</td>
					<td align="center" bgcolor="#00CC99">ประเภท</td>
					<td align="center" bgcolor="#00CC99">หน่วยนับ</td>
					<td align="center" bgcolor="#00CC99">ราคา</td>
					<td align="center" bgcolor="#00CC99">ผู้ดูและทรัพย์สิน</td>
					<td align="center" bgcolor="#00CC99">แผนก</td>
					<td align="center" bgcolor="#00CC99">หมายเลขห้อง</td>
					<td align="center" bgcolor="#00CC99">วันที่รับทรัพย์สิน</td>
				</tr>
		<?php for($i=1;$i<=$amount;$i++)
		{	?>
			<tr>
				<td align="center"><?php echo "NCU-".$categoryCode.$divisionCode."-".substr($dates,2,9)."-".$i;?></td> 
				<td align="center"><?php echo $assetName;?></td> 
				<td align="center"><?php echo $this->Asset->getCategoryNames();?></td>
				<td align="center"><?php echo $unit;?></td> 				
				<td align="center"><?php echo $price;?></td> 
				<td align="center"><?php echo $this->Asset->getEmpNames();?></td> 
				<td align="center"><?php echo $this->Asset->getDivisionNames();?></td>  
				<td align="center"><?php echo $location;?></td> 
				<td align="center"><?php echo $dates;?></td>	
			</tr>
		<?php }?>
		<?php echo form_open_multipart('ctrlasset/doAdd');?>
		<tr>
			<td align="center" colspan="9" bgcolor="#00CC99"><input name="submit" type="submit" value="Add"></td>
		</tr>
		<tr>
			<td>
			<input type="text" name="assetCode" id="assetCode"  value="<?php echo "NCU-".$divisionCode.$dates."-";?>" style="display:none"/>
			<input type="text" name="assetName" id="assetName"  value="<?php echo $assetName;?>" style="display:none"/>
			<input type="text" name="unit" id="unit"  value="<?php echo $unit;?>" style="display:none"/>
			<input type="text" name="categoryCode" id="categoryCode"  value="<?php echo $categoryCode;?>" style="display:none"/>
			<input type="text" name="price" id="price"  value="<?php echo $price;?>" style="display:none"/>
			<input type="text" name="empCode" id="empCode"  value="<?php echo $empCode;?>" style="display:none"/>
			<input type="text" name="divisionCode" id="divisionCode"  value="<?php echo $divisionCode;?>" style="display:none"/>
			<input type="text" name="location" id="location"  value="<?php echo $location;?>" style="display:none"/>
			<input type="text" name="dates" id="dates"  value="<?php echo $dates;?><?php echo substr($today,10,19);?>" style="display:none"/>
			<input type="text" name="amount" id="amount"  value="<?php echo $amount;?>" style="display:none"/>
			<input type="text" name = "keyword" style="display:none"/>						
		</form>
			</td>
		</tr>
		<?php }?>
  </table>
	
</div>
</body>
</html>

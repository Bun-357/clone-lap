<!doctype html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>บันทึกรายละเอียดทรัพย์สินถาวร</title>
<link rel="stylesheet" type="text/css" href="/css/index.css"/>
</head>

<body>
<div id="header"><center><img src="/images/header.jpg" width="1024" height="250"></center></div>
<div id="manu">
 <table width="598" align="center">
		<tr>
   	 	 <td><a href="/index.php/ctrlasset/selectpaeg/1" class="font-manu">บันทึกรายละเอียดทรัพย์สินถาวร</a></td>
       	 <td><a href="/index.php/ctrlasset/selectpaeg/2" class="font-manu">ตรวจนับทรัพย์สินถาวร</a></td>
       	 <td><a href="3" class="font-manu">ซ่อมแซม และบำรุงทรัพย์สินถาวร</a></td>
  		</tr>
  </table>
</div>

<div id="Search"><form action="<?php echo site_url('ctrlasset/doFineByKeyword');?>" method = "post">
  <input type="text" name = "keyword" /> <input type="submit" value = "Search" />
  </form>
</div>
<div id="detail-update">
<form action="<?php echo site_url('ctrlasset/edit');?>" method = "post">
  <table align="center" >
	<?php foreach($asset -> result() as $row) 
		 { ?>
			
				<tr>	
					<td>รหัสทรัพย์สิน :</td> <td><input type="text" name="assetCode" value="<?php echo substr($row->assetCode,0,14); ?>" readonly></td>
				</tr>
				<tr>
					<td>ชื่อทรัพย์สิน :</td> <td><input type="text" name="assetName" value="<?php echo $row->assetName; ?>" ></td>
				</tr>
				<tr>
					<td>หน่วยนับ :</td> <td><input type="text" name="unit" value="<?php echo $row->unit; ?>" ></td>
				</tr>
				<tr>
					<td>ประเภท :</td> <td><input type="text" name="categoryCode" value="<?php echo $row->categoryCode; ?>" ></td>
				</tr>
				<tr>
					<td>แผนก :</td> <td><input type="text" name="divisionCode" value="<?php echo $row->divisionCode; ?>" ></td>
				</tr>
				<tr>
					<td>สถานที่ตั้ง :</td> <td><input type="text" name="location" value="<?php echo $row->location; ?>" ></td>
				</tr>
				<tr>
					<td>ผู้ดูแลทรัพย์สิน :</td> <td><input type="text" name="empCode" value="<?php echo $row->empCode; ?>" ></td>
				</tr>
				<tr>
					<td>ราคา :</td> <td><input type="text" name="price" value="<?php echo $row->price; ?>" ></td>
				</tr>
				<tr>
					<td>วันที่รับทรัพย์สิน :</td> <td><input type="text" name="dates" value="<?php echo $row->dates; ?>" readonly></td>
				</tr>
				<tr>
					<td align="right"colspan="2"><input name="submit" type="submit" value="แก้ไข"></td>
				</tr>
			
		<?php } ?>
  </table>
</form>
</div>
</body>
</html>
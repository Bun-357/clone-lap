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
  <input type="text" name = "keyword" /><input type="submit" value = "Search" />
  </form>
</div>
<div id="detail-viewdetail">
  <table  width="800" height="53" align="center">
	<tr>
		<td height="23" align="center" bgcolor="#00CC99">รหัสทรัพย์สิน</td>
		<td align="center" bgcolor="#00CC99">ชื่อทรัพย์สิน</td>
		<td align="center" bgcolor="#00CC99">ประเภท</td>
		<td align="center" bgcolor="#00CC99">แผนก</td>
		<td align="center" bgcolor="#00CC99">สถานที่ตั้ง</td>
		<td align="center" bgcolor="#00CC99">วันที่ตวรจรับ</td>
	</tr>	
		 <?php foreach($asset -> result() as $row) 
		 { ?>
	<tr>
		<td height="22" align="left"><?php echo $row->assetCode; ?></td>
		<td align="left"><?php echo $row->assetName; ?></td>
		<td align="left"><?php echo $row->categoryCode; ?></td>
		<td align="left"><?php echo $row->divisionCode; ?></td>
		<td align="left"><?php echo $row->location; ?></td>		
		<td align="left"><?php echo substr($row->dates,0,10); ?></td>							
	</tr>
		<?php } ?>
  </table>
</div>

</body>
</html>
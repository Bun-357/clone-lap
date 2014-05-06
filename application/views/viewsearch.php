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
<div id="detail-search">
  <table  width="800" height="64" >
	<tr>
		<td height="33" align="center" bgcolor="#00CC99">รหัสทรัพย์สิน</td>
		<td align="center" bgcolor="#00CC99">ชื่อทรัพย์สิน</td>
		<td align="center" bgcolor="#00CC99">ประเภท</td>
		<td align="center" bgcolor="#00CC99">จำนวน</td>
		<td align="center" bgcolor="#00CC99">หน่วยนับ</td>
		<td align="center" bgcolor="#00CC99">วันที่รับรัพย์สิน</td>
		<td align="center" bgcolor="#00CC99">รายละเอียด</td>
		<td align="center" bgcolor="#00CC99">แก้ไข</td>
	</tr>	
		 <?php foreach($assetName -> result() as $row) 
		 { ?>
				<tr>
					<td height="23" align="left"><?php echo substr($row->assetCode,0,14); ?></td>
					<td align="left"><?php echo $row->assetName; ?></td>
					<td align="left"><?php echo $row->categoryCode; ?></td>
					<td align="left"><?php echo $row->num; ?></td>	
					<td align="left"><?php echo $row->unit; ?></td>	
					<td align="left"><?php echo substr($row->dates,0,10); ?></td>							
					<td align="center"><a href="/index.php/ctrlasset/detail/<?php echo substr($row->assetCode,0,18); ?>">รายละเอียด</a></td>
					<td align="center"><a href="/index.php/ctrlasset/doSearch/<?php echo $row->assetCode; ?>">แก้ไข</a></td>
				</tr>
		<?php } ?>
</table></div>
</body>
</html>
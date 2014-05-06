<html>
<head>
<title>ตรวจนับทรัพย์สินถาวร</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<style type="text/css">
#mamu {
	position: absolute;
	left: 183px;
	top: 56px;
	width: 87px;
	height: 51px;
	z-index: 1;
}
#detail {
	position: absolute;
	left: 333px;
	top: 115px;
	width: 470px;
	height: 85px;
	z-index: 1;
}
.font {font-size: 16px}
</style>

</head>
<body>

<div id="manu">
	<table align="center" border="1">
		<tr>
   	 	 <td><a href="1">บันทึกรายละเอียดทรัพย์สินถาวร</a></td>
       	 <td>ตรวจนับทรัพย์สินถาวร</td>
       	 <td><a href="3">ซ่อมแซม และบำรุงทรัพย์สินถาวร</a></td>
  		</tr>
  </table>
</div>
<form method="post" action="/index.php/ctrlchecking/add"><div id="detail" align="center">
<form name="frmMain" method="post" align="center">
<div align="center"><table width="715" id="tbExp" align="center">
	<tr>
		<td align="center" colspan="6"><font size="+2"> บันทึกการตรวจนับทรัพย์สินถาวร </font></td>
	</tr>
  <tr>
    <td width="141" align="center">รหัสพนักงานเซ็ค</td>
    <td width="119" align="center">รหัสทรัพย์สิน</td>
    <td width="179" align="center">รายละเอียด</td>
    <td width="103" align="center">จำนวนนับได้</td>
	<td width="91" align="center">ทั้งหมด</td>
	<td width="54" align="center">ผลต่าง</td>
  </tr>
  </form>
  <tr>
	<?php foreach($data->result() as $row)
	{ ?>
	<td> <?php echo $row->checkCode ;?></td>
	<td><?php  echo $row->comment ;?></td>
	<td><?php  echo $row->empCode ;?></td>
	<td><?php  echo $row->empCode ;?></td>
	<td><?php  echo $row->empCode ;?></td>
	<td><?php  echo $row->empCode ;?></td>
	</tr>
	<br>
	<?php } ?>

  

</table></div>

</body>
</html>

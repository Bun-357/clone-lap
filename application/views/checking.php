<!doctype html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>ตรวจนับทรัพย์สินถาวร</title>
<link rel="stylesheet" type="text/css" href="/css/index.css"/>
</head>

<body>
<div id="header"><center><img src="/images/header.jpg" width="1024" height="250"></center></div>
<div id="manu">
 <table width="598" align="center">
		<tr>
   	 	 <td><a href="/index.php/ctrlasset/selectpaeg/1" class="font-manu">บันทึกรายละเอียดทรัพย์สินถาวร</a></td>
       	 <td><a href="2" class="font-manu">ตรวจนับทรัพย์สินถาวร</a></td>
       	 <td><a href="3" class="font-manu">ซ่อมแซม และบำรุงทรัพย์สินถาวร</a></td>
  		</tr>
  </table>
</div>
<div id="Search"><form action="<?php echo site_url('ctrlasset/doSearchKeyword');?>" method = "post">
  <input type="text" name = "keyword" /><input type="submit" value = "Search" />
  </form>
</div>

<div id="detail-add">
<form method="post" action="/index.php/ctrlchecking/add">
<table width="510" id="tbExp" align="center">
	<tr>
		<td align="center" colspan="4" bgcolor="#00CC99"><font size="+2"> บันทึกการตรวจนับทรัพย์สินถาวร </font></td>
	</tr>
  <tr>
    <td width="178" align="center">รหัสพนักงานเซ็ค</td>
    <td width="178" align="center">รหัสทรัพย์สิน</td>
    <td width="178" align="center">รายละเอียด</td>
    <td width="60" align="center">จำนวนนับได้</td>
  </tr>
  <tr>
	<td><input type="text" name="empCode" id="empCode"></td>
	<td><input type="text" name="checkCode" id="checkCode"></td>
	<td><input type="text" name="comment" id="comment"></td>
	<td><input type="text" name="count" id="count" size="10"></td>
  </tr>
  <TR align="center">
	<TD align="canter"colspan="4" bgcolor="#00CC99"><input name="submit" type="submit" value="Submit"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
	<input name="clear" type="reset" value="Clear">
	</td>
  </TR>
</table>
</form></div>
</body>
</html>

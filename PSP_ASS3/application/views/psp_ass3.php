<!--
Author: Rattanaporn  Tuykom
Date: 02 Apr 14
Description: แสดงค่า $emplId, $emplName, $dateIn, $team
				  $salary, saleAmount, $commission, $newSalary
-->
<!doctype html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><----Work 3. ----></title>
<style type="text/css">

body {
	background-image: url(/PSP_ASS3/images/BG.jpg);
	background-repeat: no-repeat;
}
#table {
	position:absolute;
	left:426px;
	top:150px;
	width:791px;
	height:17px;
	z-index:1;
}
.fontH {color:#FFCCCC}
.font {color: #CC3333}
#Name {
	position:absolute;
	left:-90px;
	top:-12px;
	width:89px;
	height:66px;
	z-index:2;
}

</style>
</head>
<body>
<div id="table">
	<table width="800" align="center" border="0">
		<tr align="center">
			<td width="80" bgcolor="#FF5353" class="fontH">Empl Id</td>
			<td width="120" bgcolor="#FF5353" class="fontH">Empl Name</td>
			<td width="100" bgcolor="#FF5353" class="fontH">Date In</td>
			<td width="120" bgcolor="#FF5353" class="fontH">Team</td>
			<td width="80" bgcolor="#FF5353" class="fontH">Salary</td>
			<td width="80" bgcolor="#FF5353" class="fontH">Sale Amount</td>
			<td width="100" bgcolor="#FF5353" class="fontH">Commission</td>
			<td width="80" bgcolor="#FF5353" class="fontH">New Salary</td>
		</tr>
		<tr align="center">
			<td><?php foreach($listEmp->result() as $row){echo $row->empid."<br>";}?></td>
			<td><?php foreach($listEmp->result() as $row){echo $row->emplname."<br>";}?></td>
			<td><?php foreach($listEmp->result() as $row){echo $row->datein."<br>";}?></td>
			<td><?php foreach($listEmp->result() as $row){echo $row->team."<br>";}?></td>
			<td><?php foreach($listEmp->result() as $row){echo number_format($row->salary,2)."<br>";}?></td>
			<td><?php foreach($listEmp->result() as $row){echo number_format($row->saleamount,2)."<br>";}?></td>
			<td><?php foreach($listEmp->result() as $row){echo number_format($row->commission,2)."<br>";}?></td>
			<td><?php foreach($listEmp->result() as $row){echo number_format($row->newsalary,2)."<br>";}?></td>
		</tr>
		<tr>
			<td colspan="4" class="font" align="right">ค่า Max:</td>
			<td><?php echo number_format($maxSalary,2);?></td>
			<td><?php echo number_format($maxSaleAmount,2);?></td>
			<td><?php echo number_format($maxCommission,2);?></td>
			<td><?php echo number_format($maxNewSalary,2);?></td>
		</tr>
		<tr>
			<td colspan="4" class="font" align="right">ค่า Min:</td>
			<td><?php echo number_format($minSalary,2);?></td>
			<td><?php echo number_format($minSaleAmount,2);?></td>
			<td><?php echo number_format($minCommission,2);?></td>
			<td><?php echo number_format($minNewSalary,2);?></td>
		</tr>
		<tr>
			<td colspan="4" class="font" align="right">ค่า Average:</td>
			<td><?php echo number_format($averageSalary,2);?></td>
			<td><?php echo number_format($averageSaleAmount,2);?></td>
			<td><?php echo number_format($averageCommission,2);?></td>
			<td><?php echo number_format($averageNewSalary,2);?></td>
		</tr>	
  </table>
</div>
</body>
</html>
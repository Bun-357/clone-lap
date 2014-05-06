<!--
Author: Rattanaporn  Tuykom
Date: 02 Apr 14
Description: แสดงค่า $emplId, $emplName, $dateIn, $team
				  $salary, saleAmount, $commission, $newSalary
-->
<!doctype html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>&lt;----Work 4. ----&gt;</title>
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
		<tr><form action="<?php echo site_url('#');?>" method = "post">
			<td><select name="department">
				<option>เลือกดูคะแนนรายวิชา</option>
				<option value="mathematic">Mathematic</option>
				<option value="chemistry">Chemistry</option>
				<option value="biology">Biology</option>
				<option value="art">Art</option>
				</select>
			</td>
			<td><input name="department" type="button" value="ตกลง"></td></form>
		</tr>
		<tr align="center">
			<td colspan="8" class="font">Subject:<!--<?php echo $department;?>--></td>
		</tr>
		<tr align="center">
			<td width="80" bgcolor="#FF5353" class="fontH">StudentId</td>
			<td width="120" bgcolor="#FF5353" class="fontH">StudentName</td>
			<td width="100" bgcolor="#FF5353" class="fontH">Assignment</td>
			<td width="120" bgcolor="#FF5353" class="fontH">Report</td>
			<td width="80" bgcolor="#FF5353" class="fontH">Midterm</td>
			<td width="80" bgcolor="#FF5353" class="fontH">Final</td>
			<td width="100" bgcolor="#FF5353" class="fontH">Total</td>
			<td width="80" bgcolor="#FF5353" class="fontH">Grade</td>
		</tr>
		<tr align="center">
			<!--<td><?php foreach($listEmp->result() as $row){echo $row->studentId."<br>";}?></td>
			<td><?php foreach($listEmp->result() as $row){echo number_format($row->studentName)."<br>";}?></td>
			<td><?php foreach($listEmp->result() as $row){echo number_format($row->assignment)."<br>";}?></td>
			<td><?php foreach($listEmp->result() as $row){echo number_format($row->report)."<br>";}?></td>
			<td><?php foreach($listEmp->result() as $row){echo number_format($row->midterm)."<br>";}?></td>
			<td><?php foreach($listEmp->result() as $row){echo number_format($row->final)."<br>";}?></td>
			<td><?php foreach($listEmp->result() as $row){echo number_format($row->total)."<br>";}?></td>
			<td><?php foreach($listEmp->result() as $row){echo number_format($row->grade)."<br>";}?></td>-->
			
		</tr>
		<tr align="center">
			<td colspan="6" class="font" align="right">ค่า Max:</td>
			<td><!--<?php echo number_format($maxTotal,2);?>--></td>
		</tr>
		<tr align="center">
			<td colspan="6" class="font" align="right">ค่า Min:</td>
			<!--<td><?php echo number_format($minSalary,2);?>--></td>
		</tr>
		<tr align="center">
			<td colspan="6" class="font" align="right">ค่า Average:</td>
			<!--<td><?php echo number_format($averageSalary,2);?>--></td>
		</tr>	
		<tr align="center">
			<td colspan="6" class="font" align="right">ค่า Standard Deviation:</td>
			<!--<td><?php echo number_format($averageSalary,2);?>--></td>
		</tr>
  </table>
</div>
</body>
</html>
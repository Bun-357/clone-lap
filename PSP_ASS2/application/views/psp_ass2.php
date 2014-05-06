<!--
Author: Rattanaporn  Tuykom  552535001
Date: 29 Apr 14
Description: รับค่า Base,Deleted, Modified, Added, Reused มาแสดง
			 ส่งค่า Browse ไปยัง Crotroller
-->
<!doctype html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><----Work 2. ----></title>
<style type="text/css">
<!--
#header {
	position:absolute;
	left:0px;
	top:0px;
	width:1024px;
	height:161px;
	z-index:1;
}
#detail {
	position:absolute;
	left:574px;
	top:374px;
	width:304px;
	height:221px;
	z-index:2;
	background-color:#999966
}
#work {
	position:absolute;
	left:445px;
	top:267px;
	width:38px;
	height:28px;
	z-index:3;
}
.font {color: #FFFFFF}
-->
</style>
</head>

<body>
<div id="header"><img src="/images/headder2.jpg" width="1366" height="300"></div><!-- M -->

<div id="detail">
<table width="243" align="center">
  <tr>
  <form method="post" action="/PSP_ASS2/index.php/countCode/getFileName">
  	<td><input name="file" type="file" size="30"></td><!-- A -->
 	<td><input name="Browse" type="submit" value="ตกลง"></td><!-- A -->
	</form>
  </tr>
  <!--<tr>
    <td align="right" width="157" class="font">ค่าเฉลี่ย:: </td>
    <td width="34"><?php echo number_format($mean ,1)  ;?>
  </tr>
  <tr>
  	<td align="right" width="157" class="font">ค่าเบียงแบียนมาตฐาน::</td> 
  	<td><?php  echo number_format($deviation,6) ;?></td>
  </tr> D-->
  <tr>
    <td align="center" width="130" class="font">Method=<?php echo number_format($method)  ;?></td><!-- A -->
  </tr>
  <tr>
    <td align="center" width="130" class="font">Base=<?php echo number_format($base)  ;?></td><!-- A -->
  </tr>
  <tr>
    <td align="center" width="130" class="font">Deleted=<?php echo number_format($deleted)  ;?></td><!-- A -->
  </tr>
  <tr>
    <td align="center" width="130" class="font">Modified=<?php echo number_format($modified)  ;?></td><!-- A -->
  </tr>
  <tr>
    <td align="center" width="130" class="font">Added=<?php echo number_format($added)  ;?></td><!-- A -->
  </tr>
  <tr>
    <td align="center" width="130" class="font">Reused=<?php echo number_format($reused)  ;?></td><!-- A -->
  </tr>
  <tr>
    <td align="center" width="130" class="font">Row code=<?php echo number_format($numCode)  ;?></td><!-- A -->
  </tr>
  <tr>
    <td align="center" width="130" class="font">Comment=<?php echo number_format($numComment)  ;?></td><!-- A -->
  </tr>
</table>
</div>
<div id="work"><img src="/images/work2.png" width="155" height="155"></div><!-- M -->
</body>
</html>
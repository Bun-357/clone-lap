<!DOCTYPE html>
<html>
<head><meta charset="utf-8" />
</head>
<body>
<form method="post" action="/codeIgniter/index.php/home/search">ค้นหาหนังสือตามชื่อหนังสือ: <input type="text" name="bookTitle"><input type="submit" name="search" value="ค้นหาหนังสือ"></form>
<hr />
รายชื่อหนังสือทั้งหมด
<hr />
<!-- (รหัสหนังสือ)ISBN - ชื่อหนังสือ : ผู้แต่ง [ลบ] -->
<?php
foreach($listbooks->result() as $row)
{
	echo '('. $row->bookId .')' . $row->bookISDN . ' - ' . $row->bookTitle . ' : ' . $row->bookAuthor .' [<a href="/codeIgniter/index.php/home/delete/'. $row->bookId .'">ลบ</a>]<br />';
}
?>
<hr />
<form method="post" action="/codeIgniter/index.php/home/add">
เพิ่มหนังสือ
<br />ชื่อหนังสือ: <input type="text" name="bookTitle">
<br />ชื่อผู้แต่ง: <input type="text" name="bookAuthor">
<br />รหัสหนังสือ: <input type="text" name="bookISDN">
<br />วันที่รับเข้า: <input type="text" name="bookDate">
<br /><input type="submit" name="add" value="เพิ่มหนังสือ"></form>
<hr />
</body>
</html>
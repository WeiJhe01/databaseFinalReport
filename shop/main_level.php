<?php
if (!isset($_SESSION)) {
  session_start();
}
// 檢視會員的層級
if (isset($_SESSION['UserGroup'])) 
{   
	if ($_SESSION['UserGroup'] != 99)
	{
		header("Location: index_level.php"); 
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::維哲購物廣場::</title>
<link href="CSS/main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="main_style1">
  歡迎光臨 維哲購物廣場
</div>
<div class="main_style2">
  <input type="button" value="返回會員中心" class="main_style3" onclick="document.location='index_level.php'; return false;" />
</div>
</body>
</html>
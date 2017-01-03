<?php require_once('Connections/connection.php'); ?>
<?php require_once('Connections/function.php'); ?>
<?php
// 建立 session
if (!isset($_SESSION)) {
  session_start();
}
// 尚未登入
if (!isset($_SESSION['Username'])) {
  header('Location: index.php');
}
?>
<?php
//**********************************//
// 顯示member資料表的目前紀錄
//**********************************//
$username = "-1";
if (isset($_SESSION['Username'])) {
  $username = $_SESSION['Username'];
}

// 選擇 MySQL 資料庫ch26
mysql_select_db('ch26', $connection) or die('資料庫ch26不存在');
// 查詢目前帳號的紀錄
$query = sprintf("SELECT book.id,member.name FROM member WHERE book.username = %s & member.username=%s", GetSQLValue($username, "text"), GetSQLValue($username, "text"));

// 傳回結果集
$result = mysql_query($query, $connection);
// 讀取目前帳號的紀錄
if ($result) {
	$row = mysql_fetch_assoc($result);
}
else {
	header('Location: index.php');
}
?>
<?php
//**********************************//
// 更新在member資料表內的一筆紀錄
//**********************************//
if ((isset($_POST["update"])) && ($_POST["update"] == "member_info")) 
{
    // 選擇 MySQL 資料庫ch26
	mysql_select_db('ch26', $connection) or die('資料庫ch26不存在');	
	// 新的帳號
	$_SESSION['Username'] = $_POST['username'];
	
	// 在member資料表內插入一筆新的紀錄
    $query = sprintf("UPDATE member SET username=%s, password=%s, name=%s, sex=%s, birthday=%s, email=%s, phone=%s, address=%s, uniform=%s, unititle=%s, userlevel=%s WHERE id=%s", GetSQLValue($_POST['username'], "text"), 
	GetSQLValue($_POST['password'], "text"), GetSQLValue($_POST['name'], "text"), GetSQLValue($_POST['sex'], "text"), 
	GetSQLValue($_POST['birthday'], "date"), GetSQLValue($_POST['email'], "text"), GetSQLValue($_POST['phone'], "text"), 
	GetSQLValue($_POST['address'], "text"), GetSQLValue($_POST['uniform'], "text"), GetSQLValue($_POST['unititle'], "text"),
	GetSQLValue($_POST['userlevel'], "int"), GetSQLValue($_POST['id'], "int"));

	// 傳回結果集
    $result = mysql_query($query, $connection);

	if ($result) {
	    // 回到前一個網頁 
	  	header(sprintf("Location: %s", $_SESSION['PrevPage']));
	}
}
?>
<?php 
/* 如欲顯示密碼
<tr>
    <td class="member_info_style10">
        <span class="member_info_style11">
         密　　碼
        </span>
    </td>
    <td class="member_info_style12">
        <?php echo $row['password']; ?>
    </td>
</tr>
*/
// 取得這筆紀錄的 birthday 欄位值
$date = getdate(strtotime($row['birthday']));
// 設定 [年],[月],[日] 欄位
$year = $date['year'];
$month = $date['mon'];
$day = $date['mday'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>會員基本資料</title>
<link href="CSS/member_info.css" rel="stylesheet" type="text/css" />
<script src="Spry/SpryData.js" type="text/javascript"></script>
<script src="JavaScript/member_info.js" type="text/javascript"></script>
</head>
<body>
<table class="member_info_style1">
  <tr>
    <td class="member_info_style2">
	  <span class="member_info_style3">
        會員基本資料 
      </span>          
    </td>
  </tr>
  <tr>
    <td>
	  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onkeydown="if(event.keyCode==13) return false;"> 
	    <table class="member_info_style4">
          <tr>
            <td class="member_info_style5">
              <span class="member_info_style6">注意事項</span>
              <br /><br />
              <span class="member_info_style7">
                如果資料有誤，請點選下方按鈕"回到上一頁"，再重新點入"修改基本資料 》"進行修改。
              </span>
            </td>
          </tr>
          <tr>
            <td class="member_info_style16">
        	  <table class="member_info_style9">
               <tr>
                 <td class="member_info_style10">
                   <span class="member_info_style11">帳　　號</span>     		   
                 </td>
                 <td class="member_info_style12">
                   <?php echo $row['username']; ?> 				   
                 </td>
               </tr>
               <tr>
                 <td class="member_info_style10">
                   <span class="member_info_style11">
                     姓　　名
                   </span> 
                 </td>
                 <td class="member_info_style12">
                   <?php echo $row['name']; ?>
                 </td>
               </tr>
               <tr>
                 <td class="member_info_style10">
                   <span class="member_info_style11">
                     性　　別
                   </span> 
                 </td>
                 <td class="member_info_style12">
                   <?php if (!(strcmp($row['sex'],'男'))) 
		               {echo "男";} ?>
		           <?php if (!(strcmp($row['sex'],'女'))) 
		              {echo "女";} ?>
                 </td>
               </tr>
               <tr>
                 <td class="member_info_style10">
                   <span class="member_info_style11">
                     電子信箱
                   </span> 
                 </td>
                 <td class="member_info_style12">
                   <?php echo $row['email']; ?>
                 </td>
               </tr>
               <tr>
                 <td class="member_info_style10">
                   <span class="member_info_style11">
                     出生日期
                   </span> 
                 </td>
                 <td class="member_info_style12">
                   <?php echo $year; ?>
                     &nbsp;年&nbsp;
					 <?php echo $month; ?>
                     &nbsp;月&nbsp;
					 <?php echo $day; ?>
                     &nbsp;日&nbsp;
                 </td>
               </tr>
               <tr>
                 <td class="member_info_style10">
                   <span class="member_info_style11">
                     連絡電話 
                   </span> 
                 </td>
                 <td class="member_info_style12">
                   <?php echo $row['phone']; ?>  
                 </td>
               </tr>
               <tr>
                 <td class="member_info_style10">
                   <span class="member_info_style11">
                     收件地址  
                   </span> 
                 </td>
                 <td class="member_info_style12">
                   <?php echo $row['address']; ?>
                 </td>
               </tr>
		       <tr>
                 <td class="member_info_style10">
                   <span class="member_info_style11">
                     統一編號
                   </span> 
                 </td>
                 <?php echo $row['uniform']; ?>
                 </td>
               </tr>
		       <tr>
                 <td class="member_info_style10">
                   <span class="member_info_style11">
                     發票抬頭
                   </span>
                 </td>
                 <td class="member_info_style12">
                   <?php echo $row['unititle']; ?>
                 </td>
               </tr>
             </table>
           </td>
         </tr>
		 <tr>
            <td class="member_info_style16">
        	  <table class="member_info_style9">
               <tr>
                 <td class="member_info_style10">
                   <span class="member_info_style11">帳　　號</span>     		   
                 </td>
                 <td class="member_info_style12">
                   <?php echo $row['username']; ?> 				   
                 </td>
               </tr>
               <tr>
                 <td class="member_info_style10">
                   <span class="member_info_style11">
                     姓　　名
                   </span> 
                 </td>
                 <td class="member_info_style12">
                   <?php echo $row['name']; ?>
                 </td>
               </tr>
               <tr>
                 <td class="member_info_style10">
                   <span class="member_info_style11">
                     性　　別
                   </span> 
                 </td>
                 <td class="member_info_style12">
                   <?php if (!(strcmp($row['sex'],'男'))) 
		               {echo "男";} ?>
		           <?php if (!(strcmp($row['sex'],'女'))) 
		              {echo "女";} ?>
                 </td>
               </tr>
               <tr>
                 <td class="member_info_style10">
                   <span class="member_info_style11">
                     電子信箱
                   </span> 
                 </td>
                 <td class="member_info_style12">
                   <?php echo $row['email']; ?>
                 </td>
               </tr>
               <tr>
                 <td class="member_info_style10">
                   <span class="member_info_style11">
                     出生日期
                   </span> 
                 </td>
                 <td class="member_info_style12">
                   <?php echo $year; ?>
                     &nbsp;年&nbsp;
					 <?php echo $month; ?>
                     &nbsp;月&nbsp;
					 <?php echo $day; ?>
                     &nbsp;日&nbsp;
                 </td>
               </tr>
               <tr>
                 <td class="member_info_style10">
                   <span class="member_info_style11">
                     連絡電話 
                   </span> 
                 </td>
                 <td class="member_info_style12">
                   <?php echo $row['phone']; ?>  
                 </td>
               </tr>
               <tr>
                 <td class="member_info_style10">
                   <span class="member_info_style11">
                     收件地址  
                   </span> 
                 </td>
                 <td class="member_info_style12">
                   <?php echo $row['address']; ?>
                 </td>
               </tr>
		       <tr>
                 <td class="member_info_style10">
                   <span class="member_info_style11">
                     統一編號
                   </span> 
                 </td>
                 <?php echo $row['uniform']; ?>
                 </td>
               </tr>
		       <tr>
                 <td class="member_info_style10">
                   <span class="member_info_style11">
                     發票抬頭
                   </span>
                 </td>
                 <td class="member_info_style12">
                   <?php echo $row['unititle']; ?>
                 </td>
               </tr>
             </table>
           </td>
         </tr>
         <tr>
           <td class="member_info_style2">
             <table class="member_info_style9">
               <tr>
                 <td class="member_info_style2">
                   <input type="button" value="回到上一頁" class="member_info_style15" 
                   	 onclick="document.location='<?php echo $_SESSION['PrevPage']; ?>'; return false;" />
                 </td>
               </tr>
             </table> 
           </td>
         </tr>
       </table> 
	   <input name="userlevel" id="userlevel"type="hidden" value="<?php echo $row['userlevel']; ?>" />
       <input name="birthday" id="birthday" type="hidden" value="<?php echo $row['birthday']; ?>" />
       <input name="id" id="id" type="hidden" value="<?php echo $row['id']; ?>" />
	   <input name="old_username" id="old_username" type="hidden" value="<?php echo $row['username']; ?>" />
       <input name="update" id="update" type="hidden" value="member_info" />
	  </form>
   </td>
 </tr>
</table>
</body>
</body>
</html>
<?php
// 釋放結果集
mysql_free_result($result);
?>
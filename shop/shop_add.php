<?php require_once('Connections/connection.php'); ?>
<?php require_once('Connections/function.php'); ?>
<?php require_once('member_new_cookie.php'); ?>
<?php
// 建立 session
if (!isset($_SESSION)) {
  session_start();
}
?>
<?php
//**********************************//
// 在member資料表內插入一筆新的紀錄
//**********************************//
if ((isset($_POST["insert"])) && ($_POST["insert"] == "member_new")) 
{
	// 選擇 MySQL 資料庫miaoli_food
	mysql_select_db('miaoli_food', $connection) or die('資料庫miaoli_food不存在');	
	// 在member資料表內插入一筆新的紀錄
	$query = sprintf("INSERT INTO shop (name, about, shopImg, businessHours, fansPage, phone, date,address_district,address_detail) VALUES (%s, %s, %s, %s,%s, %s, %s, %s, %s)", 
		GetSQLValue($_POST['name'], "text"), 
		GetSQLValue($_POST['about'], "text"), 
		GetSQLValue($_POST['shopImg'], "text"), 
		GetSQLValue($_POST['businessHours'], "text"), 
		GetSQLValue($_POST['fansPage'], "text"), 
		GetSQLValue($_POST['phone'], "date"), 
		GetSQLValue($_POST['date'], "text"),
		GetSQLValue($_POST['address_district'], "text"),
		GetSQLValue($_POST['address_detail'], "text"));
	
	// 傳回結果集
	$result = mysql_query($query, $connection);

	if ($result) {
	    // 回到前一個網頁 
	  	header(sprintf("Location: %s", $_SESSION['PrevPage']));
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>加入會員</title>
<link href="CSS/member_new.css" rel="stylesheet" type="text/css" />
<script src="Spry/SpryData.js" type="text/javascript"></script>
<script src="JavaScript/member_new.js" type="text/javascript"></script>
</head>
<body>
<!-- 載入上邊區塊 -->
<?php require_once("menu_top.php"); ?>
<table class="member_new_style1">
  <tr>
    <td class="member_new_style2">
	  <span class="member_new_style3">
        加入會員          
      </span>          
    </td>
  </tr>
  <tr>
    <td>
	  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onkeydown="if(event.keyCode==13) return false;"> 
	    <table class="member_new_style4">
       
          <tr>
            <td class="member_new_style16">
        	  <table class="member_new_style9">
               <tr>
                 <td class="member_new_style10">
                   <span class="member_new_style11">店家名稱</span>                 
                 </td>
                 <td class="member_new_style12">
                   <input name="name" id="name" type="text" class="member_new_style13" size="20" maxlength="10" 
                     value="" />                 
                 </td>
               </tr>
               <tr>
                 <td class="member_new_style10">
                   <span class="member_new_style11">
                     關於
                   </span>
                 </td>
                <td class="member_new_style12">
                   <input name="about" id="about" type="text" class="member_new_style13" size="20" maxlength="12" 
                     value="" />
                 </td>
               </tr>
               <tr>
                 <td class="member_new_style10">
                   <span class="member_new_style11">
                     店家圖片
                   </span> 
                 </td>
                 <td class="member_new_style12">
                   <input name="shopImg" id="shopImg" type="text" class="member_new_style13" size="20" maxlength="40" 
                     value="" />
                 </td>
               </tr>
               <tr>
                 <td class="member_new_style10">
                   <span class="member_new_style11">
                     營業時間
                   </span> 
                 </td>
                 <td class="member_new_style12">
                   <input name="businessHours" id="businessHours" type="text" class="member_new_style13" size="40" maxlength="40" 
                     value="" />
                 </td>
               </tr>
			   <tr>
                 <td class="member_new_style10">
                   <span class="member_new_style11">
                     粉絲專頁
                   </span> 
                 </td>
                 <td class="member_new_style12">
                   <input name="fansPage" id="fansPage" type="text" class="member_new_style13" size="40" maxlength="40" 
                     value="" />
                 </td>
               </tr>
			   <tr>
                 <td class="member_new_style10">
                   <span class="member_new_style11">
                     時間
                   </span> 
                 </td>
                 <td class="member_new_style12">
                   <input name="date" id="date" type="text" class="member_new_style13" size="40" maxlength="40" 
                     value="" />
                 </td>
               </tr>
               <tr>
                 <td class="member_new_style10">
                   <span class="member_new_style11">
                     電話/手機 
                   </span> 
                 </td>
                 <td class="member_new_style12">
                   <input name="phone" id="phone" type="text" class="member_new_style13" size="20" maxlength="15" 
                     value="" />
                     <span class="member_new_style8">＊</span>  
                 </td>
               </tr>
               <tr>
                 <td class="member_new_style10">
                   <span class="member_new_style11">
                     地　　址(區域)  
                   </span> 
                 </td>
                 <td class="member_new_style12">
                   <input name="address_district" id="address_district" type="text" class="member_new_style13" size="60" maxlength="120"
                     value="" />
                     <span class="member_new_style8">＊</span> 
                 </td>
               </tr>
			   <tr>
                 <td class="member_new_style10">
                   <span class="member_new_style11">
                     地　　址  
                   </span> 
                 </td>
                 <td class="member_new_style12">
                   <input name="address_detail" id="address_detail" type="text" class="member_new_style13" size="60" maxlength="120"
                     value="" />
                     <span class="member_new_style8">＊</span> 
                 </td>
               </tr>
             </table>
           </td>
         </tr>
         <tr>
           <td class="member_new_style2">
             <table class="member_new_style9">
               <tr>
                 <td class="member_new_style2">
                   <input type="submit" value="確定送出"  />
                   <input type="button" value="取消" class="member_new_style15" 
                   	 onclick="document.location='<?php echo $_SESSION['PrevPage']; ?>'; return false;" />
                 </td>
               </tr>
             </table> 
           </td>
         </tr>
       </table> 
       <input name="userlevel" id="userlevel" type="hidden" value="0" />
       <input name="birthday" id="birthday" type="hidden" />
       <input name="insert" id="insert" type="hidden" value="member_new" />
	  </form>
    </td>
 </tr>
</table>
<!-- 載入下邊區塊 -->
<?php require_once("menu_bottom.php"); ?>
</body>
</html>
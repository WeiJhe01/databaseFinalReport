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
	$query = sprintf("INSERT INTO member (username, password, name, gender, mail, date, phone, address) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)", 
		GetSQLValue($_POST['username'], "text"), 
		GetSQLValue($_POST['password'], "text"), 
		GetSQLValue($_POST['name'], "text"), 
		GetSQLValue($_POST['gender'], "text"), 
		GetSQLValue($_POST['mail'], "text"), 
		GetSQLValue($_POST['date'], "date"), 
		GetSQLValue($_POST['phone'], "text"), 
		GetSQLValue($_POST['address'], "text"));
	
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
            <td class="member_new_style5">
              <span class="member_new_style6">注意事項</span>
              <br /><br />
              <span class="member_new_style7">
                1.&nbsp;&nbsp;請務必正確填寫以下資料。（
              </span>
              <span class="member_new_style8">＊</span>
              <span>欄位為必填 &nbsp;）</span>
              <br />
              <span class="member_new_style7">
                2.&nbsp;&nbsp;我們會將認證信函寄到您的電子信箱
              </span>
            </td>
          </tr>
          <tr>
            <td class="member_new_style16">
        	  <table class="member_new_style9">
               <tr>
                 <td class="member_new_style10">
                   <span class="member_new_style11">帳　　號</span>                 
                 </td>
                 <td class="member_new_style12">
                   <input name="username" id="username" type="text" class="member_new_style13" size="20" maxlength="10" 
                     value="" />
                     <span class="member_new_style8">＊</span>（3~10個字元，請勿使用中文）                 
                 </td>
               </tr>
               <tr>
                 <td class="member_new_style10">
                   <span class="member_new_style11">
                     密　　碼
                   </span>
                 </td>
                <td class="member_new_style12">
                   <input name="password" id="password" type="password" class="member_new_style13" size="20" maxlength="12" 
                     value="" />
                     <span class="member_new_style8">＊</span>（6~12個字元，請勿使用中文）
                 </td>
               </tr>
               <tr>
                 <td class="member_new_style10">
                   <span class="member_new_style11">
                     姓　　名
                   </span> 
                 </td>
                 <td class="member_new_style12">
                   <input name="name" id="name" type="text" class="member_new_style13" size="20" maxlength="40" 
                     value="" />
                     <span class="member_new_style8">＊</span>
                 </td>
               </tr>
               <tr>
                 <td class="member_new_style10">
                   <span class="member_new_style11">
                     性　　別
                   </span> 
                 </td>
                 <td class="member_new_style12">
                   <!-- 點選[性別]欄位值為 男 -->
                   <input name="gender" type="radio" value="男" class="member_new_style14" 
                   <?php 
				     // 檢查之前點選的[性別]欄位值是否是 "男" 
					 if (!empty($_COOKIE['sex']))
					 {
					   if (uniDecode($_COOKIE['sex']) == "男")
					   {
						 echo "checked=\"checked\"";
					   }
				  	 }
					 else
					 {
					   echo "checked=\"checked\"";
					 } 
				   ?> />
                   男
                   <input name="gender" type="radio" value="女" 
                   <?php 
					 if (!empty($_COOKIE['sex']))
					 {
					   if (uniDecode($_COOKIE['sex']) == "女")
					   {
						 echo "checked=\"checked\"";
					   }
				  	 }
				   ?> />
                   女
                 </td>
               </tr>
               <tr>
                 <td class="member_new_style10">
                   <span class="member_new_style11">
                     電子信箱
                   </span> 
                 </td>
                 <td class="member_new_style12">
                   <input name="mail" id="mail" type="text" class="member_new_style13" size="40" maxlength="40" 
                     value="" />
                     <span class="member_new_style8">＊</span>
                 </td>
               </tr>
               <tr>
                 <td class="member_new_style10">
                   <span class="member_new_style11">
                     出生日期
                   </span> 
                 </td>
                 <td class="member_new_style12">
                   <input name="date" id="date" type="text" class="member_new_style13" size="6" maxlength="4" 
                     value="" />
                     &nbsp;年&nbsp;
                   <!-- 在選單中填入[出生日期]的[月]欄位值 -->
	               <select name="month" id="month">
                   <?php
		             for ($i = 1; $i <= 12; $i++)
		             {
		           ?>
                     <option value="<?php echo $i ?>" 
              		  <?php 
					    if (!empty($_COOKIE['month']))
						{
						  if ($i == $_COOKIE['month'])
						  {
						    echo "selected=\"selected\"";
						  }
						} 
					  ?>>
                      &nbsp;&nbsp;<?php echo $i ?>&nbsp; 
                     </option>         
                   <?php
                     }
		           ?>
                   </select>
                     &nbsp;月&nbsp;&nbsp;
		           <select name="day" id="day">                   
                   <!-- 在選單中填入[出生日期]的[日]欄位值 -->
                   <?php
		             for ($i = 1; $i <= 31; $i++)
		             {
		           ?>
                     <option value="<?php echo $i ?>" 
					   <?php 
					    if (!empty($_COOKIE['day']))
						{
						  if ($i == $_COOKIE['day'])
						  {
						    echo "selected=\"selected\"";
						  }
						}
					   ?>>
                       &nbsp;&nbsp;<?php echo $i ?>&nbsp;&nbsp; 
                     </option>         
                   <?php
                     }
		           ?>
                   </select>
                   &nbsp;日&nbsp;&nbsp;
                   <span class="member_new_style8">＊</span>（請填入西元年, 例如 2010）
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
                     地　　址  
                   </span> 
                 </td>
                 <td class="member_new_style12">
                   <input name="address" id="address" type="text" class="member_new_style13" size="60" maxlength="120"
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
                   <input type="submit" value="確定送出" onclick="return CheckFields();" />
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
<?php require_once('Connections/connection.php'); ?>
<?php require_once('Connections/function.php'); ?>
<?php
// 建立 session
if (!isset($_SESSION)) {
  session_start();
}
// 前一個網頁
$_SESSION['PrevPage'] = "login_form.php";
?>
<?php
//*******************************//
// 登入
//*******************************//

// 有帳號與密碼欄位
if (isset($_POST['username']) && isset($_POST['password'])) 
{
    // 帳號與密碼欄位
	$username = $_POST['username'];
  	$password = $_POST['password'];	
	// 選擇 MySQL 資料庫ch30
	mysql_select_db('ch30', $connection) or die('資料庫ch30不存在');	  
	
  	// 查詢member資料表的username與password欄位
  	$query = sprintf("SELECT username, password, userlevel FROM member WHERE username=%s AND password=%s",
        GetSQLValue($username, "text"), GetSQLValue($password, "text")); 		
   	// 傳回結果集
    $result = mysql_query($query, $connection);	
	
	if ($result)
	{
		// 結果集的記錄筆數
    	$totalRows = mysql_num_rows($result);
	
		// 使用者輸入的帳號與密碼存在於member資料表
    	if ($totalRows) 
		{    
			// 建立session變數
    		$_SESSION['Username'] = $username;
		    $_SESSION['UserGroup'] = mysql_result($result, 0, 'userlevel');
			// 成功登入, 前往 main.php
    		header("Location: member_center.php");
	  	}
  		else 
		{
		    // login_form.php的標題
			$_SESSION['login_form_title'] = "無效的帳號或密碼";
		    // 重新登入, 前往login_form.php 
    		header("Location: login_form.php");
  		}
	}
	else
	{
	    // login_form.php的標題
		$_SESSION['login_form_title'] = "無效的帳號或密碼";
		// 無效的帳號或密碼, 重新登入, 前往login_form.php 
    	header("Location: login_form.php");
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>會員登入</title>
<link href="CSS/login_form.css" rel="stylesheet" type="text/css" />
<script src="JavaScript/login_form.js" type="text/javascript"></script>
</head>
<body>
<!-- 載入上邊區塊 -->
<?php require_once("menu_top.php"); ?>
<table class="login_form_style1">
<?php
  echo "
  <tr>
    <td class='login_form_style12'>
	  <span class='login_form_style3'>";
        echo $_SESSION['login_form_title'];
  echo "
      </span>
	</td>
  </tr>";
?>
  <tr>
    <td class="login_form_style4">
	  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table class="login_form_style5">
          <tr>
            <td class="login_form_style6">
              <span class="login_form_style7">
                帳號
                <input name="username" id="username" type="text" size="20" maxlength="10" class="login_form_style8" />
              </span>
            </td>
          </tr>
          <tr>
            <td class="login_form_style6">
              <span class="login_form_style7">
                密碼
                <input name="password" id="password" type="password" size="20" maxlength="12" class="login_form_style8" />
              </span>
            </td>
          </tr>
          <tr>
            <td class="login_form_style6">
			  <input type="submit" value="登入" class="login_form_style9" onclick="return CheckFields();" />
            </td>
		  </tr>
	    </table>
      </form>
	</td>
  </tr>
  <tr>
    <td class="login_form_style10">
      如您尚未加入會員，請
	  <a href="member_new.php" class="login_form_style11">按此</a>
      <br />
      忘記密碼了，
	  <a href="exec_help.php" class="login_form_style11">請幫助我</a>
    </td>
  </tr>
</table>
<!-- 載入下邊區塊 -->
<?php require_once("menu_bottom.php"); ?>
</body>
</html>
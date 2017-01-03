<?php require_once('Connections/connection.php'); ?>
<?php require_once('Connections/function.php'); ?>
<?php
// 建立 session
if (!isset($_SESSION)) {
  session_start();
}
// 前一個網頁
$_SESSION['PrevPage'] = $_SERVER['PHP_SELF'];
?>
<?php
//*******************************//
// 登入
//*******************************//
// login_form.php的標題
$_SESSION['login_form_title'] = "請先登入";

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
	$result = mysql_query($query, $connection) or die(mysql_error());
	
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
			header("Location: index.php");
		}
		else 
		{
			// 重新登入, 前往login_form.php 
			header("Location: login_form.php");
		}
	}
	else
	{		
		// 無效的帳號或密碼, 重新登入, 前往login_form.php 
		header("Location: login_form.php");
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::WJ書局::</title>
<link href="CSS/member_center.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- 載入上邊區塊 -->
<?php require_once("menu_top.php"); ?>
<table class="member_center_style1">
  <tr>
    <td class="member_center_style2">
	  <span class="member_center_style3">
        WJ書局 - 會員中心            
      </span>          
    </td>
  </tr>
  <tr>
    <td>
	  <table class="member_center_style4">
        <tr>
          <td class="member_center_style5">
            <span class="member_center_style6">【會員中心】</span>
            <br /><br />
            <span class="member_center_style7">在「會員中心」裡，您可以查看，修改，管理與您相關的各項資料。</span>
            <br />
            <span class="member_center_style7">請您安心地進行各項資料的維護。</span>
            <br /><br />
            <span class="member_center_style7">「會員中心」提供如下數種服務：</span>
            <span class="member_center_style7">
            <ol>
              <li>修改我的個人基本資料，例如地址、e-mail等。</li>
              <li>修改 / 查詢我的個人密碼。</li>
	  	      <li>定期收到最新的購物資訊及好康特惠訊息。</li>
              </ol>
            </span>
            <span class="member_center_style7">如果您尚未加入會員，歡迎加入我們的會員。</span>
            <br /><br /><br /><br />
            <a href="member_new.php" class="member_center_style8">加入會員 》</a>
          </td>
          <td class="member_center_style9">
	          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
              <table class="member_center_style10">
                <tr>
                  <td class="member_center_style11">
                    <span class="member_center_style12">
                      帳號
                      <input name="username" id="username" type="text" size="12" maxlength="10" class="member_center_style13" />
                    </span>
                  </td>
                </tr>
                <tr>
                  <td class="member_center_style11">
                    <span class="member_center_style12">
                      密碼
                      <input name="password" id="password" type="password" size="12" maxlength="12" 
                        class="member_center_style13" />
                    </span>
                  </td>
                </tr>
                <tr>
                  <td class="member_center_style14">
                    <input type="submit" value="登入" class="member_center_style16" />
                  </td>
                </tr>
                </table>
              </form>
            <hr class="member_center_style17" />
					<?php
            // 已經登入
            if (isset($_SESSION['Username'])) 
            {
          ?>
              <a href="member_info.php" class="member_center_style18">基本資料 》</a>
            	<hr class="member_center_style17" />
					<?php
            }
          ?>
            <a href="exec_help.php" class="member_center_style18">忘記密碼 》</a>
            <hr class="member_center_style17" /> 
          </td>
        </tr>
      </table>    
    </td>
  </tr>
</table>
<!-- 載入下邊區塊 -->
<?php require_once("menu_bottom.php"); ?>
</body>
</html>
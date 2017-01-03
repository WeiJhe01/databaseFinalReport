<?php require_once('Connections/connection.php'); ?>
<?php require_once('Connections/function.php'); ?>
<?php 
if (!isset($_SESSION)) {
  session_start();
} 
// 已經登入
if ((isset($_SESSION['Username'])) && (isset($_SESSION['UserGroup']))) {
  header('Location: order_step02.php');
}
// 前一個網頁
$_SESSION['PrevPage'] = $_SERVER['PHP_SELF'];
?>
<?php
//------------------------------------
// 修改購買商品的數量
//------------------------------------

if (isset($_POST['order_nextstep'])) 
{
  // [數量]文字欄位的索引值
  $index = 0;
  // 巡迴購物車內的所有商品
  foreach ($_SESSION['item']['item_index'] as $key => $value) 
  {
    // 有商品
    if (isset($_SESSION['item']['item_index'][$key])) 
    {			
			// 重新設定商品的數量
      $_SESSION['item']['quantity'][$key] = $_POST['order_quantity'][$index];
		}
		// [數量]文字欄位的索引值
		$index++;
  } 
	
	header('Location: order_step02.php');
}
?>
<?php
//------------------------------------
// 刪除購買的商品
//------------------------------------

// $_POST['order_delete'] 是[刪除]按鈕, $_POST['order_check'] 是核取方塊
if (isset($_POST['order_delete']) && isset($_POST['order_check'])) 
{ 
  // 巡迴所有的商品核取方塊
  foreach ($_POST['order_check'] as $key => $value) 
  {
    // 商品的核取方塊被勾選, $_POST['order_check'][$key]等於value屬性值
    if (isset($_POST['order_check'][$key])) 
		{	      
			// 第?個商品被刪除
			$index = $_POST['order_check'][$key];
			// 商品的編號				
			$_SESSION['item']['item_index'][$index] = NULL;
			unset($_SESSION['item']['item_index'][$index]);
			// 商品的名稱
			$_SESSION['item']['item_name'][$index] = NULL;
			unset($_SESSION['item']['item_name'][$index]);
			// 商品的單價
			$_SESSION['item']['price'][$index] = NULL;
			unset($_SESSION['item']['price'][$index]);
			// 商品的數量
			$_SESSION['item']['quantity'][$index] = NULL;
			unset($_SESSION['item']['quantity'][$index]);
			// 商品的總價
			$_SESSION['item']['total_price'][$index] = NULL;
			unset($_SESSION['item']['total_price'][$index]);	
		}
  }
}
?>
<?php
//------------------------------------
// 登入
//------------------------------------

// 有帳號與密碼欄位
if (isset($_POST['username']) && isset($_POST['password'])) 
{
	// 選擇 MySQL 資料庫ch30
	mysql_select_db('ch30', $connection) or die('資料庫ch30不存在'); 
	// 帳號與密碼欄位
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);	
	// 查詢 member 資料表
	$query = sprintf("SELECT username, password, userlevel FROM member WHERE username=%s AND password=%s",
			GetSQLValue($username, "text"), GetSQLValue($password, "text")); 
	// 傳回結果集
	$result = mysql_query($query, $connection) or die(mysql_error());
	
	if ($result)
	{
		// 目前的列
		$row = mysql_fetch_assoc($result);
		// 結果集的記錄筆數
		$totalRows = mysql_num_rows($result);
		
		// 使用者輸入的帳號與密碼存在於member資料表
		if ($totalRows) 
		{    
			// 建立session變數
			$_SESSION['Username'] = $username;
			$_SESSION['UserGroup'] = mysql_result($result, 0, 'userlevel');
			// 釋放結果集
			mysql_free_result($result);
		}
	}
		
	// 成功登入, 前 往order_step02.php
	header("Location: order_step01.php");
}
?>
<?php
//------------------------------------
// 檢查購物車內是否有商品
//------------------------------------

// 購物車內有商品
$_SESSION['has_item'] = TRUE;
// 商品的編號				
if (!isset($_SESSION['item']['item_index']) || (count($_SESSION['item']['item_index']) == 0)) {
  // 購物車內沒有商品
  $_SESSION['has_item'] = FALSE;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::WJ書局::</title>
<link href="CSS/order_step01.css" rel="stylesheet" type="text/css" />
<script src="JavaScript/order_step01.js" type="text/javascript"></script>
</head>
<body>
<!-- 載入上邊區塊 -->
<?php require_once("menu_top.php"); ?>
<table class="order_step01_style1">
  <tr>
    <td class="order_step01_style2">
      <table class="order_step01_style3">
        <tr>
          <td class="order_step01_style4">
            step1. 登入
          </td>
          <td class="order_step01_style5">
            step2. 檢視 / 修改
          </td>
          <td class="order_step01_style5">
            step3. 預覽 / 付款
          </td>
          <td class="order_step01_style5">
            step4. 完成訂單
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td class="order_step01_style6">
      <form method="post">
        <table class="order_step01_style7">
          <tr>
            <td class="order_step01_style8">》為了避免您的購物資料遺失，
              <span class="order_step01_style33">
                請立即登入
              </span>
            </td>
          </tr>
        </table>
        <table class="order_step01_style7">
          <tr>
            <td class="order_step01_style9">帳　號</td>
            <td class="order_step01_style9">密　碼</td>
            <td class="order_step01_style10">&nbsp</td>
          </tr>
          <tr>
            <td class="order_step01_style11">
              <input name="username" id="username" type="text" maxlength="12" class="order_step01_style12" />
            </td>
            <td class="order_step01_style11">
              <input name="password" id="password" type="password" maxlength="12" class="order_step01_style12" />
            </td>
            <td class="order_step01_style11">
              &nbsp
            </td>
          </tr>
        </table>
        <table class="order_step01_style7">
          <tr>
            <td class="order_step01_style13">
              <a href="member_new.php" class="order_step01_style14">
                免費加入會員
              </a>
               ｜
              <a href="exec_help.php" class="order_step01_style14">
                忘記密碼
              </a>				  
            </td>
            <td class="order_step01_style15">
              <input type="submit" value="我要登入" onclick="return CheckFields();" />
            </td>
          </tr>
        </table>
      </form>
    </td>
  </tr>
  <tr>
    <td>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="order_step01_style16">
        <table class="order_step01_style7">
          <tr>
            <td class="order_step01_style8">》臨時購物車</td>
          </tr>
        </table>
        <!-- ------------------------ -->
        <!--      顯示購物車內的商品    -->
        <!-- ------------------------ -->
        <table class="order_step01_style7">
          <tr>
            <td class="order_step01_style17">X</td>
            <td class="order_step01_style18">編號</td>
            <td class="order_step01_style19">名稱</td>
            <td class="order_step01_style20">單價</td>
            <td class="order_step01_style21">數量</td>
          </tr>
				<?php 
          if (isset($_SESSION['item']['item_index'])) 
          {					
            // 巡迴購物車內的每個商品
            foreach ($_SESSION['item']['item_index'] as $key => $value) 
						{ 
        ?>
          <tr>
            <!-- 顯示購物車內商品的索引值 -->
            <td class="order_step01_style22">
              <input name="order_check[]" type="checkbox" value="<?php echo $key; ?>" />
            </td>
            <!-- 顯示購物車內商品的編號 -->
            <td class="order_step01_style23">
							<?php echo $_SESSION['item']['item_index'][$key]; ?>
            </td>
            <!-- 顯示購物車內商品的名稱 -->
            <td class="order_step01_style23">
							<?php echo $_SESSION['item']['item_name'][$key]; ?>
            </td>
            <!-- 顯示購物車內商品的單價 -->
            <td class="order_step01_style23">
							<?php echo $_SESSION['item']['price'][$key]; ?>
            </td>
            <!-- 顯示購物車內商品的數量 -->
            <td class="order_step01_style22">
              <input name="order_quantity[]" type="text" size="3" maxlength="3" 
                value="<?php echo $_SESSION['item']['quantity'][$key]; ?>" />
            </td>
          </tr>
				<?php 
            } 
          } 
        ?>
        </table>
        <!-- ------------------------------------------------------ -->
        <!-- 顯示 "刪除","修改數量","清空購物車","繼續購物","下一步" 按鈕 -->
        <!-- ------------------------------------------------------ -->
        <table class="order_step01_style7">
				<?php 
          // 購物車沒有商品
          if (!$_SESSION['has_item']) 
          { 
        ?>
					<tr>
            <td>
              <table class="order_step01_style7">
                <tr>
                  <td colspan="5" class="order_step01_style24">
                    沒有商品
                  </td>
                </tr>
              </table>
            </td>
          </tr>
				<?php 
          } 
					// 購物車內有商品
          else
          { 
        ?>
					<tr>
            <td> 
              <table class="order_step01_style7">
                <tr>
                  <td class="order_step01_style25"> 
                    <input name="order_delete" id="order_delete" type="submit" value="刪除" />
                  </td>
                </tr>
              </table>	
            </td>
          </tr>
				<?php 
          } 
        ?>
          <tr>
            <td>
              <table class="order_step01_style7">
                <tr>
                  <?php 
									  // 購物車內有商品
									  if ($_SESSION['has_item']) 
										{ 
									?>
                  <td class="order_step01_style27">
                    <input type="button" value="清空購物車" onclick="return clearCart();" />
                  </td>
                  <?php 
									  } 
								  ?>
                  <td class="order_step01_style28">
                    <input type="button" value="繼續購物" class="order_step01_style29" 
                       onclick="document.location='<?php echo $_SESSION['shopping_page']; ?>'; return false;" />		
                  <?php 
									  // 購物車內有商品
									  if (isset($_SESSION['Username']) && $_SESSION['has_item']) 
										{ 
									?>	
                      <input name="order_nextstep" id="order_nextstep" class="order_step01_style29" type="submit" value="下一步" />	
								  <?php 
									  } 
									?>	
                  </td>
                </tr>
              </table>	
            </td>
          </tr>
        </table>
      </form>
    </td>
  </tr>
  <tr>
    <td class="order_step01_style30">
      <table class="order_step01_style31">
        <tr>
          <td>
            <span class="order_step01_style32">
              貼心小叮嚀
            </span>
            <br /> 
            <ul>
              <li class="order_step01_style36">
                <span class="order_step01_style33">
                  德瑞購物網目前服務地區只限台灣本島
                </span>
                ，付款幣別為新台幣。
              </li>
              <li class="order_step01_style36">
                下載版軟體購買說明
                <br />
                <table class="order_step01_style34">
                  <tr>
                    <td class="order_step01_style35">
                      1. 
                      <span class="order_step01_style33">
                        出貨方式
                      </span>
                      <br />
                      此商品為線上下載版軟體，德瑞購物網將於確認收到您的貨款無誤後，一個工作天即為您辦理出貨程序，軟體的序號及下載軟體的位置，將會以email通知收貨人。
                      <br />
                      2. 
                      <span class="order_step01_style33">
                        退換貨相關
                      </span>
                      <br />
                      下載版軟體在線上交易成功之後，系統將以電子郵件方式發送軟體登入序號，不需要拆封即可立即安裝使用，因此序號一經發出後，恕不受理退換貨。
                    </td>
                  </tr> 
                </table>
              </li>
              <li class="order_step01_style36">
                <span class="order_step01_style33">
                  單次訂購滿1000元即可免費宅配
                </span>
                ，未滿1000元酌收運費100元。
                <br />
                建議您可以購買我們所推廌的商品，以節省您的運費
              </li>
              <li class="order_step01_style36">
                請注意避免刷卡不成功:
                <br />
                1.
                <span class="order_step01_style33">
                  卡號填錯
                </span>
                2.
                <span class="order_step01_style33">
                  過期
                </span>
                3.
                <span class="order_step01_style33">
                  檢查碼cvc2沒填或輸入錯誤
                </span>
                4.
                <span class="order_step01_style33">
                  已刷爆
                </span>
                5.
                <span class="order_step01_style33">
                  該卡非VISA / MASTER / JCB
                </span>
              </li>
              <li class="order_step01_style36">
                使用ATM轉帳 / 郵政劃撥 / 電匯付款的讀者，完成付款之後請 
                <span class="order_step01_style33">
                  傳真您的收據
                </span>
                到 
                <span class="order_step01_style33">
                  (02)1234-5678
                </span>
                。
              </li>
            </ul> 
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
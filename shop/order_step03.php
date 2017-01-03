<?php require_once('Connections/connection.php'); ?>
<?php require_once('Connections/function.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
// 尚未登入
if ((!isset($_SESSION['Username'])) && (!isset($_SESSION['UserGroup']))) {
  header('Location: order_step01.php');
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

// 沒有加入商品
if (!$_SESSION['has_item']) {
  header('Location: order_step02.php');
}
?>
<?php
//------------------------------------
// 設定付款方式
//------------------------------------
 
if (isset($_POST['order_nextstep'])) 
{
  $_SESSION['payment'] = $_POST['payment'];
  header('Location: order_step04.php');
}
?>
<?php
//------------------------------------
// 顯示購物者的資料
//------------------------------------

// 選擇 MySQL 資料庫ch30
mysql_select_db('ch30', $connection) or die('資料庫ch30不存在'); 
// 查詢 member 資料表
$query = sprintf("SELECT * FROM member WHERE username = %s", GetSQLValue($_SESSION['Username'], "text"));
// 傳回結果集
$result = mysql_query($query, $connection) or die(mysql_error());

if ($result)
{
  // 目前的列
	$row = mysql_fetch_assoc($result);
	// 結果集的記錄筆數
	$totalRows = mysql_num_rows($result);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::WJ書局::</title>
<link href="CSS/order_step03.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- 載入上邊區塊 -->
<?php require_once("menu_top.php"); ?>
<table class="order_step03_style1">
  <tr>
    <td class="order_step03_style2">
      <table class="order_step03_style3">
        <tr>
          <td class="order_step03_style5">
            step1. 登入
          </td>
          <td class="order_step03_style5">
            step2. 檢視 / 修改
          </td>
          <td class="order_step03_style4">
            step3. 預覽 / 付款
          </td>
          <td class="order_step03_style5">
            step4. 完成訂單
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td class="order_step03_style6">
      <form method="post">
        <table class="order_step03_style7">
          <tr>
            <td class="order_step03_style8">》請填入收件人的相關資料</td>
          </tr>
        </table>
        <table class="order_step03_style7">
          <tr>
            <td class="order_step03_style9">收件人</td>
            <td class="order_step03_style10">收件地址</td>
            <td class="order_step03_style11">統一編號</td>
            <td class="order_step03_style12">發票抬頭</td>
          </tr>
          <tr>
            <td class="order_step03_style13">
              <input name="name" id="name" type="text" class="order_step03_style14" 
                value="<?php echo $row['name']; ?>" />
            </td>
            <td class="order_step03_style13">
              <input name="address" id="address" type="text" class="order_step03_style14" 
                value="<?php echo $row['address']; ?>" />
            </td>
            <td class="order_step03_style13">
              <input name="uniform" id="uniform" type="text" class="order_step03_style14" 
                value="<?php echo $row['uniform']; ?>" />
            </td>
            <td class="order_step03_style13">
              <input name="unititle" id="unititle" type="text" class="order_step03_style14" 
                value="<?php echo $row['unititle']; ?>" />
            </td>
          </tr>
        </table>
      </form>
    </td>
  </tr>
  <tr>
    <td>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="order_step03_style15">
        <!-- ------------------------ -->
        <!--      顯示購物車內的商品    -->
        <!-- ------------------------ -->
        <table class="order_step03_style7">
          <tr>
            <td class="order_step03_style16">編號</td>
            <td class="order_step03_style17">名稱</td>
            <td class="order_step03_style18">單價</td>
            <td class="order_step03_style19">數量</td>
            <td class="order_step03_style20">小計</td>
          </tr>
				<?php 				
					// 付款總計
	  			$_SESSION['total'] = 0; 
						
          if (isset($_SESSION['item']['item_index'])) 
          {							
            // 巡迴購物車內的每個商品
            foreach ($_SESSION['item']['item_index'] as $key => $value) 
						{ 
						  // 購物車的總金額
   				    $_SESSION['item']['total_price'][$key] = $_SESSION['item']['price'][$key] * $_SESSION['item']['quantity'][$key];
        ?>
          <tr>
            <!-- 顯示購物車內商品的編號 -->
            <td class="order_step03_style22">
							<?php echo $_SESSION['item']['item_index'][$key]; ?>
            </td>
            <!-- 顯示購物車內商品的名稱 -->
            <td class="order_step03_style22">
							<?php echo $_SESSION['item']['item_name'][$key]; ?>
            </td>
            <!-- 顯示購物車內商品的單價 -->
            <td class="order_step03_style22">
							<?php echo $_SESSION['item']['price'][$key]; ?>
            </td>
            <!-- 顯示購物車內商品的數量 -->
            <td class="order_step03_style22">
              <?php echo $_SESSION['item']['quantity'][$key]; ?>
            </td>
            <!-- 顯示購物車內商品的總價 -->
            <td class="order_step03_style22">
              <?php echo $_SESSION['item']['total_price'][$key]; ?>
            </td>
          </tr>
				<?php 						            
							// 付款總計
							$_SESSION['total'] += $_SESSION['item']['total_price'][$key];
            }
          } 

					// 加上運費
					$_SESSION['total'] += 100; 
        ?>
        </table>
        <!-- ------------------- -->
        <!--     顯示運費與總計    -->
        <!-- ------------------- -->
        <table class="order_step03_style7">
          <tr>
            <td class="order_step03_style23">運費</td>
            <td class="order_step03_style24">&nbsp;</td>
            <td class="order_step03_style24">+</td>
            <td class="order_step03_style25">100</td>
          </tr>
          <tr>
            <td class="order_step03_style23">總計</td>
            <td class="order_step03_style24">&nbsp;</td>
            <td class="order_step03_style24">&nbsp;</td>
            <td class="order_step03_style25"><?php echo  $_SESSION['total']; ?></td>
          </tr>
        </table>
        <!-- ----------------- -->
        <!--     選擇付款方式    -->
        <!-- ----------------- -->
        <table class="order_step03_style28">
          <tr>
            <td class="order_step03_style26">
				      <span class="order_step03_style27">
                》請選擇付款方式
              </span>
            </td>
          </tr>
          <tr>
            <td class="order_step03_style26">
              <input name="payment" id="payment" type="radio" value="線上刷卡" checked="checked" />
              <span class="order_step03_style27">
                線上刷卡
              </span>
               財金資訊公司 - SSL PLUS 網路交易安全付款機制
              <br />
              <input name="payment" id="payment" type="radio" value="郵政劃撥" />
              <span class="order_step03_style27">
                郵政劃撥
              </span>
               戶名：德瑞購物廣場股份有限公司 劃撥帳號：12345678
              <br />
              <input name="payment" id="payment" type="radio" value="電匯付款" />
              <span class="order_step03_style27">
                電匯付款
              </span>
                帳號：台北三得銀行(代碼111) 南港分行 1111-2222-3333<br />
              <input name="payment" id="payment" type="radio" value="ATM轉帳" />
              <span class="order_step03_style27">
                ATM轉帳
              </span>
                帳號：台北三得銀行(代碼111) 南港分行 2222-3333-4444 
            </td>
          </tr>
        </table>
        <!-- ------------------------ -->
        <!-- 顯示 "上一步","下一步" 按鈕 -->
        <!-- ------------------------ -->
        <table class="order_step03_style7">
          <tr>
            <td class="order_step03_style29">
              <input type="button" value="上一步" 
                onclick="document.location='order_step02.php'; return false;" />	
            </td>
            <td class="order_step03_style30">
              <input name="order_nextstep" id="order_nextstep" type="submit" value="下一步" />	
            </td>
          </tr>
        </table>
      </form>
    </td>
  </tr>
</table>
<!-- 載入下邊區塊 -->
<?php require_once("menu_bottom.php"); ?>
</body>
</html>
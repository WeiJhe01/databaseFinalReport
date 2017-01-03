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
// 付款方式
if (!isset($_SESSION['payment'])) {
  $_SESSION['payment'] = '線上刷卡';
}

// 訂單編號
if (!isset($_SESSION['order_index'])) {
  $_SESSION['order_index'] = 'DR-' . strtoupper($_SESSION['Username']) . '-' . date('ymdHis');
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
<?php
//-----------------------------------------
// 插入訂單的商品詳細資料
//-----------------------------------------

if ((isset($_POST["insert"])) && ($_POST["insert"] == "order_form")) 
{
	// 選擇 MySQL 資料庫ch30
	mysql_select_db('ch30', $connection) or die('資料庫ch30不存在');	
	
	// 購物車內有商品
  if (isset($_SESSION['item']['item_index'])) 
  {
    // 巡迴購物車內的所有商品
		foreach ($_SESSION['item']['item_index'] as $key => $value) 
		{
			if (isset($_SESSION['item']['item_index'][$key])) 
			{
			  // 在order_detail資料表內插入一筆新的紀
				$query = sprintf("INSERT INTO order_detail (username, order_index, item_index, item_name, quantity, single_price, total_price) VALUES (%s, %s, %s, %s, %s, %s, %s)",
					GetSQLValue($_POST['username'], "text"),
					GetSQLValue($_POST['order_index'], "text"),
					GetSQLValue($_SESSION['item']['item_index'][$key], "text"),
					GetSQLValue($_SESSION['item']['item_name'][$key], "text"),
					GetSQLValue($_SESSION['item']['quantity'][$key], "int"),
					GetSQLValue($_SESSION['item']['price'][$key], "int"),
					GetSQLValue($_SESSION['item']['total_price'][$key], "int"));
			
					// 傳回結果集
					$result = mysql_query($query, $connection);
			}
		}
	}
}
?>
<?php
//-----------------------------------------
// 插入訂單的總金額,日期,與付款方式
//-----------------------------------------

if ((isset($_POST["insert"])) && ($_POST["insert"] == "order_form")) 
{
	// 選擇 MySQL 資料庫ch30
	mysql_select_db('ch30', $connection) or die('資料庫ch30不存在');	
	
	// 在order_list資料表內插入一筆新的紀
	$query = sprintf("INSERT INTO order_list (username, order_index, order_price, payment, order_date) VALUES (%s, %s, %s, %s, %s)",
						 GetSQLValue($_POST['username'], "text"),
						 GetSQLValue($_POST['order_index'], "text"),
						 GetSQLValue($_POST['order_price'], "int"),
						 GetSQLValue($_POST['payment'], "text"),
						 GetSQLValue($_POST['order_date'], "date"));
			
	// 傳回結果集
	$result = mysql_query($query, $connection);
	
	if ($result) {
		header("Location: order_confirm.php");
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::WJ書局::</title>
<link href="CSS/order_step04.css" rel="stylesheet" type="text/css" />
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
          <td class="order_step03_style5">
            step3. 預覽 / 付款
          </td>
          <td class="order_step03_style4">
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
          if (isset($_SESSION['item']['item_index'])) 
          {					
            // 巡迴購物車內的每個商品
            foreach ($_SESSION['item']['item_index'] as $key => $value) 
						{ 
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
            }
          } 
        ?>
        </table>
        <!-- ------------------- -->
        <!--     顯示運費與總計    -->
        <!-- ------------------- -->
        <table class="order_step03_style28">
          <tr>
            <td class="order_step03_style26">
				      付款方式
            </td>
            <td class="order_step03_style27">
				      <?php echo $_SESSION['payment'] ?>
            </td>
          </tr>
          <tr>
            <td class="order_step03_style26">
				      訂單編號
            </td>
            <td class="order_step03_style27">
				      <?php echo $_SESSION['order_index'] ?>
            </td>
          </tr>
          <tr>
            <td class="order_step03_style26">
				      訂單金額 
            </td>
            <td class="order_step03_style27">
				      新台幣 
							<span class="order_step03_style31">
							  <?php echo $_SESSION['total'] ?>
              </span>
              元整
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
                onclick="document.location='order_step03.php'; return false;" />	
            </td>
            <td class="order_step03_style30">
              <input type="submit" value="確認付款" />	
            </td>
          </tr>
        </table>
			  <input name="username" id="username" type="hidden" value="<?php echo $row['username']; ?>" />
			  <input name="order_index" id="order_index" type="hidden" value="<?php echo $_SESSION['order_index']; ?>" />
        <input name="order_price" id="order_price" type="hidden" value="<?php echo $_SESSION['total']; ?>" />
			  <input name="payment" id="payment" type="hidden" value="<?php echo $_SESSION['payment']; ?>" />
			  <input name="order_date" id="order_date" type="hidden" value="<?php echo date('Y-m-d H:i:s'); ?>" />
			  <input name="insert" id="insert" type="hidden" value="order_form" />
      </form>
    </td>
  </tr>
</table>
<!-- 載入下邊區塊 -->
<?php require_once("menu_bottom.php"); ?>
</body>
</html>
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
	
	header('Location: order_step03.php');
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
// 更改購物者的資料
//------------------------------------

if ((isset($_POST["update"])) && ($_POST["update"] == "update_form")) 
{
  // 選擇 MySQL 資料庫ch30
  mysql_select_db('ch30', $connection) or die('資料庫ch30不存在'); 
	// 查詢 member 資料表
  $query = sprintf("UPDATE member SET name=%s, address=%s, uniform=%s, unititle=%s WHERE id=%s",
		 GetSQLValue(trim($_POST['name']), "text"),
		 GetSQLValue(trim($_POST['address']), "text"),
		 GetSQLValue(trim($_POST['uniform']), "text"),
		 GetSQLValue(trim($_POST['unititle']), "text"),
		 GetSQLValue($_POST['id'], "int"));
  
	// 傳回結果集
  $result = mysql_query($query, $connection) or die(mysql_error());
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
<link href="CSS/all.css" rel="stylesheet" type="text/css" />
<link href="CSS/order_step02.css" rel="stylesheet" type="text/css" />
<script src="JavaScript/order_step02.js" type="text/javascript"></script>
</head>
<body>
<!-- 載入上邊區塊 -->
<?php require_once("menu_top.php"); ?>
<table class="order_step02_style1">
  <tr>
    <td class="order_step02_style2">
      <table class="order_step02_style3">
        <tr>
          <td class="order_step02_style5">
            step1. 登入
          </td>
          <td class="order_step02_style4">
            step2. 檢視 / 修改
          </td>
          <td class="order_step02_style5">
            step3. 預覽 / 付款
          </td>
          <td class="order_step02_style5">
            step4. 完成訂單
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td class="order_step02_style6">
      <form method="post">
        <table class="order_step02_style7">
          <tr>
            <td class="order_step02_style8">》請填入收件人的相關資料</td>
          </tr>
        </table>
        <table class="order_step02_style7">
          <tr>
            <td class="order_step02_style9">收件人</td>
            <td class="order_step02_style10">收件地址</td>
            <td class="order_step02_style11">統一編號</td>
            <td class="order_step02_style12">發票抬頭</td>
          </tr>
          <tr>
            <td class="order_step02_style13">
              <input name="name" id="name" type="text" class="order_step02_style14" 
                value="<?php echo $row['name']; ?>" />
            </td>
            <td class="order_step02_style13">
              <input name="address" id="address" type="text" class="order_step02_style14" 
                value="<?php echo $row['address']; ?>" />
            </td>
            <td class="order_step02_style13">
              <input name="uniform" id="uniform" type="text" class="order_step02_style14" 
                value="<?php echo $row['uniform']; ?>" />
            </td>
            <td class="order_step02_style13">
              <input name="unititle" id="unititle" type="text" class="order_step02_style14" 
                value="<?php echo $row['unititle']; ?>" />
            </td>
          </tr>
        </table>
        <table class="order_step02_style7">
          <tr>
            <td class="order_step02_style15">
              我想修改
              <a href="member_info.php" class="order_step02_style16">
                會員基本資料》
              </a>				  
            </td>
            <td class="order_step02_style17">
              <input name="shopper_update" id="shopper_update" type="submit" value="修改資料" />
            </td>
          </tr>
        </table>
        <input name="id" type="hidden" id="id" value="<?php echo $row['id']; ?>" />
        <input name="update" id="update" type="hidden" value="update_form">
      </form>
    </td>
  </tr>
  <tr>
    <td>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="order_step02_style18">
        <table class="order_step02_style7">
          <tr>
            <td class="order_step02_style8">》臨時購物車</td>
          </tr>
        </table>
        <!-- ------------------------ -->
        <!--      顯示購物車內的商品    -->
        <!-- ------------------------ -->
        <table class="order_step02_style7">
          <tr>
            <td class="order_step02_style19">X</td>
            <td class="order_step02_style20">編號</td>
            <td class="order_step02_style21">名稱</td>
            <td class="order_step02_style22">單價</td>
            <td class="order_step02_style23">數量</td>
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
            <td class="order_step02_style24">
              <input name="order_check[]" type="checkbox" value="<?php echo $key; ?>" />
            </td>
            <!-- 顯示購物車內商品的編號 -->
            <td class="order_step02_style25">
							<?php echo $_SESSION['item']['item_index'][$key]; ?>
            </td>
            <!-- 顯示購物車內商品的名稱 -->
            <td class="order_step02_style25">
							<?php echo $_SESSION['item']['item_name'][$key]; ?>
            </td>
            <!-- 顯示購物車內商品的單價 -->
            <td class="order_step02_style25">
							<?php echo $_SESSION['item']['price'][$key]; ?>
            </td>
            <!-- 顯示購物車內商品的數量 -->
            <td class="order_step02_style24">
              <input name="order_quantity[]" type="text" size="3" maxlength="3" c
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
        <table class="order_step02_style7">
				<?php 
          // 購物車沒有商品
          if (!$_SESSION['has_item']) 
          { 
        ?>
					<tr>
            <td>
              <table class="order_step02_style7">
                <tr>
                  <td colspan="5" class="order_step02_style26">
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
              <table class="order_step02_style7">
                <tr>
                  <td class="order_step02_style27"> 
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
              <table class="order_step02_style7">
                <tr>
                  <?php 
									  // 購物車內有商品
									  if ($_SESSION['has_item']) 
										{ 
									?>
                  <td class="order_step02_style29">
                    <input type="button" value="清空購物車" onclick="return clearCart();" />
                  </td>
                  <?php 
									  } 
								  ?>
                  <td class="order_step02_style30">
                    <input type="button" value="繼續購物" class="order_step02_style31" 
                       onclick="document.location='<?php echo $_SESSION['shopping_page']; ?>'; return false;" />		
                  <?php 
									  // 購物車內有商品
									  if ($_SESSION['has_item']) 
										{ 
									?>	
                      <input name="order_nextstep" id="order_nextstep" class="order_step02_style31" type="submit" value="下一步" />	
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
    <td class="order_step02_style32">
      <table class="order_step02_style33">
        <tr>
          <td>
            <span class="order_step02_style34">
              貼心小叮嚀
            </span>
            <br /> 
            <ul>
              <li class="order_step02_style38">
                <span class="order_step02_style35">
                  德瑞購物網目前服務地區只限台灣本島
                </span>
                ，付款幣別為新台幣。
              </li>
              <li class="order_step02_style38">
                下載版軟體購買說明
                <br />
                <table class="order_step02_style36">
                  <tr>
                    <td class="order_step02_style37">
                      1. 
                      <span class="order_step02_style35">
                        出貨方式
                      </span>
                      <br />
                      此商品為線上下載版軟體，德瑞購物網將於確認收到您的貨款無誤後，一個工作天即為您辦理出貨程序，軟體的序號及下載軟體的位置，將會以email通知收貨人。
                      <br />
                      2. 
                      <span class="order_step02_style35">
                        退換貨相關
                      </span>
                      <br />
                      下載版軟體在線上交易成功之後，系統將以電子郵件方式發送軟體登入序號，不需要拆封即可立即安裝使用，因此序號一經發出後，恕不受理退換貨。
                    </td>
                  </tr> 
                </table>
              </li>
              <li class="order_step02_style38">
                <span class="order_step02_style35">
                  單次訂購滿1000元即可免費宅配
                </span>
                ，未滿1000元酌收運費100元。
                <br />
                建議您可以購買我們所推廌的商品，以節省您的運費
              </li>
              <li class="order_step02_style38">
                請注意避免刷卡不成功:
                <br />
                1.
                <span class="order_step02_style35">
                  卡號填錯
                </span>
                2.
                <span class="order_step02_style35">
                  過期
                </span>
                3.
                <span class="order_step02_style35">
                  檢查碼cvc2沒填或輸入錯誤
                </span>
                4.
                <span class="order_step02_style35">
                  已刷爆
                </span>
                5.
                <span class="order_step02_style35">
                  該卡非VISA / MASTER / JCB
                </span>
              </li>
              <li class="order_step02_style38">
                使用ATM轉帳 / 郵政劃撥 / 電匯付款的讀者，完成付款之後請 
                <span class="order_step02_style35">
                  傳真您的收據
                </span>
                到 
                <span class="order_step02_style35">
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
<?php
// 釋放結果集
mysql_free_result($result);
?>
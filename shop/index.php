<?php require_once('Connections/connection.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
//**用法說明:http://www.wibibi.com/info.php?tid=85
// 前一個網頁
$_SESSION['PrevPage'] = $_SERVER['PHP_SELF'];
// 購物的網頁
$_SESSION['shopping_page'] = $_SERVER['PHP_SELF'];
?>
<?php
// 目前是第 ? 頁
$page = 0;
if (isset($_GET['page'])) {
  $page = $_GET['page'];
}
?>
<?php
// 尋找關鍵字
if (!isset($_SESSION['keyword']))
	$_SESSION['keyword'] = "";
// 尋找範圍
if (!isset($_SESSION['keyword_category']))
	$_SESSION['keyword_category'] = "";
?>
<?php
//-----------------------------------------------
// 讀取miaoli_food資料庫的shop資料表的全部紀錄
//-----------------------------------------------

// 每頁？筆
$rowsPerPage = 10;
// 作用資料表的名稱
$_SESSION['database'] = 'shop';

// 選擇 MySQL 資料庫miaoli_food
mysql_select_db('miaoli_food', $connection) or die('資料庫miaoli_food不存在'); 
// 查詢shop資料表
$query = "SELECT * FROM " . $_SESSION['database'] ;
// 傳回結果集
$result = mysql_query($query, $connection) or die(mysql_error());

if ($result)
{
	// 結果集的記錄筆數
	$totalRows = mysql_num_rows($result);
	// 總頁數
	$totalPages = ceil($totalRows / $rowsPerPage);
}
?>
<?php
//-----------------------------------------------------
// 讀取miaoli_food資料庫的shop資料表的目前頁的紀錄
//-----------------------------------------------------

// 目前頁的開始列號
$startRow = $page * $rowsPerPage;
// 從目前頁的開始列號開始查詢
$current_query = sprintf("%s LIMIT %d, %d", $query, $startRow, $rowsPerPage);
// 傳回目前頁的結果集
$result = mysql_query($current_query, $connection) or die(mysql_error());
// 目前頁的記錄筆數
if ($result) {	
	$rowsOfCurrentPage = mysql_num_rows($result);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::苗栗美食達人::</title>
<link href="CSS/index.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- 載入上邊區塊 -->
<?php require_once("menu_top.php"); ?>
<table class="index_style1">
  <tr>
    <td class="index_style2">
      <span class="index_style3">
        苗栗美食達人
      </span>
    </td>
  </tr>
</table>
<br />
<?php 
//-----------------------------
// 有書籍的紀錄
//-----------------------------
if ($rowsOfCurrentPage)
{
?> 
  <!--********************************************-->
  <!-- 顯示 資料筆數 ? 共分 ? 頁 第 1 頁/下頁/末頁 -->
  <!--********************************************-->
  <table class="index_style4">
    <tr>
      <td class="index_style5">
        資料筆數 ： <?php echo $totalRows ?> 
      </td>
      <td class="index_style5">
        共分 <?php echo $totalPages; ?> 頁
      </td>
      <td class="index_style5">
        每頁 <?php echo $rowsPerPage; ?> 筆
      </td>
      <td class="index_style6">
			  <?php 
				  if ($page > 0) {
			  ?>
            <a href="<?php printf("%s?page=%d", $_SERVER["PHP_SELF"], 0); ?>" class="index_style7">首頁 /</a>
				<?php 
					}
				?>
        <?php 
				  if ($page > 0) {
			  ?>
            <a href="<?php printf("%s?page=%d", $_SERVER["PHP_SELF"], max(0, $page - 1)); ?>" 
              class="index_style7">上頁 /</a>        
        <?php 
					}
				?>
				第 <?php echo $page + 1; ?> 頁
    		<?php 
				  if ($page < $totalPages - 1) {				
				?>
            <a href="<?php printf("%s?page=%d", $_SERVER["PHP_SELF"], min($totalPages - 1, $page + 1)); ?>" 
              class="index_style7"> / 下頁</a>
        <?php 
					}
				?>
				<?php 
				  if ($page < $totalPages - 1) {				
				?>
            <a href="<?php printf("%s?page=%d", $_SERVER["PHP_SELF"], $totalPages - 1); ?>" class="index_style7"> / 末頁</a>
        <?php 
					}
				?>
      </td>
    </tr>
  </table>
  <!--****************-->
  <!-- 顯示目前頁的資料 -->
  <!--****************-->
  <table class="index_style8">
	<?php 
	  // 左邊的欄位
    $odd = true;
		// 第 ? 個紀錄
		$index = 0;
		
		// 讀取目前的紀錄
    while ($row = mysql_fetch_assoc($result)) 
    { 
      // 左邊的欄位
      if ($odd) 
      { 
    ?>
      <tr>
    <?php 
      }
			
      // 單數列, 顯示不同的背景顏色
      if ($index % 4 < 2) 
      { 
    ?>
		    <td class="index_style9">
    <?php 
      } else {
		?>
			  <td class="index_style16">
    <?php 
      }
		?>
          <table>
            <tr>
              <td class="index_style10">
                <img src="<?php echo 'photo/item/' . $row['shopImg']; ?>" width="100" />
              </td>
              <td class="index_style10">
                <table>
                  <tr>
                    <td class="index_style11">
                      <a href="item_detail.php?pro_id=<?php echo $row['shop_id']; ?>" class="index_style12">
                        <?php echo $row['name']; ?>  
                      </a>     
                    </td>
                  </tr>
                  <tr>
                    <td class="index_style13">
                      <?php echo substr($row['about'], 0, 140); ?> 
                      &nbsp;
                      <a href="item_detail.php?pro_id=<?php echo $row['id']; ?>" class="index_style12">
                        ...更多
                      </a>
                      <br />
                      營業時間 : 
                      <span class="index_style14">
                        <?php echo $row['businessHours']; ?>
                      </span>
                      <br />
<!--                 日期用法
					 發行日 : 
                      <span class="index_style14">
                        <?php //echo date("Y年n月", strtotime($row['publishdate'])); ?>
                      </span>
                      <br />
-->
                      電話 : 
					  <span class="index_style14">
						<?php echo $row['phone']; ?> 
                      </span>
                      <br />
					  地址 : 
					  <span class="index_style14">
						<?php echo $row['address_district']; ?> 
						<?php echo $row['address_detail']; ?> 
                      </span>
                      <br />
<!--                 日期用法
                      <img src="photo/item_list_shop.jpg" />
                      <a href="add_to_cart.php?id=<?php //echo $row['id']; ?>" class="index_style12">				  
                        放入購物車
                      </a>
-->
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
    <?php 
		  // 更換左/右邊欄位
		  $odd = !$odd;
			// 下一個紀錄
			$index++;
			
			// 左邊欄位或目前頁的最後紀錄
      if ($odd || ($index > $rowsPerPage - 1)) 
      {
    ?>
      </tr>
    <?php
			}
    }
    ?>
  </table>
  <!--********************************************-->
  <!-- 顯示 資料筆數 ? 共分 ? 頁 第 1 頁/下頁/末頁 -->
  <!--********************************************-->
  <table class="index_style4">
    <tr>
      <td class="index_style5">
        資料筆數 ： <?php echo $totalRows ?> 
      </td>
      <td class="index_style5">
        共分 <?php echo $totalPages; ?> 頁
      </td>
      <td class="index_style5">
        每頁 <?php echo $rowsPerPage; ?> 筆
      </td>
      <td class="index_style6">
			  <?php 
				  if ($page > 0) {
			  ?>
            <a href="<?php printf("%s?page=%d", $_SERVER["PHP_SELF"], 0); ?>" class="index_style7">首頁 /</a>
				<?php 
					}
				?>
        <?php 
				  if ($page > 0) {
			  ?>
            <a href="<?php printf("%s?page=%d", $_SERVER["PHP_SELF"], max(0, $page - 1)); ?>" 
              class="index_style7">上頁 /</a>        
        <?php 
					}
				?>
				第 <?php echo $page + 1; ?> 頁
    		<?php 
				  if ($page < $totalPages - 1) {				
				?>
            <a href="<?php printf("%s?page=%d", $_SERVER["PHP_SELF"], min($totalPages - 1, $page + 1)); ?>" 
              class="index_style7"> / 下頁</a>
        <?php 
					}
				?>
				<?php 
				  if ($page < $totalPages - 1) {				
				?>
            <a href="<?php printf("%s?page=%d", $_SERVER["PHP_SELF"], $totalPages - 1); ?>" class="index_style7"> / 末頁</a>
        <?php 
					}
				?>
      </td>
    </tr>
  </table>
  <br />
<?php 
}
else
{
?>
  <table>
    <tr>
      <td>
        沒有資料 
      </td>
    </tr>
  </table>
<?php 
}
?>
<!-- 載入下邊區塊 -->
<?php require_once("menu_bottom.php"); ?>
</body>
</html>
<?php
// 釋放結果集
mysql_free_result($result);
?>
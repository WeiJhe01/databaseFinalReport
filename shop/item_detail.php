<?php require_once('Connections/connection.php'); ?>
<?php require_once('Connections/function.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
?>
<?php
//-------------------------
// 顯示目前書籍的詳細資料
//-------------------------

// 選擇 MySQL 資料庫ch30
mysql_select_db('ch30', $connection) or die('資料庫ch30不存在'); 
// 查詢 $_SESSION['database'] 資料表
$query = sprintf("SELECT * FROM " . $_SESSION['database'] . " WHERE id = %s", GetSQLValue($_GET['pro_id'], "int"));
// 傳回 $_SESSION['database'] 資料表的結果集
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
//-------------------------
// 顯示目前書籍的作者相關書籍
//-------------------------

// 選擇 MySQL 資料庫ch30
mysql_select_db('ch30', $connection) or die('資料庫ch30不存在'); 
// 查詢 $_SESSION['database'] 資料表
$query_author_related = "SELECT * FROM " . $_SESSION['database'] . " WHERE ( author='" . 
	$row['author'] . "' OR translator='" . $row['author'] . 
	"' ) AND title <> '" . $row['title'] . "' ORDER By publishdate";
// 傳回 $_SESSION['database'] 資料表的結果集
$result_author_related = mysql_query($query_author_related, $connection) or die(mysql_error());

if ($result_author_related)
{
  // 目前的列
	$row_author_related = mysql_fetch_assoc($result_author_related);
	// 結果集的記錄筆數
	$totalRows_author_related = mysql_num_rows($result_author_related);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::WJ書局::</title>
<link href="CSS/item_detail.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- 載入上邊區塊 -->
<?php require_once("menu_top.php"); ?>
<table class="item_detail_style1">
  <tr>
    <td class="item_detail_style2">
      <table class="item_detail_style1">
        <tr>
          <td class="item_detail_style3">    
						<?php echo $row['title']; ?>
          </td>
        </tr>
      </table>
      <table class="item_detail_style4">
        <tr>
          <td class="item_detail_style5">
            <img src="<?php echo 'photo/item/' . $row['photo']; ?>" width="108" />
            <br /><br />
            <img src="photo/item_list_shop.jpg" />
            <a href="add_to_cart.php?id=<?php echo $row['id']; ?>" class="item_detail_style9">
              放入購物車
            </a>
          </td>
          <td class="item_detail_style6">
            <table class="item_detail_style1">
              <tr>
                <td class="item_detail_style7">
                  編號
                </td>
                <td class="item_detail_style8">
									<?php echo $row['item_index']; ?>
                </td>
              </tr>
              <tr>
                <td class="item_detail_style7">
                  作者
                </td>
                <td class="item_detail_style8">
									<?php echo $row['author']; ?>
                </td>
              </tr>
              <tr>
                <td class="item_detail_style7">
                  翻譯
                </td>
                <td class="item_detail_style8">
									<?php echo $row['translator']; ?>
                </td>
              </tr>
              <tr>
                <td class="item_detail_style7">
                  出版商
                </td>
                <td class="item_detail_style8">
									<?php echo $row['publisher']; ?>
                </td>
              </tr>
              <tr>
                <td class="item_detail_style7">
                  初版日
                </td>
                <td class="item_detail_style8">
									<?php echo date("Y年n月", strtotime($row['publishdate'])); ?>
                </td>
              </tr>
              <tr>
                <td class="item_detail_style7">
                  類別
                </td>
                <td class="item_detail_style8">
									 <?php echo $row['category']; ?> - <?php echo $row['category_type']; ?>
                </td>
              </tr>
              <tr>
                <td class="item_detail_style7">
                  定價
                </td>
                <td class="item_detail_style8">
									 <?php echo $row['price']; ?> 元
                </td>
              </tr>
              <tr>
                <td class="item_detail_style7">
                  線上價
                </td>
                <td class="item_detail_style8">
									<span class="item_detail_style10">
										<?php echo $row['discount']; ?>
                  </span>
                  折
                  <span class="item_detail_style10">
										<?php echo $row['saleprice']; ?>
                  </span>
                  元
                </td>
              </tr>
              <tr>
                <td class="item_detail_style7">
                  備註
                </td>
                <td class="item_detail_style8">
									<?php if ($row['cd']==1) { echo '本產品附光碟'; } ?>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
		<?php 
      if (isset($row['contents'])) 
      { 
    ?>
      <table class="item_detail_style13">
        <tr>
          <td class="item_detail_style11">
            目<br />錄
          </td>
          <td class="item_detail_style12">
						<?php echo nl2br($row['contents']); ?>
          </td>
        </tr>
      </table>
		<?php 
		  } 
		  if (isset($row['feature'])) 
			{ 
	  ?>
      <table class="item_detail_style13">
        <tr>
          <td class="item_detail_style11">
            特<br />色
          </td>
          <td class="item_detail_style12">
						<?php echo nl2br($row['feature']); ?>
          </td>
        </tr>
      </table>
    <?php 
		  } 
		?>
      <table class="item_detail_style13">
        <tr>
          <td class="item_detail_style11">
            光<br />碟<br />內<br />容
          </td>
          <td class="item_detail_style12">
						範例檔案
          </td>
        </tr>
      </table>
      <table class="item_detail_style13">
        <tr>
          <td class="item_detail_style11">
            備<br />註
          </td>
          <td class="item_detail_style12">
						<?php if ($row['color']==1) { echo '彩色書'; } ?>
          </td>
        </tr>
      </table>
    </td>
    <td class="item_detail_style14">
      <table class="item_detail_style15">
        <tr>
          <td class="item_detail_style16">
            <span class="item_detail_style17">
              作 者 相 關：
            </span>
            <br />
            <span class="item_detail_style18">
              <?php echo $row_author_related['author']; ?>
            </span>
          </td>
        </tr>
        <?php 
				 // 有紀錄
				 if ($row_author_related != false)
				 {
					 do 
					 { 
        ?>
        <tr>
          <td class="item_detail_style19">
            <a href="item_detail.php?pro_id=<?php echo $row_author_related['id']; ?>">
              <?php echo $row_author_related['title']; ?>
            </a>
          </td>
        </tr>        
				<?php 
            } 
            while ($row_author_related = mysql_fetch_assoc($result_author_related));
          }
					else
					{
				?>	
        <tr>
          <td class="item_detail_style20">
            <span class="item_detail_style18">
              沒有資料
            </span>
          </td>
        </tr>     
        <?php 
					}
        ?>
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
mysql_free_result($result_author_related);
?>
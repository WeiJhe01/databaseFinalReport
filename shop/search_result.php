<?php require_once('Connections/connection.php'); ?>
<?php require_once('Connections/function.php'); ?>
<?php 
if (!isset($_SESSION)) {
  session_start();
}
// 前一個網頁
$_SESSION['PrevPage'] = $_SERVER['PHP_SELF'];
// 購物的網頁
$_SESSION['shopping_page'] = $_SERVER['PHP_SELF'];
?>
<?php 
$database_array = array("computer_books", "education_software", "commerical_software");
$category_array = array("電腦圖書", "教育軟體", "商用軟體");

// 尋找的關鍵字
if (isset($_POST['keyword'])) 
{
	$keyword = trim($_POST['keyword']);
	$_SESSION['keyword'] = $keyword;
}
else 
{
	if (!empty($_SESSION['keyword'])) {
	  $keyword = $_SESSION['keyword'];
	}
	else {
		header("Location: " . $_SESSION['PrevPage']);
	}
}

// 尋找的資料表種類
if (isset($_POST['keyword_category'])) 
{
	$keyword_category = $_POST['keyword_category'];
	$_SESSION['keyword_category'] = $keyword_category;
}
else 
{
	$keyword_category = "所有商品";
}
?>
<?php 
//------------------------------------
// 顯示搜尋的商品資料
//------------------------------------

// 選擇 MySQL 資料庫ch30
mysql_select_db('ch30', $connection) or die('資料庫ch30不存在'); 

if ($keyword_category == "所有商品")
{
	$result_all = array();
	$row_all = array();
	// 尋找所有商品的資料表
	for ($i = 0; $i < count($database_array); $i++)
	{
		// 查詢書籍標題, 作者, 翻譯者, 以及書籍編號
		$query = "SELECT * FROM " . $database_array[$i] . " WHERE title LIKE '%" . 
			$keyword . "%' OR author LIKE '%" . $keyword . "%' OR translator LIKE '%" . 
			$keyword . "%' OR item_index LIKE '%" . $keyword . "%' ORDER BY publishdate DESC";
		// 傳回結果集
		$result_all[$i] = mysql_query($query, $connection) or die(mysql_error());
	}
}
else
{
	// 尋找 "電腦圖書", "教育軟體", "商用軟體" 資料表
	foreach ($category_array as $key => $value) 
	{
		// 找到尋找範圍
		if ($keyword_category == $value)
		{	
		  // 查詢書籍標題, 作者, 翻譯者, 以及書籍編號
			$query = "SELECT * FROM " . $database_array[$key] . " WHERE title LIKE '%" . 
				$keyword . "%' OR author LIKE '%" . $keyword . "%' OR translator LIKE '%" . 
				$keyword . "%' OR item_index LIKE '%" . $keyword . "%' ORDER BY publishdate DESC";
		  // 傳回結果集
			$result = mysql_query($query, $connection) or die(mysql_error());
	
			if ($result)
			{
			  // 目前的列
				$row = mysql_fetch_assoc($result);
				break;	
			}
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::WJ書局::</title>
<link href="CSS/search_result.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- 載入上邊區塊 -->
<?php require_once("menu_top.php"); ?>
<table class="search_result_style1">
  <tr>
    <td class="search_result_style2">
      <!-- -------------------- -->
      <!--      顯示搜尋的商品    -->
      <!-- -------------------- -->
      <table class="search_result_style3">
        <tr>
          <td class="search_result_style4">編號</td>
          <td class="search_result_style5">書名</td>
          <td class="search_result_style6">作者</td>
          <td class="search_result_style7">出版日</td>
          <td class="search_result_style8">原價</td>
          <td class="search_result_style9">線上價</td>
          <td class="search_result_style10">購買</td>
        </tr>
			<?php
			  //------------------------------- 
				// 顯示 "所有商品"
				//------------------------------- 
				
				if ($keyword_category == "所有商品")
				{
				  // 沒有商品
				  $has_item = false;
					
				  // 尋找所有商品的資料表
					for ($i = 0; $i < count($database_array); $i++)
					{		
						// 有紀錄
						if ($result_all[$i])
						{
							$row_all[$i] = mysql_fetch_assoc($result_all[$i]);
							// 有紀錄
							if ($row_all[$i])
							{
								// 讀取每一筆記錄
								do
								{	
		  ?>
        <tr>
          <td class="search_result_style11">
						<?php echo $row_all[$i]['item_index']; ?>
          </td>
          <td class="search_result_style11">
            <a href="item_detail.php?pro_id=<?php echo $row_all[$i]['id']; ?>" class="search_result_style12">
							<?php echo $row_all[$i]['title']; ?>
            </a>
          </td>
          <td class="search_result_style11">
						<?php echo $row_all[$i]['author']; ?>
          </td>
          <td class="search_result_style11">
						<?php echo date("Y年n月", strtotime($row_all[$i]['publishdate'])); ?>
          </td>
          <td class="search_result_style11">
						<?php echo $row_all[$i]['price']; ?>
          </td>
          <td class="search_result_style11">
						<?php echo $row_all[$i]['saleprice']; ?>
          </td>
          <td align="center" class="search_result_style11">
            <a href="add_to_cart.php?id=<?php echo $row_all[$i]['id']; ?>" class="search_result_style12">
              <img src="photo/item_list_shop.jpg" class="search_result_style13" />
            </a>  
          </td>
        </tr>
        <?php 
								} 
								while ($row_all[$i] = mysql_fetch_assoc($result_all[$i])); 
								
								// 有商品
						    $has_item = true;
							}
						}
					}
					
					// 沒有商品
			    if (!$has_item)
					{
				?>
        <tr>
          <td class="search_result_style16">
						沒有商品
          </td>
        </tr>
        <?php	
				  }
				}
				else
				{	
					//----------------------------------------  
					// 顯示 "電腦圖書", "教育軟體", "商用軟體"
					//----------------------------------------  
					
					// 有紀錄
					if ($row != false)
					{
						// 讀取每一筆記錄
						do
						{			
				?>        
        <tr>
          <td class="search_result_style11">
						<?php echo $row['item_index']; ?>
          </td>
          <td class="search_result_style11">
            <a href="item_detail.php?pro_id=<?php echo $row['id']; ?>" class="search_result_style12">
							<?php echo $row['title']; ?>
            </a>
          </td>
          <td class="search_result_style11">
						<?php echo $row['author']; ?>
          </td>
          <td class="search_result_style11">
						<?php echo date("Y年n月", strtotime($row['publishdate'])); ?>
          </td>
          <td class="search_result_style11">
						<?php echo $row['price']; ?>
          </td>
          <td class="search_result_style11">
						<?php echo $row['saleprice']; ?>
          </td>
          <td align="center" class="search_result_style11">
            <a href="add_to_cart.php?id=<?php echo $row['id']; ?>" class="search_result_style12">
              <img src="photo/item_list_shop.jpg" class="search_result_style13" />
            </a>  
          </td>
        </tr>
        <?php 
						} 
						while ($row = mysql_fetch_assoc($result)); 
					}
					else
					{
				?>
			  <tr>
          <td class="search_result_style16">
						沒有商品
          </td>
        </tr>
        <?php
				  } 
				}
				?>
      </table>
	</td>
  </tr>
</table>
</body>
</html>
<?php
// 釋放結果集
if ($result != false) {
	mysql_free_result($result);
}
	
for($i = 0; $i < count($database_array); $i++)
{
    if ($result_all[$i] != false) {
	    mysql_free_result($result_all[$i]);
		}
}
?>
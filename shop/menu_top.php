<?php require_once('Connections/connection.php'); ?>
<?php require_once('Connections/function.php'); ?>
<?php
// 建立 session
if (!isset($_SESSION)) {
  session_start();
}
// 前一個網頁
$_SESSION['PrevPage'] = "index.php";
?>
<?php
//*******************************//
// 登出
//*******************************//
// index.php?logout=true
$logout = $_SERVER['PHP_SELF'] . "?logout=true";
// index.php網址後面有logout參數
if ((isset($_GET['logout'])) &&($_GET['logout']=="true"))
{
  	// 刪除session變數
  	$_SESSION['Username'] = NULL;
    $_SESSION['UserGroup'] = NULL;
    $_SESSION['PrevUrl'] = NULL;
  	unset($_SESSION['Username']);
    unset($_SESSION['UserGroup']);
    unset($_SESSION['PrevUrl']);
	// 重新執行index.php
  	header("Location: index.php");
}
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
	// 選擇 MySQL 資料庫miaoli_food
	mysql_select_db('miaoli_food', $connection) or die('資料庫miaoli_food不存在'); 
	 
  	// 查詢member資料表的username與password欄位
  	$query = sprintf("SELECT username, password, userlevel FROM member WHERE username=%s AND password=%s",
        GetSQLValue($username, "text"), GetSQLValue($password, "text")); 
   	// 傳回結果集
    $result = mysql_query($query, $connection) or die(mysql_error());
	
}
?>
<link href="CSS/menu_top.css" rel="stylesheet" type="text/css" />
<script src="Spry/xpath.js" type="text/javascript"></script>
<script src="Spry/SpryData.js" type="text/javascript"></script>
<script type="text/javascript">
<!--
  var dsCategorySearch = new Spry.Data.XMLDataSet("xml/category_search.xml", "category/item");
//-->
</script>
<table class="menu_top_style1">
  <tr>
    <td class="menu_top_style2">
      <img src="photo/logo.jpg" alt="苗栗美食達人" width="250px" height="125px"/>
	  </td>
    <td class="menu_top_style3">
	    <table class="menu_top_style1">
        <tr>
          <td class="menu_top_style4">
            <table class="menu_top_style1">
              <tr>
                <td>&nbsp;                  
                </td>
                <!--新手操作說明
				<td class="menu_top_style5">
                  <a href="freshman.php"><img src="photo/menu_top/freshman.jpg" alt="新手上路" class="menu_top_style6" /></a> 
                </td>
				-->
                <td class="menu_top_style5">
                  <a href="member_new.php"><img src="photo/menu_top/member_new.jpg" alt="加入會員" class="menu_top_style6" /></a>
                </td>
                <td class="menu_top_style5">
                  <a href="index.php"><img src="photo/menu_top/homepage.jpg" alt="網站首頁" class="menu_top_style6" /></a>
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td class="menu_top_style4">
            <table class="menu_top_style1">
              <tr>
                <td>&nbsp;</td>
                <td class="menu_top_style7">
                  <a href="member_center.php"><img src="photo/menu_top/member_center.jpg" alt="會員中心" 
                    class="menu_top_style6" />
                  </a>
                </td>
                <td class="menu_top_style8">
                  <a href="order_step01.php"><img src="photo/menu_top/shop.jpg" alt="我的購物車" class="menu_top_style6" /></a> 
                </td>
				<?php 
				/*if($_SESSION['userlevel']>50)
				{
				?>
                <td class="menu_top_style9">
                  <a href="item_add.php"><img src="photo/menu_top/book_add.jpg" alt="新增書籍資料" class="menu_top_style6" /></a>
                </td>
				<?php
				}*/
				?>
                <td class="menu_top_style10">
                  <a href="log_out.php"><img src="photo/menu_top/log_out.jpg" alt="登出" class="menu_top_style6" /></a>
                </td>             
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td class="menu_top_style4">
            <form action="search_result.php" method="post"> 
              <table class="menu_top_style1">
                <tr>
                  <td class="menu_top_style11">
                    <div spry:region="dsCategorySearch">
                      <select name="keyword_category" id="keyword_category" spry:repeatchildren="dsCategorySearch" 
                         class="menu_top_style12">
                        <option value="{itemname}" spry:if="{ds_RowNumber}==0" selected="selected">
                          {itemname}
                        </option>
                        <option value="{itemname}" spry:if="{ds_RowNumber}!=0">
                          {itemname}
                        </option>
                      </select>
                    </div>
                  </td>
                  <td class="menu_top_style13">
				  <p>
                    <input name="keyword" id="keyword" type="text" value="關鍵字" 
                      onclick="this.value=''" class="menu_top_style14" />
                    <input type="submit" value="尋找" />
                  </td>
                </tr>
              </table>            
            </form>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<!--<table class="menu_top_style15">
  <tr>
    <td class="menu_top_style16">
       載入左邊區塊 
      <?php //require_once("menu_left.php"); ?>
    </td>
	
    <td class="menu_top_style17">
	-->
	</body>
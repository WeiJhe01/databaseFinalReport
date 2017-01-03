// 展開左邊的選單
function changeCategoryItem(itemname, list)
{
	// 所有的選單項目
	var items = new Array("電腦圖書", "教育軟體", "商用軟體");
	// 要更改的選單項目
	var objItemToChange = document.getElementById("div" + itemname);
	
	// 選單的索引值
	var index = 0;	
	// 巡迴所有的選單
	for (var i = 0; i < items.length; i++)
	{
		// 取得選單的 DIV 物件
		var div = document.getElementById("div" + items[i]);
		// DIV 區塊沒有內容
		div.innerHTML = '<img src="photo/category/展開.jpg" />';
		// 選單的索引值
		if (items[i] == itemname)
			index = i + 1;
	}

	// 設定目前選單的超連結文字
	setCurrentCategoryItem(index, list, "div" + itemname);
}
// 設定目前左邊選單的超連結文字
function setCurrentCategoryItem(index, list, id)
{
	// 讀取選單文字 <list>網頁設計,程式語言,多媒體系列,</list>
	var listitem = new Array();
	// 目前在第幾個選單
	var listindex = 0;
	var pos = -1;

	// 取出每一個選單的文字
	while (list.length > 0)
	{
	  // 找到逗號 , 
		pos = list.indexOf(",");
		if (pos != -1)
		{
			// 每一個選單的文字
			listitem[listindex] = list.substring(0, pos);
			// 剩下的字串
			list = list.substring(pos + 1);
			// 下一個選單的文字
			listindex++;
		}
	}
	
	// 要填入 div 的HTML程式碼
	var html = "<table class='menu_left_style3'>";	
	for (var i = 0; i < listindex; i++)
	{
		html += "<tr><td class='menu_left_style4'>";
		html += "<a href='L2_category_result.php?pro_id=" + index + "&sub_id=" + (i + 1) + "' class='menu_left_style5'>" + 
		  listitem[i] + "</a>";
		html += "</td></tr>";
	}			
	html += '</table>';	
	
	document.getElementById(id).innerHTML = html;
}
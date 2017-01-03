// 檢查欄位是否有輸入
function CheckFields()
{
	// 檢查『標題』欄位
	var fieldvalue = document.getElementById("title").value;
	if (fieldvalue == "") 
	{
		alert("『標題』欄位不可以是空白!");
		document.getElementById("title").focus();
		return false;
	}
		
	// 檢查『書籍編號』欄位
	fieldvalue = document.getElementById("item_index").value;
	if (fieldvalue == "") 
	{
		alert("『書籍編號』欄位不可以是空白!");
		document.getElementById("item_index").focus();
		return false;
	}
		
	return true;
}
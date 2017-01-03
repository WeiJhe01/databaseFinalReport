// 檢查欄位是否空白
function CheckFields()
{
	// 檢查『帳號』欄位
	var fieldvalue = document.getElementById("username").value;
	if (fieldvalue == "") 
	{
		alert("『帳號』欄位不可以是空白!");
		document.getElementById("username").focus();
		return false;
	}
	
	// 檢查『密碼』欄位
	fieldvalue = document.getElementById("password").value;
	if (fieldvalue == "") 
	{
		alert("『密碼』欄位不可以是空白!");
		document.getElementById("password").focus();
		return false;
	}	
}
// 詢問使用者是否真的要清空購物車?
function clearCart()
{
	if (confirm("您確定要清空購物車嗎?"))
	{
		location.href = "clear_cart.php";
	}	
		
	return false;
}

var Width = 0;
function timer_on()
{
	interval=setInterval(increaseWidth,30);
}
var c1=0,c2=0,c3=0;
var control1 = 1;
var stop1 = 0;
function checkShopDetails()
{
	var x = document.getElementsByClassName('input-style');
	var i;
	for(i = 0; i < 6; i++)
	{
		if(x[i].value == '')
			control1 = 0;
		else control1 = 1;
	}
	if(control1 == 1 && stop1==0)
	{
		timer_on();
		control1 = 0;	
		stop1 = 1;
	}
}
var control2 = 1;
var stop2 = 0;
function checkBankDetails()
{
	var x = document.getElementsByClassName('input-style');
	
	var i;
	for(i = 6; i < 10; i++)
	{
		if(x[i].value == '')
			control2 = 0;
		else control2 = 1;
	}
	if(control2 == 1 && stop2==0)
	{	
		timer_on();
		stop2 = 1;
		control2 = 0;
	}
}
function increaseWidth()
{
	if(Width == 100){
		clearTimeout(interval);
	}
	document.getElementById('percentage-bar').style.width = Width+'%';
	document.getElementById('percentage-bar').innerHTML = Width+'%';
	document.getElementById('percentage-bar').style.background = '#2ecc71';
	if(c1==0 && Width==20)
	{	
		clearTimeout(interval);
		c1 = 1;
	}
	else if(c2==0 && Width==70)
	{	
		clearTimeout(interval);
		c1 = 1;
	}
	else if(c3==0 && Width==100)
	{	
		clearTimeout(interval);
		c1 = 1;
	}
	Width++;


}
function showShopTypes()
{
	
	document.getElementsByClassName("register-shop-btn")[0].style.display="none";
	document.getElementsByClassName("register-shop-btn")[0].style.height="0";
	document.getElementsByClassName("shop-type-container")[0].style.display="block";
	document.getElementsByClassName('percentage-bar-container')[0].style.display="block";
}
function showShopDetails()
{
	document.getElementsByClassName("shop-details")[0].style.display="block";
	document.getElementsByClassName("shop-type-container")[0].style.display="none";
	timer_on();
	
}
function goBackToShopType()
{
	document.getElementsByClassName("shop-details")[0].style.display="none";
	document.getElementsByClassName("shop-type-container")[0].style.display="block";
}
function goBackToShopDetails()
{
	document.getElementsByClassName("shop-details")[0].style.display="block";
	document.getElementsByClassName("bank-details")[0].style.display="none";
}
function showBankDetails()
{
	document.getElementsByClassName("shop-details")[0].style.display="none";
	document.getElementsByClassName("bank-details")[0].style.display="block";
  
}


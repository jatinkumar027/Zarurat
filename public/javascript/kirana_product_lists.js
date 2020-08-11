var option_count = Array();
function constructor()
{
    let i;
    let l = document.getElementsByClassName('product').length;
    for(i=0;i<l;i++)
    {
        option_count[i] = 1;
    }
}
constructor();
function addOption(index)
{
    var container = document.getElementsByClassName('product-option-container')[index];
    var options = container.getElementsByClassName('product-option'); 
    const div = document.createElement('div');

    div.className = 'product-option';
    div.innerHTML = "<input type='number' name='mrp[]' placeholder='MRP' required><input type='number' name='sp[]' placeholder='SP' required><input type='number' name='quantity[]' placeholder='Quantity' required><input type='number' name='mass[]' placeholder='wt/vol' required><select name='unit[]' required><option value='1'>Kg</option><option value='2'>gm</option><option value='3'>L</option><option value='4'>mL</option></select>";
    container.appendChild(div);
    option_count[index]++;
    document.getElementsByClassName('add-icon')[index].style.display = 'block';
    document.getElementsByClassName('minus-icon')[index].style.display = 'block';
    document.getElementsByClassName('number-of-options')[index].value++;
    onChecboxSelected(index);
    if(options.length == 4)
    {
        document.getElementsByClassName('add-icon')[index].style.display = 'none';
        return ;
    }  
}
function removeOption(index)
{
    var container = document.getElementsByClassName('product-option-container')[index];
    var options = container.getElementsByClassName('product-option');
    document.getElementsByClassName('add-icon')[index].style.display = 'block';
    var l = options.length;
    options[l-1].remove();
    option_count[index]--;
    if(l == 2)
    {
        document.getElementsByClassName('minus-icon')[index].style.display = 'none';
    }
    document.getElementsByClassName('number-of-options')[index].value--;
}
function countSelectedItems()
{
	var x = document.getElementsByClassName("product");
	var count = 0;
	var y = document.getElementsByClassName("select-item");
	var i;
	for(i=0;i<y.length;i++)
	{
		if(y[i].checked)
		{	
			count++;
			x[i].style.border="0.5px solid #2ecc71";
			x[i].style.boxShadow="0px 0px 3px 0px #2ecc71";
	
		}
    }
    document.getElementById('count-selected-items').innerHTML = count;
}
function onChecboxSelected(index)
{
	var x = document.getElementsByClassName("product");
	var y = document.getElementsByClassName("select-item");

	if(y[index].checked)
		{
			x[index].style.border="0.5px solid #2ecc71";
			x[index].style.boxShadow="0px 0px 3px 0px #2ecc71";
            enableOptions(index);
		}
	else {
		x[index].style.border="0.5px solid black";
		x[index].style.boxShadow="0px 0px 0px 0px black";
        disableOptions(index);
	}
}
function disableOptions(index)
{
    var container = document.getElementsByClassName('product-option-container')[index];
    var options = container.getElementsByClassName('product-option');
    var i;
    for(i=0;i<options.length;i++)
    {
        var input = options[i].getElementsByTagName('input');
        for(j=0;j<input.length;j++)
        {
            input[j].disabled = true;
        }
        var select = options[i].getElementsByTagName('select');
        select[0].disabled = true;
    }
}

function enableOptions(index)
{
    var container = document.getElementsByClassName('product-option-container')[index];
    var options = container.getElementsByClassName('product-option');
    var i;
    for(i=0;i<options.length;i++)
    {
        var input = options[i].getElementsByTagName('input');
        for(j=0;j<input.length;j++)
        {
            input[j].disabled = false;
        }
        var select = options[i].getElementsByTagName('select');
        select[0].disabled = false;
    }
    document.getElementsByClassName('checkbox-container')[index].getElementsByTagName('input')[0].disabled = false;

}
function disableAllOptions()
{
    var options = document.getElementsByClassName('product-option');
    var container = document.getElementsByClassName('checkbox-container');

    var i;
    for(i=0;i<container.length;i++)
    {
        container[i].getElementsByClassName('number-of-options')[0].disabled = true;
    }
    for(i=0;i<options.length;i++)
    {
        var input = options[i].getElementsByTagName('input');
        for(j=0;j<input.length;j++)
        {
            input[j].disabled = true;
        }
        var select = options[i].getElementsByTagName('select');
        select[0].disabled = true;
    }
}


function setAllThumbnails(){
    var x = document.getElementsByClassName('thumbnail');
    var i,w,h,ratio;
    for(i=0;i<x.length;i++){
        var image = x[i].getElementsByTagName('img');
        w = image[0].width;
        h = image[0].height;
        if(w>h){
            image[0].width = '130';
            ratio = h/w;
            h = 130*ratio;
            image[0].height = h;
        }
        else{
            image[0].height = '130';
            ratio = w/h;
            w =130*ratio;
            image[0].width = w;
        }
    }
}
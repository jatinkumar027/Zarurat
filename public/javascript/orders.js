function showHide(num,color){

    var i;
    var x = document.getElementsByClassName('tab');
    var y = document.getElementsByClassName('orders-op');
    for(i=1;i<=4;i++)
    {
        if(i==num){
           
            x[num-1].style.display='block';
            x[num-1].style.border = '1px solid '+color;
            y[num-1].style.color = color;
            y[num-1].style.height ='45px';
            y[num-1].style.borderBottom = '2px solid '+color;
        }
        else {
            x[i-1].style.display = 'none';
            y[i-1].style.color = 'black';
            y[i-1].style.height = '35px';
            y[i-1].style.borderBottom = '2px solid transparent';
        }

    }
}
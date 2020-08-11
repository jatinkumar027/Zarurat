<html>
<head>
    <script>
    /*
    var option_count = Array();
    option_count[0] = 1;
    option_count[1] = 1;
    function add(index)
    {
        var x = document.getElementsByClassName('add-div');
        x[index].innerHTML+= "<div class='options'><input type='number' name='mrp[]' placeholder='MRP' required><input type='number' name='sp[]' placeholder='SP' required></div>";
        option_count[index]++;
        
        var y = document.getElementsByClassName('add-div');
        var btn = y[index].getElementsByClassName('sub')[0].style.display = "block";
    }
    function removeFields(index)
    {
        if(option_count[index]!=1)
        {
        var y = document.getElementsByClassName('add-div')
        var z = y[index].getElementsByClassName('options');
        z[option_count[index]-1].remove();
        option_count[index]--;
        }
        else{
            var y = document.getElementsByClassName('add-div');
            var btn = y[index].getElementsByClassName('sub')[0].style.display = "none";
        }
    }*/
    </script>
</head>
<body>
    <form action="">
    product : 1
        <div class="add-div">
            <div class="options">
                <input type="text" name="mrp[]" placeholder="MRP" required><input type='number' name='sp[]' placeholder='SP' required><br/>
            </div>
        </div>
            <div class="add" onclick="add(0)">add</div>
            <div class="sub" onclick="removeFields(0)">sub</div>
    product : 2
        <div class="add-div">
            <div class="options">
                <input type="text" name="mrp[]" placeholder="MRP" required><input type='number' name='sp[]' placeholder='SP' required><br/>
            </div>          
        </div>
            <div onclick="add(1)">add</div>
            <div onclick="removeFields(1)">sub</div>
        <input type="submit" name="submit" value="submit" >
    </form>    
    <?php
        if(isset($_GET['submit']))
        {
            print_r($_GET);
        }
    ?>
    <script>
    function setSession()
    {
        document.getElementById('firstname').value = sessionStorage.getItem('firstname');
        document.getElementById('lastname').value = sessionStorage.getItem('lastname');


    }
    </script>  
    <input id="firstname" type="text">
    <input id="lastname" type="text">
    <button onclick="setSession();">Save</button>
    <div>
<?php
    if(isset($_SESSION['firstname']))
        echo $_SESSION['firstname'];
        if(isset($_SESSION['lastname']))
            echo "&nbsp;".$_SESSION['lastname'];
            else "no";
        ?>
        </div>
</body>
</html>

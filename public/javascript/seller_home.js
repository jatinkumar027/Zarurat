        function showSellerSigninSignupPopup(num)
        {
            document.getElementsByClassName('seller-signin-signup-popup')[0].style.display = 'block';
            if(num == 1)
            {
                showRegistrationForm();
            }
            else{
                showLoginForm();
            }
        }
        function showRegistrationForm()
        {
            document.getElementsByClassName('register-form-container')[0].style.display="block";
            document.getElementsByClassName('login-form-container')[0].style.display="none";
            document.getElementById('register-label').style.background='linear-gradient(90deg, #3498db, #2980b9)';
            document.getElementById('register-label').style.color = 'white';
            document.getElementById('login-label').style.background='white';
            document.getElementById('login-label').style.color='black';

        }
        function showLoginForm()
        {
            document.getElementsByClassName('register-form-container')[0].style.display="none";
            document.getElementsByClassName('login-form-container')[0].style.display="block";
            document.getElementById('register-label').style.background='white';
            document.getElementById('register-label').style.color='black';
            document.getElementById('login-label').style.background='linear-gradient(90deg, #3498db, #2980b9)';
            document.getElementById('login-label').style.color = 'white';

        }
        function closeFormPopup()
        {
            document.getElementsByClassName('seller-signin-signup-popup')[0].style.display = 'none';
        }
        function checkPassword()
        {
            var x = document.getElementById('pass').value;
            var y = document.getElementById('confpass');
            if(x == y.value)
            {
                y.style.border = "2px solid #2ecc71";
            }
            else{
                y.style.border = "2px solid #e74c3c";
            }
        }
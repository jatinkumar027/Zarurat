<!DOCTYPE html>
<html>
<head>
  <title>Welcome to Zarurat.in | Your daily needs fulfiller</title>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>
  <link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css'>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <link rel="stylesheet" type="text/css" href="public/css/index.css">
  <script type="text/javascript" src="public/javascript/index_home.js"></script>

  <!-- <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css'>
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
</head>
<body>
  <div class="location_section">
    <div class="location_popup">
      <div class="location_popup_fields">
        <h1>Enter your Location</h1>
        <h3>Enter your Location to view available shops nearby</h3>
        <form id="location-form" action="buyer_shops.php" method="post">
          <input type="number" name="pincode" placeholder="Pincode">
          <input type="text" name="city" placeholder="City">
          <input type="text" name="state" placeholder="State">
        </form>
        <div class="location_popup_actions">
          <label onclick="onclicknodisplay()" class="cancel_in_popup">Cancel</label>
          <label onclick="submitLocationForm();" class="view_in_popup">View Shops</label>
        </div>
      </div>
    </div>
  </div>
  <header class="header">

    <div class="header_container">
      <h1 class="heading">Zarurat.in</h1>
      <nav class="header_nav">
        <ul class="nav-list">
          <li> <a href="seller_home.php">Start Selling</a> </li>
        </ul>
      </nav>
    </div>

    <div class="header_second_container">
      <img src="public\images\index\home_screen_demo_mobile.png" alt="Mobile Phone" class="mobile_image">
      <div class="button_content">
        <button class="store_button">
          <span class="btn_icon"><i class="fa fa-apple fa-3x"></i></span>
          <span class="btn_text">
              <span class="name">Coming Soon on<br></span>
          <span class="sub_name">App Store</name></span>
          </span>
        </button>
        <button class="store_button">
          <span class="btn_icon"><i class="fa fa-android fa-3x"></i></span>
          <span class="btn_text">
              <span class="name">Coming Soon on<br></span>
          <span class="sub_name">Google Play</name></span>
          </span>
        </button>
      </div>
      <div class="text_content">
        <h1>Welcome to Zarurat.in</h1>
        <h3>Buy all your necessitites from just a few clicks</h3>
        <ul class="nav-list btn_second">
          <li> <a onclick="onclickdisplay()">Buy Now</a> </li>
        </ul>
      </div>
    </div>

  </header>

  <div class="main_content">

    <div class="info_items">
      <div class="shopping_cart">
        <img src="public\images\index\shopping_cart.png" alt="Shopping Cart">
        <h1>Kirana<br>Dairy<br>Medicines</h1>
      </div>
      <div class="wallet">
        <img src="public\images\index\wallet.png" alt="Wallet">
        <h1>Easy Payment Options</h1>
      </div>
      <div class="delivery_girl">
        <img src="public\images\index\delivery_girl.png" alt="Delivery Girl">
        <h1>Fast Delivery</h1>
      </div>
    </div>

    <div class="read_story">
      <div class="story_content">
        <h4>Read our story</h4>
        <h2><em>Zarurat.in is a newborn child with Talent</em></h2>
        <p>Situation like Covid-19 may have a greater chance to happen again in future. People suffered a lot while sitting at home and they were abondoned of many things including the necessities.<br><br></p>
        <p>Whether Online Payments, or flexiblity to buy at ease, Buy some Medicine or Milk Products, We take care of everything.<br><br></p>
        <p>Zarurat.in aims to provide the necessities at your doorstep. No worry to go out of home and taking risks or tension to buy lots of items. We are here to help you and provide the best from your nearby.</br></br><b>Just Log in and say Zarurat.in ;)</b></p>
      </div>
      <div class="story_image">
        <img src="public\images\index\man_reading_book.png" alt="Man Reading Book">
      </div>
  </div>

  <div class="help_section">
    <div class="seller">
      <div class="seller_image">
        <img src="public\images\index\seller.png" alt=" Seller">
      </div>
      <div class="seller_content">
        <h4>Do you own a <br>Kirana, Dairy or a Medicine Shop?</h4>
      </div>
      <div class="seller_button">
        <button type="button" name="button">Sell Now</button>
      </div>
    </div>
    <div class="help_assist">
      <div class="help_assist_image">
        <img src="public\images\index\support.png" alt="Help/Support">
      </div>
      <div class="help_assist_content">
        <h4> Do you<br>Need Assistance?</h4>
      </div>
      <div class="help_assist_button">
        <button type="button" name="button">Help Me</button>
      </div>
    </div>
    <div class="discover">
      <div class="discover_image">
        <img src="public\images\index\magnifying_glass.png" alt="Discover">
      </div>
      <div class="discover_content">
        <h4>View Shops Available Nearby</h4>
      </div>
      <div class="discover_content_button">
        <button type="button" name="button">Discover Now</button>
      </div>
    </div>
  </div>

  <footer>
    <div class="footer_container">
      <p>Copyright &copy; 2019-2020 Zarurat Services and its affiliates. All Rights Reserved  |  Support: support@zarurat.in</p>
    </div>
  </footer>
</body>
</html>

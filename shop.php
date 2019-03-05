<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Fotomat</title>
    <link rel="stylesheet" href="./css/reset.css" type="text/css">
    <link rel="stylesheet" href="./css/style.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <nav class="desktop">
      <a href="./index.html" class="logo-container"><img src="./images/fotomat_logo.png" alt="Fotomat Logo"></a>
      <div class="links-container">
        <a class="shop-nav-link"><i class="fas fa-shopping-cart"><div class="cart"></div></i></a>
      </div>
    </nav>
    <nav class="mobile">
      <div class="shop-mobile-nav-container">
        <a href="./index.html" class="logo-container"><img src="./images/fotomat_logo.png" alt="Fotomat Logo"></a>
      </div>
      <div class='mobile-links-container'>
        <a class="mobile-nav-link" href="./index.html">Home</a>
      </div>
    </nav>
    <div class="sub-menu">
      <i class="fas fa-filter" onclick="filterMenu()"></i>
      <p class="shop-header">Shop</p>
      <i class="fas fa-shopping-cart"></i>
    </div>
    <div class="filter-container">
      <div class="hide-options">
        <p onclick="showAllProducts(); closeFilterMenu();">Show All</p>
      </div>
      <div class="camera-section">
        <p class="section-header">Cameras</p>
        <p class="item" onclick="filterProducts('body'); closeFilterMenu();">Bodies</p>
      </div>
      <div class="lens-section">
        <p class="section-header">Lenses</p>
        <p class="item" onclick="filterProducts('fixed'); closeFilterMenu();">Fixed</p>
        <p class="item" onclick="filterProducts('telephoto'); closeFilterMenu();">Telephoto</p>
      </div>
      <div class="accessory-section">
        <p class="section-header">Accessories</p>
        <p class="item" onclick="filterProducts('case'); closeFilterMenu();">Cases</p>
      </div>
      <div class="kit-section">
        <p class="section-header">Camera Kits</p>
        <p class="item" onclick="filterProducts('kit'); closeFilterMenu();">Fotomat 1 Kits</p>
      </div>
    </div>
    <div class="products-container">
      <!-- <div class="product">
        <img src="./images/camera.png" alt="Fotomat Camera">
        <div class="product-info">
          <p class="product-name">Fotomat 1</p>
          <p class="product-specs"></p>
        </div>
        <p class="price">$1299.99</p>
        <div class="buy-button">Add to Cart</div>
      </div> -->

      <?php
      require './creds.php';

      $connect = mysqli_connect($server, $username, $password, $dbname);

      if (!$connect) {
        die ('Connection Failed');
      }

      function display_specs($specs) {
        $specs = explode(', ', $specs);
        foreach ($specs as $spec) {
          echo "<li>$spec</li>";
        }
      }

      function display_stock($stock) {
        if ($stock > 0) {
          echo "Add to Cart";
        } else {
          echo "Out of Stock";
        }
      }

      function action_alert($stock) {
        if ($stock <= 5 && $stock > 0) {
          echo "<p class='action'>Only $stock left!</p>";
        }
      }

      $query = mysqli_query($connect, 'SELECT model, specs, stock, price, type, image FROM products');

      if (mysqli_num_rows($query) > 0) {
        while ($items = mysqli_fetch_assoc($query)) {
      ?>
        <div class="product" id="<?php echo $items['type'];?>">
          <div class="product-image-container">
            <img src="<?php echo $items['image']; ?>" alt="Product Image">
          </div>
          <div class="product-info">
            <p class="product-name"><?php echo $items['model'];?></p>
            <div class="product-specs">
              <?php display_specs($items['specs']);?>
            </div>
          </div>
          <p class="price">$<?php echo $items['price'];?></p>
          <div class="buy-button"><?php display_stock($items['stock']);?></div>
          <?php action_alert($items['stock']);?>
        </div>
      <?php
        }
      }
      ?>
    </div>
    <script src='./js/shop.js'></script>
  </body>
</html>

<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/wishlist_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">


</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<div class="home-bg">

<section class="home">

   <div class="swiper home-slider">
   
   <div class="swiper-wrapper">

      <div class="swiper-slide slide">
         <div class="image">
            <img src="https://media.istockphoto.com/photos/mens-clothing-isolated-on-white-background-picture-id984324980?k=6&m=984324980&s=612x612&w=0&h=6UUF_-kOGzVzHIBhA4F7MURA_c5V3E53NauCav5zMSk=" alt="">
         </div>
         <div class="content">
            <span>UPTO 50% off</span>
            <h3>Trending Summer Outfit</h3>
         <div id="productdef">   <h2>We are Here to Make You Awesome </h2></div>
            <a href="shop.php" class="btn">shop now</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="https://freepngimg.com/thumb/shoes/28530-3-nike-shoes-transparent.png" alt="">
         </div>
         <div class="content">
            <span>UPTO 50% Discount on </span>
            <h3>E-STORE <BR>SM FOOTWEAR</h3>
            <h2>Shoes that Take you "ONE STEP AHEAD"</h2>
            <a href="shop.php" class="btn">shop now</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="https://a1png.com/wp-content/uploads/2021/01/virat-kohli-10.png" alt="">
         </div>
         <div class="content">
            <span>E-STORE</span>
            <h3>THE CHOICE OF INDIANS LEADING STARS </h3>
            <h2>Style That Make you Different From Others</h2>
            <a href="shop.php" class="btn">shop now</a>
         </div>
      </div>

   </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

</div>

<section class="category">

   <h1 class="heading">shop by category</h1>

   <div class="swiper category-slider">

   <div class="swiper-wrapper">

   <a href="#" class="swiper-slide slide">
      <img src="images/polo.png" alt="Polo">
      <h3>POLO</h3>
   </a>

   <a href="#" class="swiper-slide slide">
      <img src="images/sportsshoe.png" alt="">
      <h3>Shoes</h3>
   </a>

   <a href="#" class="swiper-slide slide">
      <img src="images/formal.png" alt="">
      <h3>FORMAL CLOTH</h3>
   </a>

   <a href="#" class="swiper-slide slide">
      <img src="images/jeanslogo.png" alt="">
      <h3>DENIM JEANS</h3>
   </a>

   <a href="#" class="swiper-slide slide">
      <img src="images/shirtlogo.png" alt="">
      <h3>SHIRTS</h3>
   </a>

   <a href="#" class="swiper-slide slide">
      <img src="images/shorts.png" alt="">
      <h3>SHORTS</h3>
   </a>

   <a href="#" class="swiper-slide slide">
      <img src="images/watchlogo.png" alt="">
      <h3>WATCH</h3>
   </a>

   <a href="#" class="swiper-slide slide">
      <img src="images/formalshoes.png" alt="">
      <h3>FORMAL SHOES</h3>
   </a>

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>

<section class="products">

   <h1 class="heading">latest products</h1>

   <div class="box-container">

   <!-- <div class="swiper-wrapper"> -->

   <?php
     $select_products = $conn->prepare("SELECT * FROM `products`"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="box">
      <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
      <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
      <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>" class="fas fa-eye"></a>
      <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
      <div class="name"><?= $fetch_product['name']; ?></div>
      <div class="flex">
         <div class="price"><span> Rs.  </i></span><?= $fetch_product['price']; ?><span>/-</span></div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
      <input type="submit" value="add to cart" class="btn" name="add_to_cart">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?>

   </div>

   <div class="swiper-pagination"></div>

   <!-- </div> -->

</section>









<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".home-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
    },
});

 var swiper = new Swiper(".category-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
         slidesPerView: 2,
       },
      650: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 4,
      },
      1024: {
        slidesPerView: 5,
      },
   },
});

var swiper = new Swiper(".products-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      550: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>
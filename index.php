<?php include './includes/header.php'?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/includes/db.inc.php' ?>


<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="la.jpg" alt="Los Angeles">
    </div>
    <div class="carousel-item">
      <img src="chicago.jpg" alt="Chicago">
    </div>
    <div class="carousel-item">
      <img src="ny.jpg" alt="New York">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>
<div class="jumbotron">
    <?php

    if(isset($_SESSION['AccountID'])){
        echo "<br>Logged in<br>";
    } else {
        echo "<br>Logged out<br>";
    }
    
    ?>
   
    

<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="/img/products/DesktopIMG/desktop-1.jpg" alt="Desktop">
    </div>
    <div class="carousel-item">
        <img src="/img/products/LaptopIMG/laptop-1.jpg" alt="Laptop">
    </div>
    <div class="carousel-item">
    <img src="/img/products/PeripheralsIMG/monitor-1.jpg" alt="Periph">
    </div>
  </div>
</div>
</div>

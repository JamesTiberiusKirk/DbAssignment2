<?php include $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2'. '/includes/header.php'?>

<div class="jumbotron">
    <?php

    if(isset($_SESSION['AccountID'])){
        echo "<br>Logged in<br>";
    } else {
        echo "<br>Logged out<br>";
    }
    
    ?>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
        <img src="/img/products/DesktopIMG/desktop-1.jpg" alt="Desktop">
    </div>

    <div class="item">
        <img src="/img/products/LaptopIMG/laptop-1.jpg" alt="Laptop">
    </div>

    <div class="item">
        <img src="/img/products/PeripheralsIMG/monitor-1.jpg" alt="Periph">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>

<?php include $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2'.'/includes/footer.php' ?>

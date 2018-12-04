  <title>Slider</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<!--Pagina-->
<!---------------------------------------------------------------------------------------------------------->
  <style>
  .carousel-inner img {
      width: 100%;
      height: 100%;
  }
  </style>
<!--Container-->
<!---------------------------------------------------------------------------------------------------------->
<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="css/img/01.jpg" alt="Los Angeles" width="1100" height="500">
      <div class="carousel-caption">
        <h3>SENA</h3>
        <p>Bienvenidos</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="css/img/02.jpg" alt="Chicago" width="1100" height="500">
      <div class="carousel-caption">
        <h3>SENA</h3>
        <p>“La mejor solución para tu necesidad”
        </p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="css/img/images.jpg" alt="New York" width="1100" height="500">
      <div class="carousel-caption">
        <h3>SENA</h3>
        <p>“La mejor solución para tu necesidad”
        </p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

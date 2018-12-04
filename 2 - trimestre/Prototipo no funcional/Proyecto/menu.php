<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/estilomenu.css">

<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">
$(window).on('scroll', function(){
	if($(window).scrollTop()){
		$('nav').addClass('black');
		}
		else
		{
			$('nav').removeClass('black');
			}
    })
	
$(document).ready(function(){
		$(".menu h3").click(function(){
			$(".nav ul li").toggleClass("active");
			
			});
    });
</script>
</head>

<body>

<div class="responsive-bar">
	<div class="logo">
  	<img src="img/logo.png">
</div>

<div class="menu">
  <h3>Menu</h3>
 </div>
</div>

<nav>

	<div class="logo">
		<a href="index.php">
		<img src="img/logo.png" title="Ir al inicio"></a>
	</div>

<ul>
	<li><a href="index.php" class="active">Inicio</a></li>
<li><a  href="#" class="active">Iniciar session</a></li>
<li><a  href="#" class="active">Crear cuenta</a></li>

</ul>

</nav>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
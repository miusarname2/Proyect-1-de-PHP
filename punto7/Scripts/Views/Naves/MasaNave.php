<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../../../Css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 
    <div id="main">
        <div id="header"> <a href="#" class="logo"></a>
          <ul id="top-navigation">
            <li><span><span><a href="../../../index.html">Buscador de planetas</a></span></span></li>
            <li><span><span><a href="../../../static/verfiReportFirst.html">Verificar primer reporte de sistema solar</a></span></span></li>
            <li><span><span><a href="../../../static/planetas_habitables.html">Verificar planetas habitables</a></span></span></li>
            <li><span><span><a href="../../../static/GravedadPlaneta.html">Calcular Gravedad de planetas(aproximada...)</a></span></span></li>
            <li class="active"><span><span>Calcular masa de flota</span></span></li>
            <li><span><span><a href="#">Design</a></span></span></li>
          </ul>
        </div>
        <div id="middle">
          <form action="../Scripts/Logic/Logic.php" method="POST">
            <h2><?php echo $_GET["Masa"]?> es la masa de la naves...</h2>
           </form>
        </div>
        <div id="footer"></div>
      </div>
      
</body>
</html>
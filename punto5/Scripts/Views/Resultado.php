<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
<div class="jumbotron">
  <h1 class="display-4">el resultado de la busque ha encontrado algo!...</h1>
  <p class="lead">id = <?php echo $_GET["id"];?></p>
  <hr class="my-4">
  <p> planeta = <?php echo $_GET["element"];?></p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="../../index.html" role="button">Regresar</a>
  </p>
</div>

</body>
</html>

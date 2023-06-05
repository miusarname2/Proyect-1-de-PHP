<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Document</title>
</head>
<body>
<table>
        <thead>
          <tr>
              <th>Name</th>
          </tr>
        </thead>
        <?php
  foreach ($_GET as $val) {?>
        <tbody>
          <tr>
            <td><?php echo $val;?></td>
          </tr>
        </tbody>
        <?php } ?>
      </table>

      <a class="waves-effect waves-light btn" href="../../../index.html">Regresar...</a>
</body>
</html>


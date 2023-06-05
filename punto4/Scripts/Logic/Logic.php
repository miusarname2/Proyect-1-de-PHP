<?php
$planetas=[array("nombre"=>"sol","Habitado"=>"Deshabitado","habitable"=>false),array("nombre"=>"mercurio","Habitado"=>"Deshabitado","habitable"=>true,"gravedad"=>19/50),array("nombre"=>"venus","Habitado"=>"Deshabitado","habitable"=>false,"gravedad"=>91/100),array("nombre"=>"tierra","Habitado"=>"Deshabitado","habitable"=>true,"gravedad"=>100/100),array("nombre"=>"marte","Habitado"=>"Deshabitado","habitable"=>true,"gravedad"=>19/50),array("nombre"=>"jupiter","Habitado"=>"Deshabitado","habitable"=>false,"gravedad"=>3*43/2*5**2),array("nombre"=>"saturno","Habitado"=>"Deshabitado","habitable"=>false,"gravedad"=>107/(2**2)*(5**2)),array("nombre"=>"urano","Habitado"=>"Deshabitado","habitable"=>true,"gravedad"=>23/5**2),array("nombre"=>"neptuno","Habitado"=>"Deshabitado","habitable"=>true,"gravedad"=>7*17/(2**2)*(5**2))];


if(isset($_POST["Planet"])){

if (is_numeric($_POST["Planet"]) ){
    $temp_toReturn=$planetas[intval($_POST["Planet"])]["nombre"];
    if ($temp_toReturn){
        header("Location:../Views/Resultado.php?element=".$temp_toReturn."&id=".intval($_POST["Planet"]));
    }else{
        header("Location:../Views/BadRequest.php");
    }
}elseif(is_numeric($_POST["Planet"]) == false){
    $names = strtolower($_POST["Planet"]);
     foreach ($planetas as $key => $planeta) {
         if ($planeta["nombre"] == $names) {
             header("Location:../Views/Resultado.php?element=".$planeta["nombre"]."&id=".$key);
             break;
         }else{
            header("Location:../Views/BadRequest.php");
         }
     }
}
}elseif(isset($_POST["habitables"])){
    if ($_POST["habitables"] == 1){
        $habitables = array(); 
        foreach ($planetas as $planeta) {
            if ($planeta['habitable']) {
                $habitables[] = $planeta['nombre'];
            }
        }
        if (!empty($habitables)) {
            header("Location:../Views/habitablesResultados/resultado.php?".http_build_query($habitables));
            //echo "Los planetas habitables son: " . implode(", ", $habitables);
        } else {
            header("Location: ../Views/BadRequest.php");
        }
    }elseif($_POST["habitables"] == 2){
        $habitables = array(); 
        foreach ($planetas as $planeta) {
            if ($planeta['habitable'] == false) {
                $habitables[] = $planeta['nombre'];
            }
        }
        if (!empty($habitables)) {
            header("Location:../Views/habitablesResultados/resultado.php?".http_build_query($habitables));
            //echo "Los planetas habitables son: " . implode(", ", $habitables);
        } else {
            header("Location: ../Views/BadRequest.php");
        }
    }elseif($_POST["habitables"] == 3){
        $habitables = array(); 
        foreach ($planetas as $planeta) {
            if ($planeta['habitable'] == false || $planeta['habitable'] ) {
                $habitables[] = $planeta['nombre'];
            }
        }
        if (!empty($habitables)) {
            header("Location:../Views/habitablesResultados/resultado.php?".http_build_query($habitables));
            //echo "Los planetas habitables son: " . implode(", ", $habitables);
        } else {
            header("Location: ../Views/BadRequest.php");
        }
    }
}






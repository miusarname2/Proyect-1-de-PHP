<?php
$planetas=[array("nombre"=>"sol","Habitado"=>"Deshabitado"),array("nombre"=>"mercurio","Habitado"=>"Deshabitado"),array("nombre"=>"venus","Habitado"=>"Deshabitado"),array("nombre"=>"tierra","Habitado"=>"Deshabitado"),array("nombre"=>"marte","Habitado"=>"Deshabitado"),array("nombre"=>"jupiter","Habitado"=>"Deshabitado"),array("nombre"=>"saturno","Habitado"=>"Deshabitado"),array("nombre"=>"urano","Habitado"=>"Deshabitado"),array("nombre"=>"neptuno","Habitado"=>"Deshabitado")];

if (is_numeric($_POST["Planet"]) ){
    $temp_toReturn=$planetas[intval($_POST["Planet"])]["nombre"];
    if ($temp_toReturn){
        header("location:../Views/Resultado.php?element=".$temp_toReturn."&id=".intval($_POST["Planet"]));
    }else{
        header("location:../Views/BadRequest.php");
    }
}elseif(is_numeric($_POST["Planet"]) == false){
    $names = strtolower($_POST["Planet"]);
     foreach ($planetas as $key => $planeta) {
         if ($planeta["nombre"] == $names) {
             header("location:../Views/Resultado.php?element=".$planeta["nombre"]."&id=".$key);
             break;
         }else{
             header("location:../Views/BadRequest.php");
         }
     }

}

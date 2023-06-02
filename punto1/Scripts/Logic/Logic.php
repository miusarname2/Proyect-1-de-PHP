<?php
$planetas=[array("nombre"=>"Sol","Habitado"=>"Deshabitado"),"Mercurio","Venus","Tierra","Marte","Jupiter","Saturno","Urano","Neptuno"];

if (is_numeric($_POST["Planet"]) ){
    $temp_toReturn=$planetas[intval($_POST["Planet"])];
    if ($temp_toReturn){
        header("location:../Views/Resultado.php?element=".$temp_toReturn."&id=".intval($_POST["Planet"]));
    }else{
        header("location:../Views/BadRequest.php");
    }
}else{}
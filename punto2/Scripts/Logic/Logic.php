<?php
$planetas=[array("nombre"=>"Sol","Habitado"=>"Deshabitado"),array("nombre"=>"Mercurio","Habitado"=>"Deshabitado"),array("nombre"=>"Venus","Habitado"=>"Deshabitado"),array("nombre"=>"Tierra","Habitado"=>"Deshabitado"),array("nombre"=>"Marte","Habitado"=>"Deshabitado"),array("nombre"=>"Jupiter","Habitado"=>"Deshabitado"),array("nombre"=>"Saturno","Habitado"=>"Deshabitado"),array("nombre"=>"Urano","Habitado"=>"Deshabitado"),array("nombre"=>"Neptuno","Habitado"=>"Deshabitado")];

if (is_numeric($_POST["Planet"]) ){
    $temp_toReturn=$planetas[intval($_POST["Planet"])]["nombre"];
    if ($temp_toReturn){
        header("location:../Views/Resultado.php?element=".$temp_toReturn."&id=".intval($_POST["Planet"]));
    }else{
        header("location:../Views/BadRequest.php");
    }
}else{}
<?php
$planetas=[array("nombre"=>"sol","Habitado"=>"Deshabitado","habitable"=>false),array("nombre"=>"mercurio","Habitado"=>"Deshabitado","habitable"=>true,"gravedad"=>19/50),array("nombre"=>"venus","Habitado"=>"Deshabitado","habitable"=>false,"gravedad"=>91/100),array("nombre"=>"tierra","Habitado"=>"Deshabitado","habitable"=>true,"gravedad"=>100/100),array("nombre"=>"marte","Habitado"=>"Deshabitado","habitable"=>true,"gravedad"=>19/50),array("nombre"=>"jupiter","Habitado"=>"Deshabitado","habitable"=>false,"gravedad"=>3*43/2*5**2),array("nombre"=>"saturno","Habitado"=>"Deshabitado","habitable"=>false,"gravedad"=>107/(2**2)*(5**2)),array("nombre"=>"urano","Habitado"=>"Deshabitado","habitable"=>true,"gravedad"=>23/5**2),array("nombre"=>"neptuno","Habitado"=>"Deshabitado","habitable"=>true,"gravedad"=>7*17/(2**2)*(5**2))];

function defGravedad($porcentaje): float{
    return $porcentaje*9.8;
}

if (isset($_POST["Planet"])) {
    if (is_numeric($_POST["Planet"])) {
        $index = intval($_POST["Planet"]);
        if (isset($planetas[$index])) {
            $temp_toReturn = $planetas[$index]["nombre"];
            header("Location:../Views/Resultado.php?element=".$temp_toReturn."&id=".$index);
        } else {
            header("Location:../Views/BadRequest.php");
        }
    } else {
        $names = strtolower($_POST["Planet"]);
        $found = false;
        foreach ($planetas as $key => $planeta) {
            if ($planeta["nombre"] == $names) {
                header("Location:../Views/Resultado.php?element=".$planeta["nombre"]."&id=".$key);
                $found = true;
                break;
            }
        }
        if (!$found) {
            header("Location:../Views/BadRequest.php");
        }
    }
} elseif (isset($_POST["habitables"])) {
    $habitables = array();
    foreach ($planetas as $key => $planeta) {
        if ($_POST["habitables"] == 1 && $planeta['habitable']) {
            $habitables[] = $planeta['nombre'];
        } elseif ($_POST["habitables"] == 2 && !$planeta['habitable']) {
            $habitables[] = $planeta['nombre'];
        } elseif ($_POST["habitables"] == 3) {
            $habitables[] = $planeta['nombre'];
        }
    }
    if (!empty($habitables)) {
        header("Location:../Views/habitablesResultados/resultado.php?".http_build_query($habitables));
    } else {
        header("Location:../Views/BadRequest.php");
    }
}elseif(isset($_POST["PlanetaG"])){
    if (is_numeric($_POST["PlanetaG"])) {
        $index = intval($_POST["PlanetaG"]);
        if (isset($planetas[$index])) {
            $temp_toReturn = $planetas[$index]["nombre"];
            $gravity=defGravedad($planetas[$index]["gravedad"]);
            header("Location:../Views/PlanetasGravedad/Resultado.php?element=".$temp_toReturn."&id=".$index."&gravedad=".$gravity);
        } else {
            header("Location:../Views/PlanetasGravedad/BadRequest.php");
            }
        } else {
            $names = strtolower($_POST["PlanetaG"]);
            $found = false;
            foreach ($planetas as $key => $planeta) {
                if ($planeta["nombre"] == $names) {
                    $gravity=defGravedad($planeta["gravedad"]);
                    header("Location:../Views/PlanetasGravedad/Resultado.php?element=".$planeta["nombre"]."&id=".$key."&gravedad=".$gravity);
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                header("Location:../Views/BadRequest.php");
            }
        }
}









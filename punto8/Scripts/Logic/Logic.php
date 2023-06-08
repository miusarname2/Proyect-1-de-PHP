<?php
$planetas=[array("nombre"=>"sol","Habitado"=>"Deshabitado","habitable"=>false),array("nombre"=>"mercurio","Habitado"=>"Deshabitado","habitable"=>true,"gravedad"=>19/50),array("nombre"=>"venus","Habitado"=>"Deshabitado","habitable"=>false,"gravedad"=>91/100),array("nombre"=>"tierra","Habitado"=>"Deshabitado","habitable"=>true,"gravedad"=>100/100),array("nombre"=>"marte","Habitado"=>"Deshabitado","habitable"=>true,"gravedad"=>19/50),array("nombre"=>"jupiter","Habitado"=>"Deshabitado","habitable"=>false,"gravedad"=>3*43/2*5**2),array("nombre"=>"saturno","Habitado"=>"Deshabitado","habitable"=>false,"gravedad"=>107/(2**2)*(5**2)),array("nombre"=>"urano","Habitado"=>"Deshabitado","habitable"=>true,"gravedad"=>23/5**2),array("nombre"=>"neptuno","Habitado"=>"Deshabitado","habitable"=>true,"gravedad"=>7*17/(2**2)*(5**2))];

$naves=array(array("nombre"=>"A1","Masa"=>500),array("nombre"=>"A2","Masa"=>556),array("nombre"=>"A3","Masa"=>5445),array("nombre"=>"A4","Masa"=>554654),array("nombre"=>"A5","Masa"=>5650),array("nombre"=>"A6","Masa"=>566),array("nombre"=>"A1","Masa"=>6562),array("nombre"=>"A1","Masa"=>5451),array("nombre"=>"A1","Masa"=>25662),array("nombre"=>"A1","Masa"=>152421));

function defGravedad($porcentaje): float{
    return $porcentaje*9.8;
}

function sumarMasa($nav) {
    $sumaMasa = 0;

    foreach ($nav as $nave) {
        $masa = $nave["Masa"];
        $sumaMasa += $masa;
    }

    return $sumaMasa;
}

function checkIfElementExistsInArray($array, $name) {
    foreach ($array as $element) {
        if ($element['nombre'] === $name) {
            return true;
        }
    }

  return false;
}



function buscarPlaneta($planetas, $nombreOId) {
    if (is_numeric($nombreOId)) {
        // Buscar por posición en el array padre
        if ($nombreOId >= 0 && $nombreOId < count($planetas)) {
            return $planetas[$nombreOId];
        }
    } else {
        // Buscar por nombre
        foreach ($planetas as $planeta) {
            if ($planeta['nombre'] === strtolower($nombreOId)) {
                return $planeta;
            }
        }
    }
    
    return null; // Planeta no encontrado
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
}elseif(isset($_POST["Naves"])){
    $temp_masaT=sumarMasa($naves);
    header("Location:../Views/Naves/MasaNave.php?Masa=".$temp_masaT."kg");
}elseif(isset($_POST["PlanetaE"])){

$planetaBuscar = buscarPlaneta($planetas, $_POST["PlanetaE"]);

if ($planetaBuscar !== null) {
    echo "Planeta encontrado por nombre: " . $planetaBuscar['nombre'];
}elseif($planetaBuscar !== null){
    echo "Planeta encontrado por id: " . $planetaBuscar['nombre'];
} 
else {
    header("Location:../Views/BadRequest.php");
}

}elseif(isset($_POST["NavesS"])){
    $response=checkIfElementExistsInArray($naves,$_POST["NavesS"]);

    if($response){
        header("Location:../Views/NaveExiste/Response.php?Existe="."Esta nave si existe");
    }else{
        header("Location:../Views/NaveExiste/Response.php?Existe="."Esta nave NO existe");
    }
}elseif(isset($_POST["Select"])){
    $randomNumber = rand(0, 8);
    $temp_namePlanetSelect=$planetas[$randomNumber]["nombre"];
    header("Location:../Views/ramdomPlanet/response.php?Name=".$temp_namePlanetSelect);
}










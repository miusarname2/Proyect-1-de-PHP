<?php
$planetas=[array("nombre"=>"sol","Habitado"=>"Deshabitado","habitable"=>false),array("nombre"=>"mercurio","Habitado"=>"Deshabitado","habitable"=>true,"gravedad"=>19/50),array("nombre"=>"venus","Habitado"=>"Deshabitado","habitable"=>false,"gravedad"=>91/100),array("nombre"=>"tierra","Habitado"=>"Deshabitado","habitable"=>true,"gravedad"=>100/100),array("nombre"=>"marte","Habitado"=>"Deshabitado","habitable"=>true,"gravedad"=>19/50),array("nombre"=>"jupiter","Habitado"=>"Deshabitado","habitable"=>false,"gravedad"=>3*43/2*5**2),array("nombre"=>"saturno","Habitado"=>"Deshabitado","habitable"=>false,"gravedad"=>107/(2**2)*(5**2)),array("nombre"=>"urano","Habitado"=>"Deshabitado","habitable"=>true,"gravedad"=>23/5**2),array("nombre"=>"neptuno","Habitado"=>"Deshabitado","habitable"=>true,"gravedad"=>7*17/(2**2)*(5**2))];

$naves=array(array("nombre"=>"A1","Masa"=>500),array("nombre"=>"A2","Masa"=>556),array("nombre"=>"A3","Masa"=>5445),array("nombre"=>"A4","Masa"=>554654),array("nombre"=>"A5","Masa"=>5650),array("nombre"=>"A6","Masa"=>566),array("nombre"=>"A1","Masa"=>6562),array("nombre"=>"A1","Masa"=>5451),array("nombre"=>"A1","Masa"=>25662),array("nombre"=>"A1","Masa"=>152421));

$planetas2=[array("nombre"=>"sold","Habitado"=>"Deshabitado","habitable"=>false),array("nombre"=>"mercudrio","Habitado"=>"Deshabitado","habitable"=>true,"gravedad"=>19/50),array("nombre"=>"venufs","Habitado"=>"Deshabitado","habitable"=>false,"gravedad"=>91/100),array("nombre"=>"tierfra","Habitado"=>"Deshabitado","habitable"=>true,"gravedad"=>100/100),array("nombre"=>"marte","Habitado"=>"Deshabitado","habitable"=>true,"gravedad"=>19/50),array("nombre"=>"jupiter","Habitado"=>"Deshabitado","habitable"=>false,"gravedad"=>3*43/2*5**2),array("nombre"=>"sadturno","Habitado"=>"Deshabitado","habitable"=>false,"gravedad"=>107/(2**2)*(5**2)),array("nombre"=>"urano","Habitado"=>"Deshabitado","habitable"=>true,"gravedad"=>23/5**2),array("nombre"=>"neptudno","Habitado"=>"Deshabitado","habitable"=>true,"gravedad"=>7*17/(2**2)*(5**2))];

$alienSpecies = array(
  "Zeta Reticulans",
  "Zeta Reticulans",
  "Zeta Reticulans",
  "Greys",
  "Greys",
  "Greys",
  "Nordics",
  "Nordics",
  "Nordics",
  "Reptilians",
  "Reptilians",
  "Reptilians",
  "Saucer People",
  "Saucer People",
  "Saucer People"
);

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

function findCommonElements($array1, $array2) {
    $commonElements = array_intersect($array1, $array2);
    return $commonElements;
}



if (isset($_POST["Planet"])) {
    $index = is_numeric($_POST["Planet"]) ? intval($_POST["Planet"]) : -1;
    $found = false;

    if ($index >= 0 && isset($planetas[$index])) {
        $temp_toReturn = $planetas[$index]["nombre"];
        header("Location:../Views/Resultado.php?element=".$temp_toReturn."&id=".$index);
    } else {
        $names = strtolower($_POST["Planet"]);
        
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
    $habitables = [];

    foreach ($planetas as $key => $planeta) {
        if (($_POST["habitables"] == 1 && $planeta['habitable']) ||
            ($_POST["habitables"] == 2 && !$planeta['habitable']) ||
            ($_POST["habitables"] == 3)) {
            $habitables[] = $planeta['nombre'];
        }
    }

    if (!empty($habitables)) {
        header("Location:../Views/habitablesResultados/resultado.php?".http_build_query($habitables));
    } else {
        header("Location:../Views/BadRequest.php");
    }
} elseif (isset($_POST["PlanetaG"])) {
    $index = is_numeric($_POST["PlanetaG"]) ? intval($_POST["PlanetaG"]) : -1;
    $found = false;

    if ($index >= 0 && isset($planetas[$index])) {
        $temp_toReturn = $planetas[$index]["nombre"];
        $gravity = defGravedad($planetas[$index]["gravedad"]);
        header("Location:../Views/PlanetasGravedad/Resultado.php?element=".$temp_toReturn."&id=".$index."&gravedad=".$gravity);
    } else {
        $names = strtolower($_POST["PlanetaG"]);

        foreach ($planetas as $key => $planeta) {
            if ($planeta["nombre"] == $names) {
                $gravity = defGravedad($planeta["gravedad"]);
                header("Location:../Views/PlanetasGravedad/Resultado.php?element=".$planeta["nombre"]."&id=".$key."&gravedad=".$gravity);
                $found = true;
                break;
            }
        }

        if (!$found) {
            header("Location:../Views/BadRequest.php");
        }
    }
} elseif (isset($_POST["Naves"])) {
    $temp_masaT = sumarMasa($naves);
    header("Location:../Views/Naves/MasaNave.php?Masa=".$temp_masaT."kg");
} elseif (isset($_POST["PlanetaE"])) {
    $planetaBuscar = buscarPlaneta($planetas, $_POST["PlanetaE"]);

    if ($planetaBuscar !== null) {
        echo "Planeta encontrado: " . $planetaBuscar['nombre'];
    } else {
        header("Location:../Views/BadRequest.php");
    }
} elseif (isset($_POST["NavesS"])) {
    $response = checkIfElementExistsInArray($naves, $_POST["NavesS"]);

    if ($response) {
        header("Location:../Views/NaveExiste/Response.php?Existe="."Esta nave si existe");
    } else {
        header("Location:../Views/NaveExiste/Response.php?Existe="."Esta nave NO existe");
    }
} elseif (isset($_POST["Select"])) {
    $randomNumber = rand(0, 8);
    $temp_namePlanetSelect = $planetas[$randomNumber]["nombre"];
    header("Location:../Views/ramdomPlanet/response.php?Name=".$temp_namePlanetSelect);
} elseif (isset($_POST["Clean"])) {
    $uniqueArray = array_unique($alienSpecies);
    $serializedArray = serialize($uniqueArray);
    header("Location:../Views/cleared/limpiarDuplicadosDeAliens.php?Cleared=".$serializedArray);
}elseif(isset($_POST["Show"])){
    $commonElements = array_filter($planetas, function ($element) use ($planetas2) {
        foreach ($planetas2 as $planet) {
            if ($planet['nombre'] != $element['nombre']) {
                return true;
            }
        }
        return false;
    });      
    $queryString = http_build_query($commonElements);
    header("Location:../Views/showCommons/response.php?Commons=".$queryString);
}elseif(isset($_POST["Differents"])){
    $commonElements = array_filter($planetas, function ($element) use ($planetas2) {
        foreach ($planetas2 as $planet) {
            if ($planet['nombre'] != $element['nombre']) {
                return true;
            }
        }
        return false;
    });      
    $queryString = http_build_query($commonElements);
    header("Location:../Views/showCommons/response.php?Commons=".$queryString);
}










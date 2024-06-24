<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $num1 = filter_input(INPUT_POST, 'num1', FILTER_VALIDATE_FLOAT);
    $num2 = filter_input(INPUT_POST, 'num2', FILTER_VALIDATE_FLOAT);
    $operacion = filter_input(INPUT_POST, 'operacion', FILTER_SANITIZE_STRING);

    if ($num1 === false || $num2 === false) {
        echo "Error: Entrada no válida.";
        return;
    }

    if ($operacion === '/' && $num2 == 0) {
        echo "Error: No se puede dividir entre cero.";
        return;
    }

    $resultado = calcular($num1, $num2, $operacion);
    if ($resultado === false) {
        echo "Error: Operación no válida.";
    } else {
        echo "Resultado: $resultado";
    }
}

function calcular($x, $z, $w) {
    switch ($w) {
        case '+':
            return sumar($x, $z);
        case '-':
            return restar($x, $z);
        case '*':
            return multiplicar($x, $z);
        case '/':
            return dividir($x, $z);
        default:
            return false;
    }
}

function sumar($x, $z) {
    return $x + $z;
}

function restar($x, $z) {
    return $x - $z;
}

function multiplicar($x, $z) {
    return $x * $z;
}

function dividir($x, $z) {
    return $x / $z;
}
?>


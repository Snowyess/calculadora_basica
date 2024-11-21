<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Básica</title>
</head>
<body>
    <h1>Calculadora Básica</h1>
    <form method="POST" action="">
        <label for="numero1">Número 1:</label>
        <input type="number" id="numero1" name="numero1" required><br><br>
        
        <label for="numero2">Número 2:</label>
        <input type="number" id="numero2" name="numero2" required><br><br>
        
        <label for="operacion">Operación:</label>
        <select id="operacion" name="operacion" required>
            <option value="suma">Suma</option>
            <option value="resta">Resta</option>
            <option value="multiplicacion">Multiplicación</option>
            <option value="division">División</option>
            <option value="porcentaje">Porcentaje</option>
        </select><br><br>
        
        <button type="submit">Calcular</button>
    </form>

    <?php
    // Procesar los datos del formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero1 = $_POST["numero1"];
        $numero2 = $_POST["numero2"];
        $operacion = $_POST["operacion"];
        $resultado = "";

        switch ($operacion) {
            case "suma":
                $resultado = $numero1 + $numero2;
                break;
            case "resta":
                $resultado = $numero1 - $numero2;
                break;
            case "multiplicacion":
                $resultado = $numero1 * $numero2;
                break;
            case "division":
                if ($numero2 != 0) {
                    $resultado = $numero1 / $numero2;
                } else {
                    $resultado = "Error: No se puede dividir entre cero.";
                }
                break;
            case "porcentaje":
                $resultado = ($numero1 * $numero2)/100;
                break;
            default:
                $resultado = "Operación no válida.";
        }

        echo "<h2>Resultado: $resultado</h2>";
        /*
        ¿Que sucede si intentas dividir un numero entre cero?
        Sale un aviso que dice "Resultado: Error: No se puede dividir entre cero."
        
        ¿Como se maneja este error error en el codigo?
        En el case "division" hay una validación que verifica que el número 2 sea diferente de cero. Si no es cero, 
        continúa con la división de los números. Si es cero, manda un mensaje de error: "Error: No se puede dividir entre cero."

        Modifica el codigo para agregar una operacion adicional, como el calculo del modulo (%)
        Se agrego un case "porcentaje" que calcula el porcentaje de los numeros.

        ¿Que ocuerre si dejas algun campo vacio en el formulario?
        Sale un mensaje que dice, "Please fill out this field", lo que significa que los numeros son obligatorios y no se puede
        calcular algo si los campos estan vacios. 
        
        ¿Como podrias valorar estos datos?
        Se pueden validar a travez de condicionales if ls cuales verifican que los datos sean correctos antes de realizar cálculos. 
        Verifica que los campos no estén vacíos, que los valores sean numéricos, que el divisor no sea cero en la división y que la operación 
        seleccionada sea válida. Si alguna de estas condiciones no se cumple, se muestra un mensaje de error y se evita el cálculo.
        */
    }
    ?>
</body>
</html>
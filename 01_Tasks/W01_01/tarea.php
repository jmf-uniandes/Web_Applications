<?php
// a. Declaración de Variables
$resistor1 = 220;         // Resistencia 1 en ohmios (integer)
$resistor2 = 330;         // Resistencia 2 en ohmios (integer)
$current = 0.02;          // Corriente en amperios (float)
$componentName = "Resistor"; // Nombre del componente (string)
$switchState = true;      // Estado del interruptor (boolean)
$components = array("Resistor", "Capacitor", "Inductor", "Transistor", "Diode"); // Lista de componentes (array)

// b. Operaciones Aritméticas
$totalResistance = $resistor1 + $resistor2;
$voltage = $totalResistance * $current;
echo "La resistencia total es: $totalResistance ohmios<br>";
echo "El voltaje en el circuito es: $voltage voltios<br>";

// c. Manipulación de Cadenas
$fullComponentName = $componentName . " 220 ohm";
$componentNameLength = strlen($componentName);

echo "Nombre completo del componente: $fullComponentName<br>";
echo "Longitud del nombre del componente: $componentNameLength<br>";

// d. Uso de Condicionales
if ($switchState) {
    echo "El interruptor está encendido<br>";
} else {
    echo "El interruptor está apagado<br>";
}

// e. Creación de un Array
echo "El tercer componente en la lista es: " . $components[2] . "<br>";
?>

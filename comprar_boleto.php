<?php
    // Obtener el ID del boleto seleccionado
    $idBoleto = $_POST['id'];

    // Conectarse a la base de datos
    $conexion = mysqli_connect("localhost", "root", "maclSC1519*", "boletos");

    // Verificar si se pudo establecer la conexión
    if ($conexion === false) {
        die("Error al conectar a la base de datos: " . mysqli_connect_error());
    }

    // Actualizar el boleto como no disponible en la base de datos
    $query = "UPDATE boletos SET disponible = 0 WHERE id = $idBoleto";
    $result = mysqli_query($conexion, $query);

    // Verificar si se pudo realizar la actualización
    if ($result) {
        echo "Boleto comprado con éxito";
    } else {
        echo "Error al comprar el boleto";
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="./Assets/css/styles.css">
    <script src="https://kit.fontawesome.com/54e04a308d.js" crossorigin="anonymous"></script>
</head>
<body>
    <header class="header">
        <div class="logo-header">
            <img src="./Assets/img/Vinduxlogo.png" alt="" srcset="">
            <div class="title-menu">
                <h1>Vindux</h1>
            </div>
        </div>
        <div class="nav-menu">

            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="menu-icono"><img src="assets/img/hamburguesa.png" alt=""></i>
            </label>
            <ul>
                <li><a href="downserver.html" class="link-nav">Quienes Somos</a></li>
                <li><a href="downserver.html" class="link-nav">Contactanos</a></li>
                <li><a href="downserver.html" class="link-nav">Consultar Mi Boleto</a></li>
                <li><a href="downserver.html" class="link-nav">Contacto</a></li>
                <li><a href="index.html">Home</a></li>
            </ul>
        </div>
    </header>
    <h1>Venta de Boletos</h1>
    <Section class="">
        <div class="container" id="boletos">
            <div class="container-hijo">
                <table id="tabla-boletos">
                    <?php
                        // Conectarse a la base de datos y obtener los boletos disponibles
                        $conexion = mysqli_connect("localhost", "root", "maclSC1519*", "boletos");
                        // Verificar si se pudo establecer la conexión
                        if ($conexion === false) {
                            die("Error al conectar a la base de datos: " . mysqli_connect_error());
                        }
                        $query = "SELECT * FROM boletos WHERE disponible = 1";
                        $result = mysqli_query($conexion, $query);
                
                        // Contador para controlar el número de columnas
                        $contador = 0;
                
                        // Recorrer los boletos disponibles
                        while ($row = mysqli_fetch_assoc($result)) {
                            // Si es el primer boleto de una fila, agregar una nueva fila en la tabla
                            if ($contador == 0) {
                                echo '<tr>';
                            }
                
                            // Mostrar el boleto en una celda de la tabla
                            echo '<td><button class="boleto" data-id="' . $row["id"] . '">' . $row["nombre"] . '</button></td>';
                
                            // Incrementar el contador de columnas
                            $contador++;
                
                            // Si se alcanza el número máximo de columnas por fila, cerrar la fila
                            if ($contador == 10) {
                                echo '</tr>';
                                // Reiniciar el contador de columnas
                                $contador = 0;
                            }
                        }
                
                        // Cerrar la conexión a la base de datos
                        mysqli_close($conexion);
                    ?>
                </table>
            </div>
        </div>
    </Section>
    <footer class="pie_pag">
        <div class="group1">
            <div class="box">
                <figure>
                    <a href="">
                        <img src="assets/img/Vinduxlogo.png">
                    </a>
                </figure>
            </div>
            <div class="box">
                <h2>Sobre Nosotros</h2>
                <p>Bienvenido a la pagina</p>
                <p>Vindux S.A</p>
            </div>
            <div class="box">
                <h2>Contactanos</h2>
                <div class="redes">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-whatsapp"></a>
                    <a href="#" class="fa fa-google"></a>
                </div>
            </div>
        </div>
        <div class="group2">
            <small>&copy; 2023 Todos los derechos Reservados Vindux</small>
        </div>
    </footer>
    <script src="./Assets/js/main.js"></script>
</body>
</html>

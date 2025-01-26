
<?php
// Leer el contenido del archivo de información
$archivoTema = "informacion.txt";
if (file_exists($archivoTema)) {
    $contenidoTema = file_get_contents($archivoTema);
} else {
    $contenidoTema = "Aquí aparecerá la información sobre el tema.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Editable</title>
</head>
<body>
    <h1>Información sobre la Evolución de la Inteligencia Artificial</h1>

    <!-- Mostrar el contenido actual del tema -->
    <div id="tema">
        <p><?php echo nl2br(htmlspecialchars($contenidoTema)); ?></p>
    </div>

    <!-- Botón para mostrar el formulario de edición -->
    <button onclick="document.getElementById('form-editar').style.display='block';">Modificar Información</button>

    <!-- Formulario para editar el contenido del tema -->
    <form id="form-editar" action="guardar_tema.php" method="post" style="display:none;">
        <textarea name="nuevo_tema" rows="10" cols="50" required><?php echo htmlspecialchars($contenidoTema); ?></textarea><br>
        <button type="submit">Guardar</button>
    </form>

    <hr>

    <h2>Agrega un Comentario</h2>
    <form action="guardar.php" method="post">
        <label for="comentario">Escribe tu comentario:</label><br>
        <textarea name="comentario" id="comentario" rows="5" cols="40" required></textarea><br><br>
        <button type="submit">Enviar</button>
    </form>

    <hr>

    <h2>Comentarios Anteriores</h2>
    <?php
    if (file_exists("comentarios.txt")) {
        $comentarios = file_get_contents("comentarios.txt");
        echo nl2br($comentarios);
    } else {
        echo "Aún no hay comentarios.";
    }
    ?>
</body>
</html>
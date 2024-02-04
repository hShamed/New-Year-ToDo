<?php include('db.php') ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Year</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <header class="top">
        <p> 
            Mis Propósitos 🎉
        </p>
    </header>

    <?php if(isset($_SESSION['message'])) {?>
        
    <div class="formMessage successMessage <?= $_SESSION['message_type']; ?>" id="message">
        <p><?= $_SESSION['message']; ?></p>
        <button onclick="messageClose()">×</button>
    </div>

    <?php session_unset(); }?>

    <div class="content">
        <main class="leftContent">
            <p class="titleContent">Formulario 🖊️</p>
            <form action="save_task.php" method="POST">            
                <label for="" class="labelForm">Propósito</label>
                <input type="text" name="title" class="textForm" placeholder="Aprender un idioma" required>

                <label for=""  class="labelForm">Descripción</label>
                <textarea name="description" id="" cols="30" rows="10" class="areaForm" placeholder="Estudiar de Lunes a Viernes..." required></textarea>

                <button type="submit" class="btnForm" name="save_task">Guardar</button>
            </form>
        </main>

        <aside class="rightContent">
            <p class="titleContent">Lista 📜</p>
            <table class="objectivesTable">
                <thead>
                    <tr>
                        <th>Propósito</th>
                        <th>Descripción</th>
                        <th>Fecha de Creación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Ejercicio</td>
                        <td>Rutina One Punch</td>
                        <td>09/01/2024 03:08:50</td>
                        <td>
                            <button class="btnTable">✏️</button>
                            <button class="btnTable">🗑️</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </aside>
    </div>

    <script src="scripts/message.js"></script>
</body>
</html>
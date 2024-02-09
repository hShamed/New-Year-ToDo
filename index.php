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
            <form id="objectivesForm" action="save_task.php" method="POST">            
                <input type="number" name="id" id="idForm" value="" style="display: none;">

                <label for="title" class="labelForm">Propósito</label>
                <input id="titleForm" type="text" name="title" class="textForm" placeholder="Aprender un idioma" required>

                <label for=""  class="labelForm">Descripción</label>
                <textarea name="description" id="descriptionForm" cols="30" rows="10" class="areaForm" placeholder="Estudiar de Lunes a Viernes..." required></textarea>

                <button id="saveBtn" type="submit" class="btnForm" name="save_task">Guardar</button>
            </form>
                <button id="cancelBtn" class="btnForm" onclick="clearForm()">Cancelar</button>
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
                    <?php
                        $query = "SELECT * FROM objective";
                        $result_objectives = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($result_objectives)) {
                    ?>

                            <tr>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td>
                                    <?php
                                        $originalDate = date_create($row['created_at']);

                                        echo date_format($originalDate, 'd-m-Y g:i A'); 
                                    ?>
                                </td>
                                <td>
                                    <button class="btnTable" onclick="editObjective('<?php echo $row['id']; ?>', '<?php echo $row['title']; ?>', '<?php echo $row['description']; ?>')">✏️</button>
                                    <button class="btnTable" onclick="deleteObjective()">🗑️</button>
                                </td>
                            </tr>

                    <?php } ?>
                </tbody>
            </table>
        </aside>
    </div>

    <div id="modalDelete">
        <div class="modal">
            <div class="modalContainer">
                <p>¿Estás seguro de <span>ELIMINAR</span> este propósito?</p>
                
                <div class="modalContainerButtons">
                    <form action="delete_task.php" method="POST" class="modalButtons">
                        <button class="btnModalDelete" type="submit" name="delete">Eliminar</button>
                    </form>
                    <button class="modalButtons btnModalCancel" onclick="dismissModal()">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="scripts/message.js"></script>
    <script src="scripts/objective.js"></script>
</body>
</html>
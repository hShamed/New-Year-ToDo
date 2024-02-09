const objectivesForm = document.getElementById("objectivesForm");
const idForm = document.getElementById("idForm");
const titleForm = document.getElementById("titleForm");
const descriptionForm = document.getElementById("descriptionForm");
const saveBtn = document.getElementById("saveBtn");
const cancelBtn = document.getElementById("cancelBtn");
const modalDelete = document.getElementById("modalDelete");


function editObjective(id, title, description) {
    objectivesForm.action = "edit_task.php";
    idForm.value = id;
    titleForm.value = title;
    descriptionForm.value = description;
    saveBtn.name = "edit_task";
    cancelBtn.style.display = "block";
}

function clearForm() {
    objectivesForm.action = "save_task.php";
    idForm.value = '';
    titleForm.value = '';
    descriptionForm.value = '';
    saveBtn.name = "save_task";
    cancelBtn.style.display = "none";
}

function deleteObjective() {
    modalDelete.style.display = "flex";
}

function dismissModal() {
    modalDelete.style.display = "none";
}
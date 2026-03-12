function showAddUserForm() {
    document.getElementById("addUserModal").style.display = "block";
    document.getElementById("addUserForm").reset();
}

function hideAddUserForm() {
    document.getElementById("addUserModal").style.display = "none";
}

function showLoginForm() {
    document.getElementById("loginModal").style.display = "block";
    document.getElementById("loginForm").reset();
}

function hideLoginForm() {
    document.getElementById("loginModal").style.display = "none";
}

function showAddMedicineForm() {
    document.getElementById("addMedicineModal").style.display = "block";
    document.getElementById("addMedicineForm").reset();
}

function hideAddMedicineForm() {
    document.getElementById("addMedicineModal").style.display = "none";
}

function toggleMenu() {
    const navMenu = document.getElementById('nav-menu');
    navMenu.classList.toggle('show');
}

document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.querySelector('.live-search');
    if (searchInput) {
        searchInput.addEventListener('input', function (e) {
            let term = e.target.value.toLowerCase().trim();
            let rows = document.querySelectorAll('#stock_management .medicines-table tr:not(:first-child)');

            rows.forEach(row => {
                let nameInput = row.cells[1].querySelector('input');
                let serialInput = row.cells[2].querySelector('input');

                let name = nameInput ? nameInput.value.toLowerCase() : row.cells[1].textContent.toLowerCase();
                let serial = serialInput ? serialInput.value.toLowerCase() : row.cells[2].textContent.toLowerCase();

                let match = name.includes(term) || serial.includes(term);
                row.style.display = match ? "" : "none";
            });
        });
    }
});

function updateField(id, field, value) {
    const formData = new FormData();
    formData.append('id', id);
    formData.append('field', field);
    formData.append('value', value);

    fetch('php/update_item.php', { method: 'POST', body: formData })
        .then(response => response.text())
        .then(data => {
            if (data === "success") showToast("Updated successfully!", "#10b981");
            else showToast("Update failed!", "#ef4444");
        });
}

function updateUserRole(id, newRole) {
    const formData = new FormData();
    formData.append('id', id);
    formData.append('role', newRole);

    fetch('php/update_user.php', { method: 'POST', body: formData })
        .then(response => response.text())
        .then(data => {
            if (data === "success") showToast("User role updated!", "#10b981");
            else showToast("Failed to update role!", "#ef4444");
        });
}

function deleteItem(id, type, referenceStr) {
    document.getElementById('deleteModal').style.display = 'block';
    document.getElementById('deleteTargetId').value = id;
    document.getElementById('deleteTargetType').value = type;
    document.getElementById('deleteTargetRef').value = referenceStr;
    document.getElementById('deleteConfirmInput').value = '';

    let msg = type === 'medicine'
        ? "Please type the serial number <b>" + referenceStr + "</b> to confirm deletion."
        : "Please type the username <b>" + referenceStr + "</b> to confirm deletion.";
    document.getElementById('deleteModalText').innerHTML = msg;
}

function closeDeleteModal() {
    document.getElementById('deleteModal').style.display = 'none';
}

function executeDelete() {
    let id = document.getElementById('deleteTargetId').value;
    let type = document.getElementById('deleteTargetType').value;
    let ref = document.getElementById('deleteTargetRef').value;
    let inputVal = document.getElementById('deleteConfirmInput').value;

    if (inputVal === ref) {
        const formData = new FormData();
        formData.append('id', id);
        formData.append('type', type);

        fetch('php/delete_item.php', { method: 'POST', body: formData })
            .then(response => response.text())
            .then(data => {
                if (data === "success") {
                    showToast("Deleted successfully!", "#3b82f6");
                    closeDeleteModal();
                    setTimeout(() => location.reload(), 1000);
                } else {
                    showToast("Delete failed or unauthorized!", "#ef4444");
                }
            });
    } else {
        showToast("Serial/Username does not match!", "#f59e0b");
    }
}
function createTableRows(container, data, keys) {
    const tbody = container;

    for (let row of data) {
        let newRow = document.createElement('tr');

        for (let key of keys) {
            if (key !== "option" && row.hasOwnProperty(key)) { // Vérifier si la clé est présente dans la ligne de données
                let currentCell = document.createElement('td');
                currentCell.textContent = row[key];
                newRow.appendChild(currentCell);
            }
        }

        if (keys.includes("option")) {
            let optionsCell = document.createElement('td');

            if (row['id']) {
                let deleteButton = document.createElement('button');
                deleteButton.textContent = 'Supprimer';
                deleteButton.addEventListener('click', function() {
                    deleteBook(row['id']);
                });
                optionsCell.appendChild(deleteButton);

                let editButton = document.createElement('button');
                editButton.textContent = 'Modifier';
                editButton.addEventListener('click', function() {
                    window.location.href = 'index.php?page=Modifier&id=' + row['id'];
                });
                optionsCell.appendChild(editButton);
            }

            newRow.appendChild(optionsCell);
        }

        tbody.appendChild(newRow);
    }
}

function deleteBook(bookId) {
    fetch('index.php?page=Consultation&action=delete', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'delete_id=' + encodeURIComponent(bookId)
    }).then(response => {
        if (response.ok) {
            console.log("Livre supprimé avec succès.");
            updateTable(document.querySelector("tbody"));
        } else {
            console.error("Erreur lors de la suppression du livre.");
        }
    }).catch(error => {
        console.error("Erreur lors de la suppression du livre:", error);
    });
}

function updateTable(table, keys) {
    fetch('http://localhost/ProjetJS/api.php').then(r => {
        return r.json()
    }).then(data => {
        createTableRows(table, data, keys)
    })
}

document.addEventListener('DOMContentLoaded', function() {
    const table = document.querySelector("tbody");
    if (table) {
        updateTable(table);
    }
});
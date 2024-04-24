function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

let searchTimer; // Variable pour stocker le timer de recherche

function searchBooks() {
    const input = document.getElementById("searchInput");
    const filter = input.value.toLowerCase();
    const dropdown = document.getElementById("myDropdown");

    // Réinitialiser le contenu du dropdown si la recherche est vide
    if (filter === "") {
        dropdown.innerHTML = '';
        return;
    }

    clearTimeout(searchTimer); // Effacer le timer précédent

    // Définir un nouveau timer pour la recherche
    searchTimer = setTimeout(function() {
        // Effectuer une requête à l'API pour récupérer les livres
        fetch('http://localhost/ProjetJS/api.php')
            .then(response => response.json())
            .then(data => {
                // Réinitialiser le contenu du dropdown
                dropdown.innerHTML = '';

                // Filtrer les livres dont le nom correspond à la recherche
                data.forEach(book => {
                    const bookName = book.name.toLowerCase();
                    if (bookName.includes(filter)) {
                        // Créer un lien pour chaque livre correspondant
                        const link = document.createElement('a');
                        link.href = '#';
                        link.textContent = book.name;
                        dropdown.appendChild(link);
                    }
                });
            })
            .catch(error => {
                console.error("Erreur lors de la récupération des livres:", error);
            });
    }, 300); // Délai d'attente en millisecondes (par exemple, 300ms)
}
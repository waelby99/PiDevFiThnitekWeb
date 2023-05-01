var currentDate = new Date();

// Parcourez toutes les lignes du tableau
var tableRows = document.getElementsByTagName("tr");
for (var i = 0; i < tableRows.length; i++) {

    // Récupérez la date de prochaine maintenance de chaque ligne
    var nextMaintenanceDate = tableRows[i].getElementsByTagName("td")[1].innerHTML;

    // Comparez la date de prochaine maintenance avec la date système
    if (nextMaintenanceDate === currentDate.toISOString().slice(0, 10)) {
        // Ajoutez la classe CSS pour mettre en évidence la ligne
        tableRows[i].classList.add("same-date");

        // Affichez la notification
        alert("La date de prochaine maintenance est la même que la date système !");
    }
}
function sortTable(column, order) {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('table');
    switching = true;

    while (switching) {
        switching = false;
        rows = table.rows;

        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;

            x = rows[i].querySelector(`[data-column="${column}"]`).textContent;
            y = rows[i + 1].querySelector(`[data-column="${column}"]`).textContent;

            if (order === 'asc' ? x > y : x < y) {
                shouldSwitch = true;
                break;
            }
        }

        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
        }
    }
}
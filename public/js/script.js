function searchRepos() {

    const input = document.getElementById('searchInput');
    const filter = input.value.toLowerCase();
    const table = document.querySelector('.table');
    const rows = table.getElementsByTagName('tr');

    for (let i = 1; i < rows.length; i++) {
        const cells = rows[i].getElementsByTagName('td');
        let matchFound = false;

        for (let j = 0; j < cells.length; j++) {
            const cell = cells[j];

            if (cell) {
                const textValue = cell.textContent || cell.innerText;
                if (textValue.toLowerCase().indexOf(filter) > -1) {
                    matchFound = true;
                    break;
                }
            }
        }

        rows[i].style.display = matchFound ? '' : 'none';
    }
}

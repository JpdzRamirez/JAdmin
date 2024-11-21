// Función para cargar el archivo JSON y mostrar los datos
fetch('python/datos/opiniones.json')
    .then(response => response.json())
    .then(data => displayData(data))
    .catch(error => console.error('Error al cargar el JSON:', error));

function displayData(data) {
    const tableBody = document.querySelector('#excelTable tbody');
    tableBody.innerHTML = ''; // Limpiar contenido previo

    data.forEach(row => {
        const rowElement = document.createElement('tr');

        Object.values(row).slice(0, 3).forEach(cell => {
            const cellElement = document.createElement('td');
            cellElement.textContent = cell !== undefined ? cell : '';
            rowElement.appendChild(cellElement);
        });

        tableBody.appendChild(rowElement);
    });
}
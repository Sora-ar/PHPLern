document.addEventListener('DOMContentLoaded', () => {
    const citySelect = document.getElementById('city');
    const deliveryTypeSelect = document.getElementById('deliveryType');
    const weightInput = document.getElementById('weight');
    const warehouseSelect = document.getElementById('warehouse');
    const form = document.getElementById('orderForm');
    const status = document.getElementById('status');

    fetch('fetchCities.php')
        .then(response => response.json())
        .then(data => {
            citySelect.innerHTML += data
                .map(city => `<option value="${city.Ref}">${city.Description}</option>`)
                .join('');
        })
        .catch(error => console.error('Помилка при завантаженні міст:', error));

    const updateWarehouses = () => {
        const cityRef = citySelect.value;
        const deliveryType = deliveryTypeSelect.value;
        const weight = parseFloat(weightInput.value) || 0;

        if (!cityRef) {
            warehouseSelect.innerHTML = '<option value="">Оберіть місто</option>';
            return;
        }

        fetch(`fetchWarehouses.php?cityRef=${cityRef}&deliveryType=${deliveryType}&weight=${weight}`)
            .then(response => response.json())
            .then(data => {
                warehouseSelect.innerHTML = data
                    .map(warehouse => `<option value="${warehouse.Ref}">${warehouse.Description}</option>`)
                    .join('');
            })
            .catch(error => console.error('Помилка отримання складів:', error));
    };

    citySelect.addEventListener('change', updateWarehouses);
    deliveryTypeSelect.addEventListener('change', updateWarehouses);
    weightInput.addEventListener('input', updateWarehouses);

    form.addEventListener('submit', e => {
        e.preventDefault();

        const formData = new FormData(form);

        fetch('saveOrder.php', {
            method: 'POST',
            body: formData,
        })
            .then(response => response.text())
            .then(data => {
                console.log('Відповідь сервера:', data);
                const jsonData = JSON.parse(data);
                if (jsonData.success) {
                    status.textContent = 'Замовлення успішно збережено!';
                } else {
                    status.textContent = `Помилка: ${jsonData.error}`;
                    console.log('Інформація про помилку сервера:', data.details);
                }
            })
            .catch(error => {
                console.error('Помилка збереження замовлення:', error);
                status.textContent = 'Виникла помилка збереження.';
            });
    });
});

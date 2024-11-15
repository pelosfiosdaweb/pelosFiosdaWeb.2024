const services = [
    { name: "Máquina Simples", price: "R$ 13,00" },
    { name: "Máquina e Tesoura", price: "R$ 20,00" },
    { name: "Degradê", price: "R$ 20,00" },
    { name: "Tesoura", price: "R$ 25,00" },
    { name: "Navalhado", price: "R$ 25,00" },
    { name: "Corte Infantil", price: "R$ 25,00" },
    { name: "Barba Simples", price: "R$ 13,00" },
    { name: "Barba Modelada", price: "R$ 15,00" },
    { name: "Pigmentação", price: "R$ 13,00" },
    { name: "Só Pé", price: "R$ 5,00" },
    { name: "Sombrancelha Masculina", price: "R$ 5,00" },
    { name: "Sombrancelha Feminina", price: "R$ 10,00" },
    { name: "Corte Feminino (Curto)", price: "R$ 30,00" }
];

const showPricesButton = document.getElementById('showPrices');
const serviceDetails = document.getElementById('serviceDetails');
const pricesList = document.getElementById('pricesList');

showPricesButton.addEventListener('click', function(event) {
    event.preventDefault(); // Impede o comportamento padrão do link
    if (serviceDetails.style.display === 'block') {
        serviceDetails.style.display = 'none'; // Fecha o menu
    } else {
        serviceDetails.style.display = 'block'; // Abre o menu
        pricesList.innerHTML = ''; // Limpa a lista de preços antes de preencher
        services.forEach(service => {
            const priceItem = document.createElement('p');
            priceItem.textContent = `${service.name}: ${service.price}`;
            pricesList.appendChild(priceItem);
        });
    }
});
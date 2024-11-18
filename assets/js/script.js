const servicos = [
    { nome: "Máquina Simples", preco: "R$ 13,00" },
    { nome: "Máquina e Tesoura", preco: "R$ 20,00" },
    { nome: "Degradê", preco: "R$ 20,00" },
    { nome: "Tesoura", preco: "R$ 25,00" },
    { nome: "Navalhado", preco: "R$ 25,00" },
    { nome: "Corte Infantil", preco: "R$ 25,00" },
    { nome: "Barba Simples", preco: "R$ 13,00" },
    { nome: "Barba Modelada", preco: "R$ 15,00" },
    { nome: "Pigmentação", preco: "R$ 13,00" },
    { nome: "Só Pé", preco: "R$ 5,00" },
    { nome: "Sobrancelha Masculina", preco: "R$ 5,00" },
    { nome: "Sobrancelha Feminina", preco: "R$ 10,00" },
    { nome: "Corte Feminino (Curto)", preco: "R$ 30,00" }
];

const mostrarPrecoButton = document.getElementById('mostrarPreco');
const servicoDetalhes = document.getElementById('servicoDetalhes');
const precosLista = document.getElementById('precosLista');

mostrarPrecoButton.addEventListener('click', function(event) {
    event.preventDefault(); //Evita o comportamento padrão do botão
    if (servicoDetalhes.style.display === 'block') {
        servicoDetalhes.style.display = 'none'; // Fecha o menu
    } else {
        servicoDetalhes.style.display = 'block'; // Abre o menu
        precosLista.innerHTML = ''; // Limpa a lista de preços antes de preencher
        servicos.forEach(servico => {
            const precoItem = document.createElement('p');
            precoItem.textContent = `${servico.nome}: ${servico.preco}`;
            precosLista.appendChild(precoItem);
        });
    }
});

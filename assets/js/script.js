$(document).ready(function(){

    const relogio = document.querySelector("div.relogio span")

    const renderizarRelogio = () => {
        const horaAtual = new Date()
        relogio.innerHTML = ("0"+horaAtual.getHours()).slice(-2) + ":"
        + ("0"+horaAtual.getMinutes()).slice(-2) + ":"
        + ("0"+horaAtual.getSeconds()).slice(-2)
    };


    setInterval(() => {
        renderizarRelogio()
    }, 1000);
});
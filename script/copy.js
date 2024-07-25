document.addEventListener("DOMContentLoaded", () => {
    const btnCopy = document.querySelector("#copy");

    btnCopy.addEventListener('click', () => {
        const text = document.querySelector('#copyandpaste');
        text.select();
        document.execCommand("copy");
        alert("Código copiado com sucesso!");
    })
})
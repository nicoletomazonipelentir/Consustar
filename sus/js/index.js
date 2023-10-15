// function validarCPF(cpf) {
//     cpf = cpf.replace(/\D/g, '');
//     if (cpf.length !== 11) return false;

//     return true;
// }

// cpfInput.addEventListener('blur', function () {
//     const cpf = this.value;
//     if (!validateCPF(cpf)) {
//         alert('CPF Inválido. Tente Novamente.');
//         this.value = '';
//     }
// });

function validar(input) {
    input.value = input.value.replace(/\D/g, '');
}
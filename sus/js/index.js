function formatCPF(cpf) {
    cpf = cpf.replace(/\D/g, '');
    cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
    cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
    cpf = cpf.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
    return cpf;
}

const cpfInput = document.getElementById('cpfInput');

cpfInput.addEventListener('input', function () {
    if (this.value.length > 14) {
        this.value = this.value.slice(0, 14);
    }
    this.value = formatCPF(this.value);
});

function validateCPF(cpf) {
    cpf = cpf.replace(/\D/g, '');
    if (cpf.length !== 11) return false;

    return true;
}

cpfInput.addEventListener('blur', function () {
    const cpf = this.value;
    if (!validateCPF(cpf)) {
        alert('CPF Inválido. Tente Novamente.');
        this.value = '';
    }
});
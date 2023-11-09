async function buscaCep() {
    var cep = document.getElementById('txtCep').value.replace(/\D/g, '');

    if (cep.length === 8) {
        try {
            const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
            const data = await response.json();

            if (!data.erro) {
                document.getElementById('txtCidade').value = data.city;
                document.getElementById('txtEstado').value = data.state;
                // Preencha outros campos conforme necessário
            } else {
                alert('CEP não encontrado.');
            }
        } catch (error) {
            alert('Erro ao buscar o CEP. Por favor, tente novamente.');
        }
    }
}
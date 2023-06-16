const elements = {
    inputUsuario: document.getElementById("usuario-input"),
    inputSenha: document.getElementById("senha-input"),
}

async function entrar() {
    let body = {
        email: elements.inputUsuario.value,
        senha: elements.inputSenha.value
    };
    let parameter = {
        method: 'POST',
        body: JSON.stringify(body)
    };
    await fetch(process.env.URL_API + "aluno/login", parameter)
        .then(res => res.text())
        .then(content => {
            let result = JSON.parse(content);
            sessionStorage.setItem("cliente", result);
            return;
        })
        .catch(err => {
            console.log(err);
            throw err;
        });
}
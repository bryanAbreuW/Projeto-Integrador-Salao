const elements = {
    inputUsuario: document.getElementById("usuario-input"),
    inputSenha: document.getElementById("senha-input")
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
    await fetch(process.env.URL_API + "cliente/login", parameter)
        .then(res => res.text())
        .then(content => {
            let result = JSON.parse(content);
            let obj = {
                id: result.id,
                nome: result.nome,
                email: result.email,
                token: result.token,
            }
            sessionStorage.setItem("cliente", JSON.stringify(obj));
            return;
        })
        .catch(err => {
            console.log(err);
            throw err;
        });
}
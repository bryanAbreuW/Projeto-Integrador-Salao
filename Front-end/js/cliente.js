const elements = {
    inputUsuario: document.getElementById("usuario-input"),
    inputSenha: document.getElementById("senha-input")
}

function getToken() {
    let token = sessionStorage.getItem("token");
    if (token) {
        return "Bearer " + token;
    }
    return "";
}

async function entrar() {
    let body = {
        email: elements.inputUsuario.value,
        senha: elements.inputSenha.value
    };
    let parameter = {
        method: 'POST',
        body: JSON.stringify(body),
        headers: {
            'Authorization': getToken(),
            'Content-Type': 'application/json',
        },
    };
    await fetch(process.env.URL_API + "cliente/login", parameter)
        .then(res => res.text())
        .then(content => {
            let result = JSON.parse(content);
            let cliente = {
                id: result.dados[0].id,
                nome: result.dados[0].nome,
                email: result.dados[0].email,
            }
            sessionStorage.setItem("cliente", JSON.stringify(cliente));
            sessionStorage.setItem("token", result.token);
            location.href = "./index.html";
        })
        .catch(err => {
            console.log(err);
            //throw err;
            alert("Erro: \n" + err);
        });
}

function sair() {
    sessionStorage.removeItem("cliente");
    sessionStorage.removeItem("token");
    location.href = "./index.html";
}

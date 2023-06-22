const elements = {
    inputUsuario: document.getElementById("usuario-input"),
    inputSenha: document.getElementById("senha"),
    inputNome: document.getElementById("nome"),
    inputEmail: document.getElementById("email"),
    inputTelefone: document.getElementById("tel"),
    inputData_nascimento: document.getElementById("data_nascimento"),
    inputObservacao: document.getElementById("observacao")
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
            console.error(err);
            alert("Erro: \n" + err);
        });
}

async function enviarDados() {
    let body = {
        id: null,
        nome: elements.inputNome.value,
        email: elements.inputEmail.value,
        senha: elements.inputSenha.value,
        telefone: elements.inputTelefone.value,
        data_nascimento: elements.inputData_nascimento.value,
        observacao: elements.inputObservacao.value,
    };
    let parameter = {
        method: 'POST',
        body: JSON.stringify(body),
        headers: {
            'Authorization': getToken(),
            'Content-Type': 'application/json',
        },
    };
    await fetch(process.env.URL_API + "cliente", parameter)
        .then(res => res.text())
        .then(txt => {
            let result = JSON.parse(txt);
            if (result.error) {
                alert(result.error);
            } else if (result.message) {
                alert(result.message);
            } else {
                alert("Não foi possível cadastrar.");
            }
        })
        .catch(err => {
            console.error(err);
            alert("Não foi acessar o servidor.");
        })
}


function sair() {
    sessionStorage.removeItem("cliente");
    sessionStorage.removeItem("token");
    location.href = "./index.html";
}

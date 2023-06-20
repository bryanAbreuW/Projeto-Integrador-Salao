export default class Cliente {
    constructor() {
            this.id = 0,
            this.nome = "",
            this.email = "",
            this.senha = "",
            this.telefone = "",
            this.data_nascimento = "",
            this.validado = true
            this.ativo = true
    }
    validarDados() {
        let erros = "";
        if (!this.nome) {
            erros += "Nome em branco.\n";
        }
        if (!this.email) {
            erros += "E-mail em branco.\n";
        }
        if (!this.senha) {
            erros += "Senha em branco.\n";
        }
        if (this.telefone) {
            erros += "Telefone em branco";
        }
        if (erros != "") throw erros;
    };
}
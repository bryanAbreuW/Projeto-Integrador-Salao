export default class Servico {
    constructor() {
            this.id = 0,
            this.nome = "",
            this.descricao = "",
            this.preco = ""
    }

    validarDados() {
        let erros = "";
        if (!this.nome) {
            erros += "Nome em branco.\n";
        }
        if (!this.descricao) {
            erros += "Descrição em branco.\n";
        }
        if (!this.preco) {
            erros += "Preço em branco.\n";
        }
        if (erros != "") throw erros;
    };
}
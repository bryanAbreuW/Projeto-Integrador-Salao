export function header() {
    if (!sessionStorage.getItem("cliente")) {
        let template =
            `
            <div id="header-primary">
                <div class="d-flex justify-content-between">
                    <div id="header-logo" class="align-self-center">
                        <a href="./index.html">    
                            <img src="./img/logo_milla_reis_studio-539x441.png"
                                alt="Logotipo do site Milla Reis Studio">
                        </a>
                    </div>
                    <div class="align-self-center">
                        <nav class="menu">
                            <a class="menu-item" aria-current="page" href="#main-nossos-servicos">Nossos
                                servi&ccedil;os</a>
                            <a class="menu-item" href="./quem-somos.html">Quem somos</a>
                            <a class="menu-item" href="#section-05">Galeria</a>
                            <a class="menu-item" href="#footer-primary">Contato</a>
                            <a class="menu-item menu-item-button" href="./login.html">Entre</a>
                        </nav>
                    </div>
                </div>
            </div>
            `;
        document.getElementById("header-page").innerHTML = template;
        return;
    }

    let cliente = JSON.parse(sessionStorage.getItem("cliente"));
    let template = `
        <div class="navbar" id="header-primary">
            <div class="d-flex justify-content-between">
                <div id="header-logo" class="align-self-center">
                    <a href="./index.html">    
                        <img src="./img/logo_milla_reis_studio-539x441.png"
                            alt="Logotipo do site Milla Reis Studio">
                    </a>
                </div>
                <div class="align-self-center">
                    <nav class="menu">
                        <a class="menu-item" aria-current="page" href="#main-nossos-servicos">Nossos
                            servi&ccedil;os</a>
                        <a class="menu-item" href="./quem-somos.html">Quem somos</a>
                        <a class="menu-item" href="#section-05">Galeria</a>
                        <a class="menu-item" href="#footer-primary">Contato</a>`;

    if (cliente.roles == 1) {
        template +=
            `   
                <a class="menu-item" href="#">Serviços</a>    
                <a class="menu-item menu-item-button" href="">${cliente.nome}</a>
                <a class="menu-item menu-item-button" href="./logoff.html">Sair</a>
            `;
    } else if (cliente.roles == 0) {
        template +=
            ` 
                <a class="menu-item" href="./cadastro-servico.html">Serviços</a>                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        ${cliente.nome}
                    </a>
                    <ul class="dropdown-menu">            
                        <li><a class="menu-item dropdown-item" href="#">Clientes</a></li>
                        <li><a class="menu-item menu-item-button" href="./logoff.html">Sair</a></li>
                    </ul>
                </li>
            `;
    }

    template +=
        `               </nav>
                </div>
            </div>
        </div>
        <!-- Header - FIM -->
    </div>
    `;

    document.getElementById("header-page").innerHTML = template;
}

header();



/*  
function header() {
       let template =
        `  
    <div>
        <!-- Header - INICIO -->
        <div id="header-primary">
            <div class="d-flex justify-content-between">
                <div id="header-logo" class="align-self-center">
                <a href="./index.html">    
                    <img src="./img/logo_milla_reis_studio-539x441.png"
                        alt="Logotipo do site Milla Reis Studio">
                </a>
                </div>
                <div class="align-self-center">
                    <nav class="menu">
                        <a class="menu-item" aria-current="page" href="#main-nossos-servicos">Nossos
                            servi&ccedil;os</a>
                        <a class="menu-item" href="./quem-somos.html">Quem somos</a>
                        <a class="menu-item" href="#section-05">Galeria</a>
                        <a class="menu-item" href="#footer-primary">Contato</a>`;

    if (sessionStorage.getItem("cliente")) {
        let cliente = JSON.parse(sessionStorage.getItem("cliente"))
        if(cliente.roles == 1) {
            template +=
            `   
                <a class="menu-item" href="./cadastro-servico.html">Serviços</a>    
                <a class="menu-item menu-item-button" href="">${cliente.nome}</a>
                <a class="menu-item menu-item-button" href="./logoff.html">Sair</a>
            `
        } else if (cliente.roles == 0) {
            template += 
            ` 
                <a class="menu-item" href="./cadastro-servico.html">Serviços</a>
                <a class="menu-item" href="">Clientes</a>
                <a class="menu-item" href="">${cliente.nome}</a>
                <a class="menu-item menu-item-button" href="./logoff.html">Sair</a>
                
            `
        }

    } else {
        template +=
            `       
            <a class="menu-item menu-item-button" href="./login.html">Entre</a>
            `
    }

    template +=
        `               </nav>
                    </div>
                </div>
            </div>
        <!-- Header - FIM -->
    </div>
    `;
    document.getElementById("header-page").innerHTML = template;
 } */



export function footer() {
    document.getElementById("footer-page").innerHTML =
        `
     <div>
            <!-- Footer - INICIO -->
            <div id="footer-primary">
                <!-- Footer - Linha 1 - INICIO -->
                <div class="d-flex flex-row">
                    <div class="footer-primary-item">
                        <div>
                            <a href="#header-primary">
                                <h2 class="fw-semibold">Milla Reis Studio</h2>
                            </a>
                        </div>
                        <div>
                            <p class="text-break">High-grade professional beauty and care services tailored to your
                                needs and desires. Let our experts enhance your look and individuality!</p>
                        </div>
                    </div>
                    <div class="footer-primary-item">
                        <div>
                            <h2>Horários</h2>
                        </div>
                        <div>
                            <div class="d-flex flex-row">
                                <div>
                                    <p>Terça: &nbsp;</p>
                                </div>
                                <div>
                                    <p class="fw-bold">09h às 19h</p>
                                </div>
                            </div>
                            <div class="d-flex flex-row">
                                <div>
                                    <p>Quarta: &nbsp;</p>
                                </div>
                                <div>
                                    <p class="fw-bold">09h às 19h</p>
                                </div>
                            </div>
                            <div class="d-flex flex-row">
                                <div>
                                    <p>Quinta: &nbsp;</p>
                                </div>
                                <div>
                                    <p class="fw-bold">09h às 19h</p>
                                </div>
                            </div>
                            <div class="d-flex flex-row">
                                <div>
                                    <p>Sexta: &nbsp;</p>
                                </div>
                                <div>
                                    <p class="fw-bold">09h às 19h</p>
                                </div>
                            </div>
                            <div class="d-flex flex-row">
                                <div>
                                    <p>Sábado: &nbsp;</p>
                                </div>
                                <div>
                                    <p class="fw-bold">10h às 16h</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-primary-item">
                        <div>
                            <h2>Contato</h2>
                        </div>
                        <div>
                            <p>+55 (99) 99999-9999</p>
                        </div>
                        <div>
                            <p>mysite@email.com</p>
                        </div>
                    </div>
                    <div class="footer-primary-item">
                        <div>
                            <h2>Venha nos visitar</h2>
                        </div>
                        <div>
                            <p class="text-break">45 Rockefeller Plaza, New York, NY 10111, USA</p>
                        </div>
                    </div>
                </div>
                <!-- Footer - Linha 1 - FIM -->
                <!-- Footer - Linha 2 - INICIO -->
                <div class="d-flex justify-content-between p-2 mt-4">
                    <div>
                        <p>&copy; Desenvolvido por Turma 2022.4-Programador Web SENAC RJ</p>
                    </div>
                    <div>
                        <p>Todos os direitos reservados</p>
                    </div>
                </div>
                <!-- Footer - Linha 2 - FIM -->
            </div>
            <!-- Footer - FIM -->
        </div>
    `
}

export function sair() {
    sessionStorage.removeItem("cliente");
    sessionStorage.removeItem("token");
    location.href = "./index.html";
}


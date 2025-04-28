<?php require_once __DIR__ . "/cabecaslho.php"?>

<main class="conteudo-principal">
    <!-- Coluna esquerda -->
    <div class="coluna-lateral">
        <a class="btn-incluir" href="/novo-candidato">incluir</a>
    </div>
    

    <!-- Lista de perfis -->
    <div class="lista-pessoas">
        <div class="card-perfil">
        <img src="https://via.placeholder.com/100" alt="Imagem de Perfil" />
        <div class="info-perfil">
            <h3>João da Silva</h3>
            <p>Cargo: Desenvolvedor</p>
            <div class="acoes-card">
            <button>Alterar</button>
            <button>Remover</button>
            <button>Remover Imagem</button>
            </div>
        </div>
        </div>

        <!-- Adicione mais perfis aqui -->
    </div>
</main>
<?php require_once __DIR__ . "/rodape.php"?>
<?php require_once __DIR__ . "/cabecaslho.php"?>

<main class="conteudo-principal">
    <!-- Coluna esquerda -->
    <div class="coluna-lateral">
        <a class="btn-incluir" href="/novo-candidato">incluir</a>
    </div>
    

    <!-- Lista de perfis -->
    <div class="lista-pessoas">
        <?php foreach($candidatos as $candidato):  ?>
            <div class="card-perfil">
            <img src="/arquivos/<?= $candidato->getPhoto(); ?>" alt="Imagem de Perfil" style="width: 23%"/>
            <div class="info-perfil">
                <h3><?= $candidato->name ?></h3>
                <p>Cargo Anterior: <?= $candidato->profAnterior?> </p>
                <div class="acoes-card">
                <button><a href="/editar-candidato?id=<?= $candidato->id?>" >Alterar</a></button>
                <button><a href="/remove-candidato?id=<?= $candidato->id?>" >Remover</a></button>
                <button><a href="/rphoto-candidato?id=<?= $candidato->id?>" >Remover Imagem</a></button>
                <button><a href="/info-candidato?id=<?= $candidato->id?>" >Visualizar</a></button>
                </div>
            </div>
            </div>
        <?php endforeach; ?>
            <!-- Adicione mais perfis aqui -->
    </div>
</main>
<?php require_once __DIR__ . "/rodape.php"?>
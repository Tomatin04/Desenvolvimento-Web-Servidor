
<?php require_once __DIR__ . "/cabecaslho.php";?>
<main class="visualizacao-container">
    <div class="dados-candidato">
        <div class="foto-perfil">
            <img src="/arquivos/<?= $candidato->getPhoto();?>" alt="Foto do Candidato" style="width: 100%" />
        </div>
        <h2>Dados do Candidato</h2>
        <p><strong>Nome:</strong><?= $candidato->name;?></p>
        <p><strong>Idade:</strong><?= $candidato->idade;?></p>
        <p><strong>Email:</strong><?= $candidato->email;?></p>
        <p><strong>Telefone:</strong><?= $candidato->phone;?></p>
        <p><strong>Profissão Anterior:</strong><?= $candidato->profAnterior;?></p>
        <p><strong>Descrição:</strong> <?= $candidato->description;?></p>
        <p><strong>Comentário:</strong><?= $candidato->comment;?></p>

        <div class="arquivos-enviados">
        <h3>Curriculo Enviado</h3>
        <ul>
            <li><a href="#">Currículo.pdf</a></li>
        </ul>
        </div>
    </div>
</main>
<?php require_once __DIR__ . "/rodape.php"?>
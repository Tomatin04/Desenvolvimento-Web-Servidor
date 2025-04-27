<?php require_once __DIR__ . "/cabecalho.php"?>
<main class="formulario-container">
    <form class="formulario">
      <div class="campo-form">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required />
      </div>

      <div class="campo-form">
        <label for="idade">Idade:</label>
        <input type="number" id="idade" name="idade" required />
      </div>

      <div class="campo-form">
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required />
      </div>

      <div class="campo-form">
        <label for="telefone">Telefone:</label>
        <input type="tel" id="telefone" name="telefone" required />
      </div>

      <div class="campo-form">
        <label for="profissao">Profissão Anterior:</label>
        <input type="text" id="profissao" name="profissao" required />
      </div>

      <div class="campo-form">
        <label for="descricao">Descrição do Candidato:</label>
        <textarea id="descricao" name="descricao" rows="4" required></textarea>
      </div>

      <div class="campo-form">
        <label for="comentario">Comentário:</label>
        <textarea id="comentario" name="comentario" rows="4" required></textarea>
      </div>

      <div class="campo-form arquivos">
        <label for="arquivo1">Adicionar Arquivo 1:</label>
        <input type="file" id="arquivo1" name="arquivo1" />
      </div>

      <div class="campo-form arquivos">
        <label for="arquivo2">Adicionar Arquivo 2:</label>
        <input type="file" id="arquivo2" name="arquivo2" />
      </div>

      <button type="submit" class="btn-enviar">Enviar</button>
    </form>
  </main>

<?php require_once __DIR__ . "/rodape.php"?>
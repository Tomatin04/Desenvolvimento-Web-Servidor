<?php require_once __DIR__ . "/cabecaslho.php";?>
<main class="formulario-container">
    <form class="formulario" method="POST" enctype="multipart/form-data">
      <div class="campo-form">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="name" required />
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
        <input type="tel" id="telefone" name="phone"  />
      </div>

      <div class="campo-form">
        <label for="profissao">Profissão Anterior:</label>
        <input type="text" id="profissao" name="profAnterior"  />
      </div>

      <div class="campo-form">
        <label for="descricao">Descrição do Candidato:</label>
        <textarea id="descricao" name="description" rows="4" ></textarea>
      </div>

      <div class="campo-form">
        <label for="comentario">Comentário:</label>
        <textarea id="comentario" name="comment" rows="4" ></textarea>
      </div>

      <div class="campo-form arquivos">
        <label for="arquivo1">Adicionar Arquivo 1:</label>
        <input type="file" accept="image/*" id="arquivo1" name="photo" />
      </div>

      <div class="campo-form arquivos">
        <label for="arquivo2">Adicionar Arquivo 2:</label>
        <input type="file" id="arquivo2" name="curriculum" />
      </div>

      <button type="submit" class="btn-enviar">Enviar</button>
    </form>
  </main>

<?php require_once __DIR__ . "/rodape.php";?>
# PARTICIPAENTES

- Matheus Sampaio Rebelato
    RA: 2509849

# Desenvolvimento-Web-Servidor
O projeto do trabalho para a matéria  Desenvolvimento Web-Servidor 

O projeto consiste em um sistem de registro de Candidatos onde o usuário terá a capacidade de registrar os candidados, suas fotos e seus curriculos.
Nele será possivel fazer o CRUD dos candidados e dos usuários, onde somente o Admin poderá cadastrar novos usuáriso e os usuáriso poderão cadastrar os candidatos.


# Componentes do Projeto: 
- O projeto foi construido de forma a funcionar tanto como cliente quanto servidor, no momento, o banco de dados usado
é um SQLite, já que a complexidade do codigo não exige um banco de dados
- Utiliza um fremawork chamdo composer, ele é usado para carregar automaticamente as classes em um autoload
- O projeto contem atualmente apenas o CRUD dos candidados
- Também comtém um armazenamento em cookie para a realização do login, sendo totalmente necessario a ação de login para que o usuário possa realizar
qualquer operação no sistema

# Planos futuros para o projeto
A ideia é que o projeto tenha uma área de admin, onde serão cadastreados os usuários e o adm podera realizar as ações como usuário também.

Já os usuários, apenas o CRUD de candidatos, eles não terão permissão para realizarem alterações em seus prefis ou coisa do genero.

A ideia é que o sistema possa entregar tanto o curriculo enviado pelo candidato, como gerar um pdf que contém as susa informações no sistema.

Outro objetivo é adicionar um sistema de verificação de candidatos presentes no sistema e escalalos para candidatura, onde o adm requisita uma determiando cargo e
os usuários indicam, com base nos perfis dos candidatos, quais são os melhores candidatos para aquele vaga espesifica.

Também terá um pequeno sistema de ranking dos candidatos, para saber se eles devem permanecer no sistema, ou serem descartados.

# Instruções para uso da aplicação
A aplicação foi inicializada e testada em terminal, para evitar a instalação de outras plataformas para rodar o projeto. Usando o comando "php -S localhost:8080 -t public",
no terminal da pasta, é iniciado um servidor php temporariamente para poder rodar a aplicação.

Como no momento não foram implmentados os sistemas de admin, um registro que pode ser usado para realizar o login é 
    EMAIL: teste@teste.com    
    PASSWORD: 123456
Assim, é possivel acessar o sistema e suas funcionalidades

Também é necessario tem o Composer instalado no sistema, já que o programa usa do seu sistema de autoload para poder inciar  o programa. Também na propria linha de comando,
deve ser usado o comando "composer dumpautoload", para carregar o autoload do composer

# Bugs e Features
Atualmente, não tem nehuma tratativa de erro se o usuário tentar ir para uma pagina não mapeada, mas como o sistema está bem mapeado, a principio, não tem porque se preocupar com está situação

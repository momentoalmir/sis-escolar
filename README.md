# Sistema Acadêmico em PHP
Este é um sistema acadêmico simples desenvolvido em PHP que implementa as funcionalidades básicas de CRUD (Create, Read, Update, Delete) seguindo o padrão arquitetural Model-View-Controller (MVC).

## Requisitos
- PHP 8.0 ou superior
- Servidor Apache
- Banco de dados MySQL
- [Em desenvolvimento] XAMPP

## Instalação

- Faça o download ou clone este repositório para o diretório raiz do seu servidor Apache.
- Certifique-se de que o servidor Apache e o MySQL estão em execução.
- Crie o banco de dados chamado `sis_escolar`
- Se estiver em Windows execute o arquivo `run.ps1`

## Uso

Após concluir a instalação, você poderá acessar o sistema acadêmico em seu navegador. O sistema oferece as seguintes funcionalidades:

Gerenciamento de Turmas:

Listar todas as turmas

Criar nova turma

Editar informações da turma

Excluir turma

Gerenciamento de Disciplinas:


Listar todas as disciplinas

Criar nova disciplina e associar a uma turma

Editar informações da disciplina

Excluir disciplina

O sistema segue o padrão MVC, onde:


O diretório app contém as classes de modelos (Models) para representar as tabelas do banco de dados.

O diretório utils contém classes utilitárias, como o roteador (Router), a visualização (View) e a classe de conexão com o banco de dados (Database).

O diretório views contém os arquivos de visualização em formato PHP para exibir as páginas do sistema.

O diretório public contém arquivos públicos, como CSS, JavaScript e imagens.

O arquivo index.php é o ponto de entrada do sistema e define as rotas e controladores para as diferentes páginas.

## Contribuição
Sinta-se à vontade para contribuir com melhorias para este sistema acadêmico. Você pode enviar pull requests com suas modificações, relatar problemas ou sugestões de novas funcionalidades.

## Licença
Este projeto está licenciado sob a Licença MIT.

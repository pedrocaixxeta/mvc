# Sistema de Recomendação de Livros por Gênero (MVC - PHP)

**Composição do Projeto**
- Projeto em PHP organizado em MVC + DAO + Service.
- Funcionalidades: CRUD de Recomendações de Livros (Create, Read, Update, Delete).
- Banco de Dados: MySQL.

**Modo de usar**
1. Importação do banco de dados para PhpMyAdmin.
2. Coloque o projeto em um servidor local (XAMPP).
3. Acessar localhost/(nome da pasta com os arquivos).

**Rotas**
- `index.php` (lista)
- `index.php?action=create` (formulário de criação)
- `index.php?action=store` (POST para salvar)
- `index.php?action=edit&id=1` (formulário editar)
- `index.php?action=update&id=1` (POST para atualizar)
- `index.php?action=delete&id=1` (deletar)

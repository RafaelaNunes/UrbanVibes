# UrbanVibes
Trabalho De Engenharia de softwere

# Autores
* Rafaela Valadão Nunes
* João Lucas Ramalho
* João Batista

# Descrição
O sistema de gerenciamento de loja de roupas é uma solução  projetada para otimizar o gerenciamento de inventário, vendas e operações diárias em uma loja de roupas. O sistema oferece uma interface intuitiva, facilitando a adição, edição e exclusão de produtos, bem como o monitoramento de vendas, compras e relatórios financeiros.

# Principais Funcionalidades
* Gerenciamento de Produtos: Adicionar, editar e excluir produtos, gerenciar detalhes como nome, descrição, preço e quantidade em estoque.
* Gerenciamento de Fornecedores : Adicionar, editar e excluir produtos.
* Controle de Estoque: Monitorar níveis de estoque e receber alertas quando os produtos estiverem abaixo do mínimo estabelecido.
* Processamento de Vendas: Registrar vendas, gerar recibos e acompanhar o histórico de transações.
* Processamento de Compras: Registrar e acompanhar compras de produtos
* Relatórios e Análises: Gerar relatórios detalhados sobre vendas, inventário e desempenho da loja.

# Tipos de Usuários Previstos
Administrador: Gerencia todas as funcionalidades do sistema, incluindo a configuração de permissões e o gerenciamento de produtos e usuários.

# Link kamban e backlog
https://github.com/users/joaobat119/projects/1/views/1
     
# Tecnologias Utilizadas 
* Frontend: Html5, CSS 
* Backend: PHP  8.0.30
* Banco de Dados:  mysql8.0.30

# Estrutura

```/Diagramas/
|
/Padrão Adotados/
|
/Requisitos/
|
/src/
│
├── /css/
│   └── styles.css
│
├── /images/
│   └── logo.png
│
├── /js/
│   └── scripts.js
│
├── /includes/
│   └── db_connection.php
│   └── functions.php
│
├── /views/
│   ├── /fornecedores/
│   │   ├── fornecedores.php
│   │   ├── add_fornecedor.php
│   │   ├── edit_fornecedor.php
├   |   |── script_edit_fornecedor.php
│   │   └── delete_fornecedor.php
│   │
│   ├── /produtos/
│   │   ├── list_produtos.php
│   │   ├── add_produto.php
│   │   ├── edit_produto.php
|   |   |── sript_edit_produto.php
│   │   └── delete_produto.php
|   |
|   ├── /compras/
│   │   ├── list_compras.php
│   │   ├── add_compras.php
│   │   ├── edit_compras.php
|   |   |── sript_compras.php
│   │   └── delete_compras.php
|   |
|   ├── /vendas/
│   │   ├── list_vendas.php
│   │   ├── add_vendas.php
│   │   ├── edit_vendas.php
|   |   |── sript_vendas.php
│   │   └── delete_vendas.php 
|   |
|   |
│   │
│   └── /auth/
│       ├── logar.php
│       ├── login.html
│       └── logout.php
│

│
└── /config/
    └── config.php```

# 📚 Sistema de Gestão de Alunos (CRUD Completo + Dashboard Analítico)

Este projeto é um sistema web robusto desenvolvido em PHP e MySQL, que combina a gestão completa de alunos (CRUD) com um Dashboard para visualização de dados estratégicos, utilizando Bootstrap para o design.

## 🚀 Funcionalidades Principais

O sistema é dividido em duas áreas principais: **Autenticação de Usuário** e **Gestão de Alunos**.

### 1\. Área de Autenticação e Navegação

  * **Login (`index.php`):** Página inicial para acesso ao sistema.
  * **Cadastro de Usuário (`tela_cadastro.php`):** Permite que novos usuários criem uma conta.
  * **Autenticação:** O processamento do login (`login.php`) verifica as credenciais, e o cadastro (`cadastro.php`) insere novos usuários no banco de dados.
  * **Logout:** Finaliza a sessão e redireciona para a página de login.
  * **Menu de Navegação:** Barra de navegação que conecta o Dashboard, Cadastro de Alunos e Lista de Alunos.

### 2\. Gestão e Análise de Alunos

| Operação | Arquivo de Interface | Arquivo de Lógica |
| :--- | :--- | :--- |
| **Create (Cadastrar)** | `cadastro_aluno.php` | `formulario_al.php` (Salva os dados) |
| **Read (Listar)** | `listar_al.php` | `lista.php` (Busca os dados) |
| **Update (Editar)** | `edita.php` | (Contém a lógica de processamento e formulário) |
| **Delete (Deletar)** | `listar_al.php` (Link) | `deleta.php` (Executa a exclusão) |
| **Dashboard** | `painel.php` | `graficos.php` (Calcula KPIs e dados de gráficos) |

## 📊 Estrutura do Dashboard (`painel.php` e `graficos.php`)

O Dashboard exibe cards de resumo (KPIs) e gráficos visuais usando a biblioteca **Google Charts**.

  * **Cards de Resumo:** Total de Alunos, Total de Cursos, Média de Alunos por Curso, Alunos Fora de Crateús, etc..
  * **Gráficos:** Visualização de Distribuição de Alunos por Bairro e Proporção por Tipo de Responsável.

## 💻 Tecnologias Utilizadas

| Categoria | Tecnologia |
| :--- | :--- |
| **Linguagem** | PHP |
| **Banco de Dados** | MySQLi (Extensão de conexão) |
| **Autenticação** | Senhas criptografadas com `MD5()` |
| **Estilização** | Bootstrap 5 |
| **Gráficos** | Google Charts API |

## ⚙️ Instalação e Configuração

Para rodar este projeto localmente, siga os passos abaixo:

### 1\. Pré-requisitos

Certifique-se de ter um ambiente de servidor web instalado (ex: XAMPP, WAMP ou MAMP) com suporte a PHP e MySQL.

### 2\. Configuração da Conexão

O arquivo `conexao.php` define as credenciais. Por padrão, ele está configurado para um ambiente local:

```php
define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'login'); // Nome do seu banco de dados
```

### 3\. Criação do Banco de Dados e Tabelas

1.  **Crie o Banco de Dados:**
    Crie um banco de dados MySQL com o nome `login`.
2.  **Crie a Tabela `users` (Para Login):**
    ```sql
    CREATE TABLE users (
        user_id INT AUTO_INCREMENT PRIMARY KEY,
        user_name VARCHAR(100) NOT NULL,
        user_email VARCHAR(100) UNIQUE NOT NULL,
        user_password VARCHAR(32) NOT NULL -- MD5 Hash
    );
    ```
3.  **Crie a Tabela `alunos` (Para o CRUD e Dashboard):**
    ```sql
    CREATE TABLE alunos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome_aluno VARCHAR(100) NOT NULL,
        data_nasc DATE,
        cpf VARCHAR(11) UNIQUE,
        curso VARCHAR(50),
        name_resp VARCHAR(100),
        tipo_resp VARCHAR(50),
        rua VARCHAR(100),
        bairro VARCHAR(100),
        cidade VARCHAR(100),
        numero_casa VARCHAR(10),
        cep VARCHAR(8)
    );
    ```

### 4\. Execução do Projeto

1.  Mova os arquivos do projeto para o diretório de projetos do seu servidor web (ex: `htdocs` ou `www`).
2.  Acesse o sistema pelo navegador. A página inicial será o login:
    `http://localhost/nome_da_pasta/index.php`

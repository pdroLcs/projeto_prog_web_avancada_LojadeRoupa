# Loja de Roupa (Projeto de Programação Web Avançada)

**Visão Geral**:
- **Descrição**: Projeto de exemplo de uma loja de roupas desenvolvido em Laravel. Contém gerenciamento de produtos, categorias, clientes, compras e mensagens.

**Tecnologias**:
- **PHP / Laravel**: backend e estrutura MVC.
- **Composer**: gerenciamento de dependências PHP.
- **MySQL (por exemplo via XAMPP)**: banco de dados.
- **Node.js / NPM**: para build de assets com Vite.
- **Vite**: bundler e dev server para assets (JS/CSS).
- **Tailwind CSS / Bootstrap 5**: framework utilitário CSS.

**Estrutura do projeto (resumo)**:
- **`app/`**: código Laravel (Models, Controllers, Requests, Middleware).
- **`resources/views/`**: views Blade (front-end da aplicação).
- **`routes/`**: definições de rotas (`web.php`, `auth.php`).
- **`database/`**: migrations.
- **`public/`**: ponto de entrada público (coloque o `public` no DocumentRoot do servidor).
- **`resources/js`** e **`resources/css`**: código front-end gerenciado pelo Vite.
- **`vendor/`**: dependências PHP (geradas por `composer install`).

**Pré-requisitos**:
- PHP (versão compatível com a versão do Laravel usada neste projeto).
- Composer.
- Node.js e NPM.
- MySQL (ou MariaDB). No Windows uma opção prática é usar o XAMPP.

**Instalação — passos rápidos (PowerShell)**:

1. Clone o repositório (se ainda não estiver local):

```powershell
git clone https://github.com/pdroLcs/projeto_prog_web_avancada_LojadeRoupa
cd projeto_prog_web_avancada_LojadeRoupa
```

2. Instale dependências PHP e Node:

```powershell
composer install
npm install
```

3. Configure o arquivo de ambiente:

```powershell
copy .env.example .env
```

Edite o ` .env ` e ajuste as variáveis do banco de dados (`DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`) e qualquer outro ajuste necessário (MAIL, SERVICES, etc.).

4. Gere a chave da aplicação e rode migrações:

```powershell
php artisan key:generate
php artisan migrate
php artisan storage:link
```

Se preferir recriar o banco do zero em desenvolvimento:

```powershell
php artisan migrate:fresh
```

5. Build dos assets (desenvolvimento ou produção):

Desenvolvimento (com watcher):

```powershell
npm run dev
```

Produção (build otimizado):

```powershell
npm run build
```

6. Rodando o servidor Laravel (alternativas):

- Usando o servidor embutido (PHP):

```powershell
php artisan serve --host=127.0.0.1 --port=8000
# Acesse: http://127.0.0.1:8000
```

- Usando XAMPP/Apache: coloque o conteúdo do projeto (ou apenas `public/`) no `htdocs` ou configure um Virtual Host apontando para a pasta `public/`.

Exemplo rápido para acesso via XAMPP se o projeto já está em `C:/xampp/htdocs/projeto_prog_web_avancada_LojadeRoupa`:

```
http://localhost/projeto_prog_web_avancada_LojadeRoupa/public
```

Recomendo configurar um Virtual Host para remover o `/public` da URL.

**Comandos úteis**:
- **Instalar dependências PHP**: `composer install`
- **Instalar dependências JS**: `npm install`
- **Gerar chave**: `php artisan key:generate`
- **Rodar migrations**: `php artisan migrate`
- **Rodar migrations (reset)**: `php artisan migrate:fresh`
- **Criar link de storage público**: `php artisan storage:link`
- **Build dev (Vite)**: `npm run dev`
- **Build prod**: `npm run build`

**Dicas e solução de problemas**:
- Se der erro de conexão com o banco, confira as credenciais em ` .env ` e se o MySQL está em execução (no XAMPP: iniciar MySQL).
- Se assets não carregarem em produção, execute `npm run build` e limpe caches: `php artisan view:clear && php artisan route:clear && php artisan config:clear`.
- Verifique permissões para as pastas `storage/` e `bootstrap/cache/`.
- Se aparecer erro relacionado ao Vite em dev, verifique se `npm run dev` está em execução e se a URL do Vite está correta no `vite.config.js`.

**Observações**:
- Este repositório já contém arquivos de configuração como `vite.config.js`, `tailwind.config.js`, `phpunit.xml` e migrations iniciais.
- Ajuste a versão do PHP e extensões necessárias conforme o `composer.json` do projeto.

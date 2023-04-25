# BRDEV-FRAMEWORK

O BRDEV-FRAMEWORK é um framework PHP moderno e fácil de usar, que oferece uma estrutura simples e intuitiva para desenvolvimento de aplicações web. O framework inclui suporte para Template view blade, Controllers, Models, criação de banco de dados com apenas um comando e facilidade para gerenciar arquivos estáticos (CSS, JS, imagens).

# Instalação
Para instalar o BRDEV-FRAMEWORK, utilize o Composer:

```bash
composer require brdev/framework yourproject
```

Recursos
Template View Blade
Para utilizar a view, chame a função view('file'). Caso queira passar parâmetros, utilize a seguinte sintaxe:

```php
view('file', ['text' => 'Hello']);
```
Controller
O framework oferece suporte para Controllers, facilitando a organização e a lógica da aplicação.

Models
Os Models estão disponíveis para facilitar a interação com o banco de dados e o gerenciamento dos dados da aplicação.

Criação de Banco de Dados
Para criar um banco de dados com apenas um comando, execute:

```bash
php database/send.php
```
Criação de Tabelas
Para criar tabelas, utilize o exemplo da classe User.php na pasta database/tables.

Configuração
Configure sua estrutura no arquivo .env. Durante a instalação, não é necessário criar um novo arquivo .env, pois ele será criado automaticamente.

Arquivos Estáticos (CSS, JS, imagens)
Armazene seus arquivos estáticos (CSS, JS, imagens) na pasta public. Utilize o método assets() para acessar os arquivos dessa pasta:

php
Copy code
assets('css/style.css');
Com o BRDEV-FRAMEWORK, você terá uma estrutura simples e eficiente para desenvolver suas aplicações PHP de maneira rápida e fácil.
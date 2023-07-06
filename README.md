# Teste BMA Soluções Digitais

### Feito com: PHP (Laravel) + MySQL + Bootstrap

### Para testar o projeto:

1. Baixe o ZIP do projeto ou clone:

2. Tenha XAMPP instalado e inicie o servidor Apache e MySQL.

3. Configure o banco de dados MySQL: Abra o navegador e digite "http://localhost/phpmyadmin" para acessar o phpMyAdmin.

4. Crie um novo banco de dados com o nome teste-laravel.
```
teste-laravel
```

5. Extraia o projeto: Descompacte o arquivo ZIP do seu projeto Laravel em algum lugar dentro da pasta "htdocs" no diretório de instalação do XAMPP.

6. Crie uma cópia do arquivo .env.example e renomeie-o para .env. Isso criará um arquivo de ambiente para seu projeto Laravel.

7. Instale as dependências do projeto: Abra um terminal na pasta do projeto e execute o comando composer install para instalar as dependências do Laravel.

8. Execute o comando a seguir para gerar a chave de criptografia do aplicativo Laravel:
```
php artisan key:generate
```

9. Em seguida, execute o seguinte comando para executar as migrações e criar as tabelas do banco de dados:
```
php artisan migrate
```

10. Para rodar o projeto:
```
php artisan serve
```

11. Acesse o projeto: Abra o navegador e digite o comando abaixo para acessar o seu projeto Laravel.
```
http://localhost:8000
```




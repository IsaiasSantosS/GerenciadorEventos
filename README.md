# Gerenciador Eventos
Este projeto consiste em um sistema para fazer o gerenciamento de eventos. Ele possui o cadastro de eventos, das palestras e dos palestrantes do Evento a ser realizado.

Também deve fornecer uma API com todos os dados para que possa ser utilizadapor outras aplicações.

# Tecnologias Utilizadas

- PHP 7.4
- Framework Symfony 5.2
- Mysql 8.0
- Bootstrap 5.0
- [Api Platform](https://api-platform.com/docs/distribution/#using-symfony-and-composer)

# Instalação

- clone repositorio
- composer install
- configure o .env para o seu banco de dados
- Criar as tabelas: php bin/console doctrine:migrations:migrate
- Preenchar as tabelas com dados faker: php bin/console doctrine:fixtures:load
- iniciar o servidor

# API

- /api para abrir o gerenciador da API

# Desenvolvedor
__Isaias Santos__

[GitHub](http://github.com/IsaiasSantosS)
[Linkedin](https://www.linkedin.com/in/isaiassantos95)

#
*Desenvolvido para um teste de seleção.*

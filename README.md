# Delivery Much Tech Challenge - API de Receitas

Este projeto foi construído como teste técnico para o processo seletivo para uma oportunidade com Desenvolvedor Fullstack na Delivery Much.

O projeto é de uma api que traz uma lista de receitas para o cliente, de acordo com os ingredientes que o mesmo vai informando.

### Requisitos

* PHP 7.4 - [Documentação](https://www.php.net/downloads.php)
* Laravel 8.28 - [Documentação](https://laravel.com/docs/8.x)
* Laravel Sail - [Documentação](https://laravel.com/docs/8.x/sail)
* Composer 2 - [Documentação](https://getcomposer.org/doc/)
* RecipePuppy - Encontre receitas pelos ingredientes e palavras-chaves. [Site](http://www.recipepuppy.com/about/api/)
* Giphy Developers - Recurso usado para encontrar gifs. [Site](https://developers.giphy.com/docs/api#quick-start-guide)
### Uso

1º) Faça o clone do projeto 
```
git clone https://github.com/williamtome/recipes-api-dmtc.git
```

2º) Execute os comando abaixo para instalar as dependências do projeto: <br>
Obs.: É obrigatório que tenha o Composer instalado em seu ambiente de desenvolvimento.
```
composer install
```

3º) Você precisa obter uma chave da API do Giphy para que seja adicionada no arquivo *.env* da aplicação. Para isso, acesse o site do Giphy Developers (link está na sessão de **Requisitos**), clique no botão **Create an App**. Você será redirecionado para o Dashboard (antes disso, você precisará fazer um rápido cadastro no site da Giphy!) e então precisa criar o seu app para que seja gerado a api_key.

![Preview](https://github.com/williamtome/recipes-api-dmtc/blob/master/recipes-api.gif?raw=true)

4º) Em seguida, adicione uma nova variável com o nome GIPHY_API_KEY no arquivo *.env* do projeto e cole a sua chave api_key.

![Preview](https://github.com/williamtome/recipes-api-dmtc/blob/master/add-api-key-on-project.gif?raw=true)

5º) Por padrão, já vem adicionado ao Laravel o Laravel Sail, que nada mais é do que um setup pré-configurado da aplicação usando Docker. Para rodar a aplicação localmente, precisa ter o Docker instalado na sua máquina. Se for Windows ou Mac, instale o [Docker Desktop](https://www.docker.com/products/docker-desktop) ou se for Linux, instale com este comando:
```
$ curl -fsSL https://get.docker.com | bash
```
Após instalado e ativado o Docker, entre na pasta do projeto e execute:
```
cd recipes-api-dmtc
./vendor/bin/sail up -d
```

### Testes

```
./vendor/bin/sail tests

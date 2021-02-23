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

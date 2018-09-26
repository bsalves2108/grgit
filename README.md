**1. Linguagens/bibliotecasJS utilizadas:

- php 7.1+
- gulp
- ES6
- jQuery
- ChartsJS
- JavaScript
- Composer
- npm
- MySQL
- LESS
- Bootstrap 4
- Appache

\* Foi solicitado que seja usado php puro, sem frameworks, o composer está sendo utilizado  para reaproveitar o autoloader e pensando na reusabilidade do código.


**2. Dependências dev

sudo npm install -g gulp


**3. Estrutura

A estrutura básica consiste na seguinte árvore abaixo:

/

App/

        Controllers/

        Models/

        Middlewares/

        Views/

                js/

                less/

node\_modules/

public/

        assets/

                css/

                js/

                img/

vendor/

        composer/

        grgit/

                Lib/


**4. Rotas

As rotas estão no arquivo index.php que está localizado na raíz do sistema.

Temos 2 métodos get() e post() e devem ser utilizados da seguinte maneira:

$app->get('/dashboard', 'AdminController@indexAdminController@index', 'middleware');

$app->post('/dashboard', 'AdminController@indexAdminController@index', 'middleware');

Apenas os 2 primeiros parâmetros são obrigatórios, o primeiro parâmetro define a rota e o segundo o Objeto@metodo


**5. Controllers

Os controllers devem ser criados dentro da pasta App/Controllers e deve seguir a seguinte semântica

namespace App\Controllers;

use App\Middlewares\ExemploMiddleware;

use App\Models\ExemploModel;

use grgit\Lib\Controller;

class ExemploController extends Controller
{

}

É possível definir templates para diferentes tipos de controllers, para isso basta alterar o valor do atributo **$this->template = 'default'** ; para o nome do template criado.


**6. Models

Os Models devem ser criados dentro da pasta APP/Models e deve seguir a seguinte semântica

namespace App\Models;

use grgit\Lib\Model;

class Contact extends Model
{
    protected $table = 'contacts';
}

O atributo **$table** deve ter o mesmo valor da tabela referente ao objeto.


**7. Middlewares

Os Middlewares devem ser criados dentro da pasta APP/Middlewares e deve seguir a seguinte semântica

namespace App\Middlewares;

use grgit\Lib\Middleware;

class Auth extends Middleware
{
    public function run()
    {
    
    }
}

É obrigatório a declaração do método run() pois o sistema de rotas utiliza este método para executar o middleware de forma automática, todas as verificações devem ser criadas e chamadas no método run(), caso queira que ela seja executada na chamada de uma rota, segue exemplo de uso em uma rota abaixo:

$app->get('/dashboard', 'AdminController@indexAdminController@index', 'Auth');

No exemplo acima, quando a rota /dashboard receber uma requisição GET, Antes de executar o método index do objeto AdminController, o método run do middleware Auth será acionado.

Os métodos também podem ser chamados fora de uma rota.


**8. Views

As views serão carregadas através do controller pelo método $this→view() que pode receber até 3 parâmetros

$this->view('nome_da_pagina', ['array_com_dados'], true||false)

O terceiro parâmetro diz se a view deve ser carregada  com um template ou não.

Para recuperar os valores passados no segundo parâmetro, basta utilizar a variável **$data** dentro da view


**8.1 JS e LESS

O JS de desenvolvimento deve ser escrito nesta pasta e deve obedecer o mesmo nome e hierarquia de pastas da view, exemplo, se foi criado uma view com nome dashboard dentro da pasta admin, então dentro da pasta JS deve ser criado uma pasta admin com o arquivo dashboard.js

o Gulp irá ler as alterações e criações na pasta JS e nas subpastas e criar uma versão compilada e minificada dentro de public/js/Mesma\_hierarquia.

O mesmo vale para o CSS, os arquivos devem ser escritos em less com extenção .less e serão compilados e minificados para as respectivas pastas dentro da pasta public.


**9. Instalação

Para instalar o sistema siga o passo a passo abaixo,

1. Criar um  banco de dados e importar o arquivo **grgit.sql**
2. Acessar a pasta raíz do sistema e executar os comandos abaixo:
  1. npm install
  2. php -S localhost:8080
3. Abrir o navegador e acessar o link **localhost:8080/home**


**Observações:**

- O index da aplicação é o /home
- Não utilizei webpack, mas tenho conhecimento para utilizar
- Se apresentar algum erro no autoloader basta executar composer update ou install
- A falta de &quot;padrões&quot; de codificação em alguns casos foi proposital, em um lugar fiz de um modo e em outro fiz de outro modo, com o propósito de demonstrar que sei fazer de ambas as formas, exemplo, no cadastro e login, estou utilizando uma maneira um pouco mais classica do js, já dentro da página cliente, estou utilizando ES6 com classes e extendendo objetos e no admin em alguns casos fiz o uso de promises.
- Deve ser rodado o gulp, caso precise fazer alteração em js ou less/css.
- Poderia ter feito algo muito mais simples, porém seria mais difícil avaliar meu conhecimento técnico, se a complexidade não for necessária, posso refazer o teste de modo mais simples.

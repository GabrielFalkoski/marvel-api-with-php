## Marvel API with PHP
Esse projeto tem como objetivo principal proporcionar diversão utilizando a API da Marvel.

### Funcionalidades
- Retorna os personagens da Marvel através de uma busca por nome;
- Retorna três personagens da Marvel através de uma busca por ID;
- Para cada personagem é mostrado o nome, uma imagem, uma descrição e 5 histórias em que eles aparecem;
- Ao digitar no campo de busca a API é consultada automaticamente 1 segundo após parar de escrever, ou ao clicar na tecla ENTER.

### Marvel API
Antes de mais nada você irá precisar dos dados de acesso para a API da Marvel. Estes dados você irá conseguir no site https://developer.marvel.com. 
- **Crie uma conta:** é necessário criar uma conta, no link https://developer.marvel.com/account, e após isso receberá acesso a sua chave pública e privada.
- **Documentação:** é possível ler a documentação e fazer testes para todos os endpoints disponíveis, através do link https://developer.marvel.com/docs.

Os dados de acesso devem ser adicionados no arquivo 
>includes/MarvelApi/MarvelApi.php.

Copie eles do site e cole nas constantes da classe MarvelApi, como abaixo:
    
	class MarvelApi extends CallerApi
	{
		/**
		 * The Public Key from Marvel API.
		 *
		 * To get Marvel API Keys access https://developer.marvel.com/account.
		 *
		 * @var string
		 */
		protected const PUBLIC_KEY = 'coloque sua chave pública aqui';

		/**
		 * The Private Key from Marvel API.
		 *
		 * To get Marvel API Keys access https://developer.marvel.com/account.
		 *
		 * @var string
		 */
		private const PRIVATE_KEY = 'coloque sua chave privada aqui';

### Rodando
Para rodar o projeto você ira precisar do PHP e de um Servidor Web instalado em seu computador. 
Veja como instalalá-los em seu sistema operacional, neste link: https://www.php.net/manual/pt_BR/install.php.
Basta cloná-lo em no diretório www/ e acessá-lo pelo seu navegador preferido ;)

### Contribuindo
O projeto utiliza **Gulp** para rodar algumas tarefas, como, compilar e comprimir o CSS e JS.

Para instalá-lo, junto com as bibliotecas utilizadas por ele, basta rodar o comando:

`$ npm install`

_Caso não tenha o npm instalado, veja o link https://nodejs.org/en/._

Depois rode o Gulp para ver as tarefas disponíveis:

`$ gulp`

As tarefas são:

- `$gulp concat`
	agrupa em um único arquivo todas as bibliotecas JS utilizadas no projeto, elas precisam estar na pasta assets/js/lib/.
	
- `gulp minify`
	comprime todos os arquivos JS dentro da pasta assets/js/ e coloca em uma nova pasta assets/js/min/.
	
- `$gulp cssnano`
	comprime todos o arquivo assets/css/style.css.

O projeto utiliza LESS como processador do CSS, utilize o comando abaixo para combilar o CSS e ficar monitorando novas alterações:

`$gulp watch`

Caso tenha algum problema para rodar o Gulp, veja mais informações: https://gulpjs.com/docs/en/getting-started/quick-start.

### TODOs

- Implementar mais métodos para acessar diretamente os outros endpoints da API;
- Posibilitar a ordenação dos resultados por _nome_, _data de modificação_, etc;
- Traduzir README para inglês.
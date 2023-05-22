# Projeto de Consumo de Recursos de Clubes

Este projeto consiste em uma API para o consumo de recursos por clubes, onde é possível cadastrar clubes, listar clubes cadastrados e consumir recursos dos clubes.

## Requisitos

Antes de executar o projeto, certifique-se de ter os seguintes requisitos instalados:

- XAMPP (ou um servidor web similar) para executar o PHP e o MySQL.

## Configuração do Banco de Dados

1. Inicie o XAMPP (ou seu servidor web).

2. Abra o painel de controle do XAMPP e inicie os serviços Apache e MySQL.

3. Acesse o phpMyAdmin através do navegador e crie um novo banco de dados chamado `testecbc`.

4. Na seção "SQL" do phpMyAdmin, cole o seguinte código e execute-o para criar as tabelas necessárias:

   ```
   CREATE TABLE Clube (
       id INT AUTO_INCREMENT PRIMARY KEY,
       clube VARCHAR(50) NOT NULL,
       saldo_disponivel DECIMAL(10, 2) NOT NULL
   );

   CREATE TABLE Recurso (
       id INT AUTO_INCREMENT PRIMARY KEY,
       recurso VARCHAR(50) NOT NULL,
       saldo_disponivel DECIMAL(10, 2) NOT NULL
   );
   ```
## Inserindo novos dados em Recurso

Para inserir novos dados na tabela Recurso, siga as etapas abaixo:

1. Acesse o phpMyAdmin através do seu navegador.

2. Selecione o banco de dados `testecbc`.

3. Navegue até a seção "SQL" no phpMyAdmin.

4. Execute a seguinte consulta SQL para adicionar um novo recurso:

   ```
   INSERT INTO Recurso (recurso, saldo_disponivel)
   VALUES ('Nome do Recurso', Valor do Saldo Disponível);
   ```

## Configuração da API

1. Clone ou faça o download deste repositório para o diretório de documentos do seu servidor web.

2. Abra o arquivo configuracao.php e verifique se as configurações do banco de dados estão corretas. Se necessário, atualize o valor das seguintes variáveis de acordo com as configurações do seu ambiente:
	
	```
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "testecbc";
	```

3. Salve o arquivo configuracao.php.

## Executando o Projeto

1. Inicie o XAMPP (ou seu servidor web) e inicie os serviços Apache e MySQL.

2. Abra o Postman (ou outra ferramenta similar) para testar a API.

## Cadastro de Clubes

- Abra o Postman e crie uma nova requisição.

- Certifique-se de que o método da requisição é POST e a URL está configurada corretamente para o endpoint: `http://localhost/cadastroclub.php.`

- Selecione a opção "Body" na parte inferior da janela do Postman e escolha o formato "Raw" para o corpo da requisição (JSON).

- No corpo da requisição, insira os dados necessários conforme descrito na documentação. Por exemplo:

	```
	{
		"clube": "Nome do Clube",
		"saldo_disponivel": "Valor do Saldo Disponível"
	}
	```

## Listagem de Clubes

- Selecione o método GET e insira a URL correspondente ao endpoint que deseja testar para listar todos os clubes, utilize a URL: `http://localhost/club-api/listclubes.php.`

## Consumo de Recursos

- Selecione o método POST e insira a URL correspondente ao endpoint que deseja testar para consumir recursos, utilize a URL: `http://localhost/club-api/consumirrec.php/consumir-recursos`

- Selecione a opção "Body" na parte inferior da janela do Postman e escolha o formato "Raw" para o corpo da requisição (JSON).

- No corpo da requisição, insira os dados necessários conforme descrito na documentação para consumir recursos. Por exemplo:

	```
	{
		"clube_id": "ID do Clube",
		"recurso_id": "ID do Recurso",
		"valor_consumo": "Valor do Consumo"
	}
	```

Observação: Certifique-se de substituir localhost/club-api pela URL correta do seu servidor web, caso necessário.

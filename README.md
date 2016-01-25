Ya Boleto Demo
==============

O que é?
---
Aplicacao de demonstracao do funcionamento dos componentes dos boletos e arquivo de retorno:

* [Ya Boleto](https://github.com/umbrellaTech/ya-boleto-php)
* [Ya Retorno Boleto](https://github.com/umbrellaTech/ya-retorno-boleto)

Instalação
----------

```shell
$ php composer.phar create-project umbrella/ya-boleto-demo path/to/install
``` 

Acessando a aplicação demo
----------

Para os boletos temos apenas os exemplos para o BB, Santander e Real, mas você pode facilmente integrar um novo layout de boleto.
Na sua url acesse a seguinte página:

```sh
$ php -S localhost:8888 -t web/ web/boleto/index.php
```

* http://localhost:8888/?banco=bb
* http://localhost:8888/?banco=santander
* http://localhost:8888/?banco=real

Para os arquivos de retorno basta acessar:

```sh
$ php -S localhost:8888 -t web/ web/retorno/index.php
```

* http://localhost:8888

Não existem layouts bem feitos, por tanto agradeço a ajuda se você quiser melhroar o layout das aplicações de demonstração.

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
# Install Composer
$ curl -sS https://getcomposer.org/installer | php

# Adicionando Ya Boleto Demo como dependencia
$ php composer.phar create-project umbrella/ya-boleto-demo=dev-master path/to/install
``` 

Acessando a aplicação demo
----------

Para os boletos temos apenas os exemplos para o BB, Santander e Real, mas você pode facilmente integrar um novo layout de boleto.
Na sua url acesse a seguinte página:

* /web/boleto/index.php?banco=bb
* /web/boleto/index.php?banco=santander
* /web/boleto/index.php?banco=real

Para os arquivos de retorno basta acessar:

* /web/retorno/index.php

Não existem layouts bem feitos, por tanto agradeço a ajuda se você quiser melhroar o layout das aplicações de demonstração.

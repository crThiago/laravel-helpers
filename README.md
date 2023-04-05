# LARAVEL HELPERS
O projeto Laravel Helpers é um pacote de funções e classes que facilitam o desenvolvimento de aplicações BR desenvolvidas em Laravel.

## Instalação
```bash
  composer require crthiago/laravel-helpers
```
## Configuração
Caso deseje customizar as configurações padrão do pacote, basta publicar o arquivo de configuração.
```bash
  php artisan vendor:publish --provider="Crthiago\LaravelHelpers\LaravelHelpersServiceProvider"
```
    
## Modo de Uso
Todo o pacote é auto carregado pelo composer, basta importar as classes ou chamar a funções que deseja usar.

### Format

| Função | Classe | Descrição |
| --- | --- | --- |
| `money` | `Format::money` | Transforma um número para o formato moeda |
| `number_db` | `Format::numberDb` | Transforma uma string contendo um número em formato do banco de dados |
| `format_date` | `Format::date` | Transforma a date do banco de dados em formato **DD/MM/YYYY** |
| `datetime` | `Format::datetime` | Transforma a datetime do banco de dados em formato **DD/MM/YYYY HH:MM:SS** |
| `date_db` | `Format::dateDb` | Transforma string **DD/MM/YYY** em formato do banco de dados |
| `datetime_db` | `Format::datetimeDb` | Transforma string **DD/MM/YYYY HH:MM:SS** em formato do banco de dados |

**Exemplos**
```php
money('0.5'); // R$ 0,50
money('1000', false); // 1.000,00
money(1.5, '$ ', 2, '.', ''); // $ 1.50
-----
number_db('1.000'); // 1000
number_db('1.000,5'); // 1000.5
number_db('R$ 1.000,50'); // 1000.5
-----
format_date('2018-02-01'); // '01/02/2018'
format_date('2018-02-01', 'm/d/Y'); // '02/01/2018'
-----
datetime('2018-02-01 12:00:00');  // '01/02/2018 12:00:00'
-----
date_db('01/02/2018'); // '2018-02-01'
date_db('12/31/2018', 'm/d/Y') // '2018-12-31'
-----
datetime_db('01/02/2018 12:30:00'); // '2018-02-01 12:30:00'
```

### Mask
### Sanitize
### Validate


## Contribuição
Pull requests são sempre bem-vindos. Para mudanças importantes, abra uma issue primeiro para discutir o que você gostaria de mudar.

Por favor, certifique-se de atualizar os testes conforme apropriado.

## Licença
[MIT](https://choosealicense.com/licenses/mit/)

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

| Função | Classe | Descrição |
| --- | --- | --- |
| `mask_cpf` | `Mask::cpf` | Aplica máscara a uma string ou número: **000.000.000-00** |
| `mask_cnpj` | `Mask::cnpj` | Aplica máscara a uma string ou número: **00.000.000/0000-00** |
| `mask_phone` | `Mask::phone` | Aplica máscara a uma string ou número: **(00) 0000-0000** - **(00) 00000-0000**  |
| `mask_cep` | `Mask::cep` | Aplica máscara a uma string ou número: **00000-000** |
| `mask_custom` | `Mask::custom` | Aplica máscara customizada a uma string ou número |

**Exemplos:**

```php
mask_cpf('12345678900'); // '123.456.789-00'
mask_cpf(12); // '000.000.000-12'
mask_cpf('cpf: 023.456.789-00'); // '023.456.789-00'
-----
mask_cnpj(12345678000190); // '12.345.678/0001-90'
-----
mask_phone('12345678901'); // '(12) 34567-8901'
mask_phone(1234567890); // '(12) 3456-7890'
mask_phone('phone: (12) 34567-8901'); // '(12) 34567-8901'
-----
mask_cep('12345678'); // '12345-678'
-----
mask_custom(12345678900, '###.###.###-##'); // '123.456.789-00'
```

### Sanitize

| Função | Classe | Descrição |
| --- | --- | --- |
| `remove_accents` | `Sanitize::removeAccents` | Remove acentos de uma string |
| `remove_special_characters` | `Sanitize::removeSpecialCharacters` | Remove todos caracteres especiais de uma string |

**Exemplos**

```php
remove_accents('áàãâä'); // 'aaaaa'
-----
remove_special_characters('abc123!@#$%&*()áàãâäéèêëíìîïóòõôöúùûüç'); // 'abc123'
```

### Validate

| Função | Classe | Descrição |
| --- | --- | --- |
| `validate_cpf` | `Validate::cpf` | Valida se a string ou int é um cpf válido |
| `validate_cnpj` | `Validate::cnpj` | Valida se a string ou int é um cnpj válido |

**Exemplos**

```php
validate_cpf(3488506037); // true
validate_cpf('034.885.060-37'); // true
validate_cpf('12345678901'); // false
-----
validate_cnpj('29.848.999/0001-05'); // true
validate_cnpj('12345678901234'); // false
```


## Contribuição
Pull requests são sempre bem-vindos. Para mudanças importantes, abra uma issue primeiro para discutir o que você gostaria de mudar.

Por favor, certifique-se de atualizar os testes conforme apropriado.

## Licença
[MIT](https://choosealicense.com/licenses/mit/)

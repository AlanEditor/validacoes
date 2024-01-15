### Objetivo

Esse repositório tem o objetivo de acrescentar classes e funções de validações de dados, como CEP, RG e Datas.

---

## Passo a Passo

### Caso queira apenas copiar os arquivos de validação

#### 1 - Clone o projeto para o seu ambiente

#### 2 - Abra os arquivos da pasta Validators (app/Http/Validators)

#### 3 - Copie os arquivos para o seu projeto Laravel. 

#### 4 - Atente-se em alterar o namespace e importar as classes dependentes.

---

### Caso queira rodar o projeto com testes:

#### 1 - Clone o projeto para o seu ambiente

#### 2 - Execute o comando `composer install` para instalar as dependências do projeto

#### 3 - Execute o comando `php artisan test`

---

#### Classes de Validação

## 1 - DateValidation.php
 
  Essa classe tem por responsabilidade validar os datas. Ela retorna `true` ou `false`, sendo true para uma data valida e false para uma data inválida. 

## 2 - DocumentValidation.php
 
  Essa classe tem por responsabilidade validar documentos. Nesse caso o RG, retornando `true` se o formado estiver correto e `false` se o formato estiver incorreto.

## 3 - LocationValidation.php
 
  Essa classe tem por responsabilidade validar o CEP, retornando `true` se o formado estiver correto e `false` se o formato estiver incorreto.

---

### Exemplo de uso:

```
$cep = '11.540-080';

$locationValidator = new LocationValidation;

$cepIsValid = $locationValidator->validateCep($cep)
```

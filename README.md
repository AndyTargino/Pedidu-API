# Pedidu API

## Instalação:

Na raiz do projeto, abra o terminal e cole o comando: `composer install`

Após, configure seu arquivo .ENV com as credenciais do seu MYSQL (E crie seu banco de dados)

Execute a migrate do seu projeto: `php artisan migrate`

Crie uma key para o seu projeto: `php artisan key:generate`

Inicie o servidor da sua aplicação: `php artisan serve`

> BASE_URL: http://127.0.0.1:8000

> OBS: Necessário PHP +7.4

> Para facilitar o uso da API, foi disponibilizado um arquivo Pedidu.postman com todos os testes já salvos para uso dentro do POSTMAN.
> 
> ![image](https://user-images.githubusercontent.com/84283346/214973064-945a8a7c-70f0-4b3b-9a30-86ca6db283cc.png)


## Exemplo de uso da aplicação


<h1 align="center">
PRODUTOS
</h1>

### Listar todos os produtos
```
GET /api/product_show
```
#### Retorno
```
{
    "products": [
        {
            "id": 7,
            "name": "Notebook",
            "category": "Eletronicos",
            "status": "ACTIVE",
            "quantity": 155,
            "created_at": "2023-01-25T23:26:47.000000Z",
            "updated_at": "2023-01-26T17:59:17.000000Z",
            "deleted_at": null
        },
        {
            "id": 10,
            "name": "Cadeira",
            "category": "Moveis",
            "status": "ACTIVE",
            "quantity": 10,
            "created_at": "2023-01-26T20:25:47.000000Z",
            "updated_at": "2023-01-26T20:25:47.000000Z",
            "deleted_at": null
        }
    ]
}
```


### Criar um produto
```
POST /api/product_create
```
```
{
    "name": "Notebook",
    "category": "Eletronicos",
    "status": "ACTIVE",
    "quantity": 155
}
```



### Deletar um produto
```
DELETE /api/product_detele
```
```
{
    "id": 1, 
}
```



### Atualizar um produto
```
POST /api/product_update
```
```
{
    "id": 1, 
    "name": "Notebook",
    "category": "Eletronicos",
    "status": "ACTIVE",
    "quantity": 155
}
```
> OBS: Não é necessário todos os campos para atualização, apenas o ID é obrigatório.



<h1 align="center">
IBGE
</h1>

### Buscar municipio
```
GET /api/ibge_search
```
```
{
    "ibge_id": 3300258, 
    "ibge_name": "Arraial do Cabo" 
}
```
#### Retorno 
```
{
    "municipios": [
        {
            "id": 1,
            "ibge_id": "3300258",
            "ibge_name": "Arraial do Cabo"
        },
    ]
}
```
> OBS: Não é necessário buscar por ibge_id ou ibge_name completo, más mantém a busca mais acertiva colocando os dois parametros corretamente.


### Listar todos cadastrados
```
GET /api/ibge_show
```
#### Retorno 
```
{
    "municipios": [
        {
            "id": 1,
            "ibge_id": "3300258",
            "ibge_name": "Arraial do Cabo"
        },
        {
            "id": 2,
            "ibge_id": "3300704",
            "ibge_name": "Cabo Frio"
        },
    ]
}
```


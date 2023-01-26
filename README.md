# Pedidu API

## Instalação:

Comando 1 `npm i whatsapp-web.js`

Comando 2 `npm i whatsapp-web.js`

Comando 3 `npm i whatsapp-web.js`

> BASE_URL: http://127.0.0.1:8000

> OBS: Necessário PHP ^7.4

> Para facilitar o uso da API, foi disponibilizado um arquivo API_Pedidu.postman com todos os testes já salvos para uso dentro do POSTMAN.
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
    "ibge_id": 3300308, 
    "ibge_name": "Barra do Piraí" 
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


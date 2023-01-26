# Pedidu API

## Installation

Comando 1 `npm i whatsapp-web.js`

Comando 2 `npm i whatsapp-web.js`

Comando 3 `npm i whatsapp-web.js`

#### BASE_URL: http://127.0.0.1:8000

#### OBS: Necessário PHP ^7.4

## Exemplo de uso da aplicação


<h1 align="center">
PRODUTOS
</h1>

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
#### OBS: Não é necessário todos os campos para atualização, apenas o ID é obrigatório.


### Listar todos os produtos
```
GET /api/product_show
```


<h1 align="center">
IBGE
</h1>

```
GET /api/ibge_show
```
```
{
    "ibge_id": 3300308, 
    "ibge_name": "Barra do Piraí" 
}
```
#### OBS: Não é necessário buscar por ibge_id ou ibge_name completo, más mantém a busca mais acertiva colocando os dois parametros corretamente.

# Pedidu API

## Installation

Comando 1 `npm i whatsapp-web.js`

Comando 2 `npm i whatsapp-web.js`

Comando 3 `npm i whatsapp-web.js`

OBS: Necessário PHP ^7.4

## Example usage


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

### Listar todos os produtos
```
GET /api/product_show
```

Take a look at [example.js](https://github.com/pedroslopez/whatsapp-web.js/blob/master/example.js) for another example with more use cases.

For more information on saving and restoring sessions, check out the available [Authentication Strategies](https://wwebjs.dev/guide/authentication.html).


## Supported features

| Feature  | Status |
| ------------- | ------------- |
| Multi Device  | ✅  |
| Send messages  | ✅  |
| Receive messages  | ✅  |
| Send media (images/audio/documents)  | ✅  |
| Send media (video)  | ✅ [(requires google chrome)](https://wwebjs.dev/guide/handling-attachments.html#caveat-for-sending-videos-and-gifs)  |
| Send stickers | ✅ |
| Receive media (images/audio/video/documents)  | ✅  |
| Send contact cards | ✅ |
| Send location | ✅ |
| Send buttons | ✅ |
| Send lists | ✅ (business accounts not supported) |
| Receive location | ✅ | 
| Message replies | ✅ |
| Join groups by invite  | ✅ |
| Get invite for group  | ✅ |
| Modify group info (subject, description)  | ✅  |
| Modify group settings (send messages, edit info)  | ✅  |
| Add group participants  | ✅  |
| Kick group participants  | ✅  |
| Promote/demote group participants | ✅ |
| Mention users | ✅ |
| Mute/unmute chats | ✅ |
| Block/unblock contacts | ✅ |
| Get contact info | ✅ |
| Get profile pictures | ✅ |
| Set user status message | ✅ |
| React to messages | ✅ |

Something missing? Make an issue and let us know!

## Contributing

Pull requests are welcome! If you see something you'd like to add, please do. For drastic changes, please open an issue first.

## Supporting the project

You can support the maintainer of this project through the links below

- [Support via GitHub Sponsors](https://github.com/sponsors/pedroslopez)
- [Support via PayPal](https://www.paypal.me/psla/)
- [Sign up for DigitalOcean](https://m.do.co/c/73f906a36ed4) and get $200 in credit when you sign up (Referral)

## Disclaimer

This project is not affiliated, associated, authorized, endorsed by, or in any way officially connected with WhatsApp or any of its subsidiaries or its affiliates. The official WhatsApp website can be found at https://whatsapp.com. "WhatsApp" as well as related names, marks, emblems and images are registered trademarks of their respective owners.

## License

Copyright 2019 Pedro S Lopez

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this project except in compliance with the License.
You may obtain a copy of the License at http://www.apache.org/licenses/LICENSE-2.0.

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.

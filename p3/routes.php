<?php

# Define the routes of your application

return [
    # Ex: The path `/` will trigger the `index` method within the `AppController`
    '/' => ['AppController', 'index'],
    '/login' => ['AppController', 'login'],
    '/logout' => ['AppController', 'logout'],
    '/item' => ['AppController', 'showItem'],
    '/pet' => ['AppController', 'showPet'],
    '/user' => ['AppController', 'showUser'],
    '/shop' => ['AppController', 'showShop'],
    '/bank' => ['AppController', 'bank'],
    '/adopt' => ['AppController', 'adopt']
];
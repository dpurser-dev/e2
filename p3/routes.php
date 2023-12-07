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
    '/place' => ['AppController', 'showPlace'],
    '/route-place' => ['AppController', 'routePlace'],
    '/route-login' => ['AppController', 'routeLogin'],
    '/bank' => ['AppController', 'bank'],
    '/adopt' => ['AppController', 'adopt']
];
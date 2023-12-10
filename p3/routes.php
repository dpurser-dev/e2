<?php

# Define the routes of your application

return [
    # Ex: The path `/` will trigger the `index` method within the `AppController`
    '/' => ['AppController', 'index'],
    '/login' => ['AppController', 'login'],
    '/logout' => ['AppController', 'logout'],
    '/store' => ['AppController', 'showStore'],
    '/bank' => ['AppController', 'showBank'],
    '/home' => ['AppController', 'showHome'],
    '/center' => ['AppController', 'showCenter'],
    '/route-place' => ['AppController', 'routePlace'],
    '/route-login' => ['AppController', 'routeLogin'],
    '/route-logout' => ['AppController', 'routeLogout'],
    '/buy' => ['AppController', 'buy'],
    '/adopt' => ['AppController', 'adopt'],
];
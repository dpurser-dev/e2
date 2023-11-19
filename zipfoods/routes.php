<?php

# Define the routes of your application

return [
    # Ex: The path `/` will trigger the `index` method within the `AppController`
    '/' => ['AppController', 'index'],
    '/contact' => ['AppController', 'contact'],
    '/test' => ['AppController', 'test'],
    '/about' => ['AppController', 'about'],
    '/products' => ['ProductsController', 'index']
];
<?php

class Catalog
{

    # Properties
    public $name1;
    public $name2 = 'Jane';
    public $names1 = ['Jane', 'Avi', 'Jamal', 'Natalia'];
    # public $names2 = file_get_contents('names.json');
    public $names2 = [];

    # Methods
    public function __construct()
    {
        $names2 = file_get_contents('names.json');
    }

}
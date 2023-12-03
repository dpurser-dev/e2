<?php

namespace App\Commands;

class AppCommand extends Command
{
    public function test()
    {
        dump('It works! You invoked your first command.');
    }

    public function migrate()
    {

        $this->app->db()->createTable('user', [
            'username' => 'varchar(255)',
            'password' => 'varchar(255)',
            'date_joined' => 'date',
            'money' => 'int'
        ]);

        $this->app->db()->createTable('item_category', [
            'name' => 'varchar(255)',
        ]);

        $this->app->db()->createTable('item', [
            'name' => 'varchar(255)',
            'category_id' => 'int',
            'image' => 'varchar(255)',
            'effect_happiness' => 'int',
            'effect_hunger' => 'int',
            'cost' => 'int'
        ]);

        $this->app->db()->createTable('item_ownership', [
            'item_id' => 'int',
            'user_id' => 'int'
        ]);

        $this->app->db()->createTable('pet', [
            'species' => 'varchar(255)',
            'image' => 'varchar(255)',
        ]);

        $this->app->db()->createTable('pet_ownership', [
            'pet_id' => 'int',
            'user_id' => 'int',
            'name' => 'varchar(255)',
            'level_happiness' => 'int',
            'level_hunger' => 'int',
            'date_fed' => 'date',
            'date_play' => 'date',
        ]);

        dump('Migration successful.');
    }

    public function seedItemCategories() {
        $categories = [
            ['name' => 'Toy'],
            ['name' => 'Food'],
            ['name' => 'Paintbrush']
        ];

        foreach ($categories as $category)
        {
            $this->app->db()->insert('item_category', $category);
        }
        dump('Seed successful.');
    }

    public function seedUser() {
        $user = [
            'username' => 'hes',
            'password' => 'helloworld',
            'date_joined' => date("Y-m-d"),
            'money' => 0
        ];
        $this->app->db()->insert('user', $user);
        dump('Seed successful.');
    }

    public function seedPets() {

    }

    public function seedItems() {

    }

}
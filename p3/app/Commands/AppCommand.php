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

        $this->app->db()->createTable('rarity', [
            'name' => 'varchar(255)',
            'likelihood' => 'int'
        ]);

        $this->app->db()->createTable('item', [
            'name' => 'varchar(255)',
            'category_id' => 'int',
            'image' => 'varchar(255)',
            'effect_happiness' => 'int',
            'effect_hunger' => 'int',
            'cost' => 'int',
            'rarity_id' => 'int'
        ]);

        $this->app->db()->createTable('item_ownership', [
            'item_id' => 'int',
            'user_id' => 'int'
        ]);

        $this->app->db()->createTable('pet', [
            'species' => 'varchar(255)',
            'image' => 'varchar(255)',
            'rarity_id' => 'int'
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
        dump('Seed item categories successful.');
    }

    public function seedUser() {
        $user = [
            'username' => 'hes',
            'password' => 'helloworld',
            'date_joined' => date("Y-m-d"),
            'money' => 100
        ];
        $this->app->db()->insert('user', $user);
        dump('Seed user successful.');
    }

    public function seedPets() {
        # Set up an empty array for pets
        $pets = array();
        # Loop 20 times to quickly populate the pet array with a new pet each time
        # Randomly generate the rarity for each pet
        for ($i = 0; $i < 20; $i++) {    
        $pets[] = [
            'species' => 'Species ' . $i,
            'image' => $i . '.png',
            'rarity_id' => rand(1, 5)
        ];
        }
        foreach ($pets as $pet)
        {
            $this->app->db()->insert('pet', $pet);
        }
        dump('Seed pets successful.');
    }

    public function seedItems() {
        $items = [
            ['name' => 'Yummy omlette',
            'category_id' => 2,
            'image' => 'o1.png',
            'effect_happiness' => 0,
            'effect_hunger' => 10,
            'cost' => 100,
            'rarity_id' => 1],
            ['name' => 'Bizarre omlette',
            'category_id' => 2,
            'image' => 'o2.png',
            'effect_happiness' => 0,
            'effect_hunger' => 10,
            'cost' => 150,
            'rarity_id' => 3],
            ['name' => 'Perfect omlette',
            'category_id' => 2,
            'image' => 'o3.png',
            'effect_happiness' => 0,
            'effect_hunger' => 50,
            'cost' => 200,
            'rarity_id' => 4],
            ['name' => 'Not-so-yummy omlette',
            'category_id' => 2,
            'image' => 'o4.png',
            'effect_happiness' => 0,
            'effect_hunger' => 2,
            'cost' => 80,
            'rarity_id' => 2],
            ['name' => 'Exciting omlette',
            'category_id' => 2,
            'image' => 'o5.png',
            'effect_happiness' => 0,
            'effect_hunger' => 50,
            'cost' => 200,
            'rarity_id' => 5],           
        ];
        foreach ($items as $item)
        {
            $this->app->db()->insert('item', $item);
        }
        dump('Seed items successful.');  
    }

    public function seedRarities() {
        # 5 rarity levels
        $rarities = [
            ['name' => 'Common',
            'likelihood' => 80],
            ['name' => 'Uncommon',
            'likelihood' => 20],
            ['name' => 'Rare',
            'likelihood' => 10],
            ['name' => 'Very Rare',
            'likelihood' => 5],
            ['name' => 'Ultra Rare',
            'likelihood' => 1]
        ];
        foreach ($rarities as $rarity)
        {
            $this->app->db()->insert('rarity', $rarity);
        }
        dump('Seed rarities successful.');    
    }

}
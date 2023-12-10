<?php
namespace App\Controllers;

use Exception;
use App\User;

class AppController extends Controller
{

    public function index()
    {
        # Check if the user is logged in   
        if (isset($_SESSION['user'])) {
            
            # Retrieve the user from the session super global
            $user = $_SESSION['user'];

            # Randomly generate the weather from a defined array of weather outcomes
            $weatherOptions = [
                'Sunny',
                'Cold',
                'Raining',
                'Overcast',
                'Hot!'
            ];
            $randomIndex  = array_rand($weatherOptions);
            $weather = $weatherOptions[$randomIndex];
            $date = date("Y-m-d");

            return $this->app->view('index', [
                'user' => $user,
                'weather' => $weather,
                'date' => $date
            ]);
        } else {
            return $this->app->redirect('/login');
        }
    }

    public function login()
    {
        return $this->app->view('login');
    }

    public function routeLogin()
    {
        # Check that the required  fields were submitted
        if (isset($_POST['username']) && isset($_POST['password'])) {

            # Store the submitted fields
            $username = $this->app->input('username');
            $password = $this->app->input('password');
            
            # Retrieve the user
            $user_db = $this->app->db()->findByColumn('user', 'username', '=', $username);

            # Return the user to the login screen if the user is not found
            if (empty($user_db)) {
                return $this->app->redirect('/login');
            } 

            # Create a new instanced of the user class, using the returned user details from the database
            $user = new User($user_db);

            # Return the user to the login screen if the password does not match
            if (!($user -> ValidateUser($password))) {
                return $this->app->redirect('/login');
            }

            # Store the user in the session
            $_SESSION['user'] = $user -> getDetails();

            return $this->app->redirect('/');

        } else {
            return $this->app->redirect('/login');
        }
    }

    public function routePlace()
    {
        $place = $this->app->input('place');

        if ($place == "store-general" || $place == "store-special") {
            return $this->app->redirect('/store?store=' . $place);
        } elseif ($place == "bank") {
            return $this->app->redirect('/bank');
        } elseif ($place == "adopt") {
            return $this->app->redirect('/center');            
        } elseif ($place == "home") {
            return $this->app->redirect('/home');
        }
    }

    public function routeLogout()
    {
        # Clear the session
        session_unset();
        session_destroy();
        session_start();

        # Send the user home (which will redirect to login)
        return $this->app->redirect('/');
    }

    public function showStore()
    {
        # Retrieve the user from the session super global
        $user = $_SESSION['user'];
        
        # Get the store from the URL parameter
        $store = $this->app->param('store');
        
        # Load in the store information
        if($store=='store-general') {
            $store_name = 'General store';
            $store_text = 'Welcome to the general store';
            $store_image = 'store_general';
            $item_type = 'Food';
            $item_number = rand(1,10);
        } elseif($store == 'store-special') {
            $store_name = 'Special store';
            $store_text = 'Welcome to the special store';
            $store_image = 'store_special';
            $item_type = 'Paintbrush';
            $item_number = rand(1,5);
        }

        # Generate the items
        $items = array();
        
        # Get the rarities
        $sql = 'SELECT name FROM rarity';
        $executed = $this->app->db()->run($sql);
        $rarity = $executed->fetchAll();

        # Get the item rarity likelihoods
        $sql = 'SELECT rarity.likelihood, item.id AS item_id
        FROM rarity
        JOIN item ON rarity.id = item.rarity_id
        JOIN item_category ON item.category_id = item_category.id
        WHERE item_category.name = "' . $item_type . '"';
        #WHERE item_category.name = ' . $item_type;
        $executed = $this->app->db()->run($sql);
        $item_likelihoods = $executed->fetchAll();

        # Sum all of the likelihoods
        $all_likelihoods = 0;
        foreach($item_likelihoods as $item_likelihood) {
            $all_likelihoods  += $item_likelihood['likelihood'];
        };

        # Roll dice to determine what items are generated, according to their likelihoods
        for ($i = 0; $i < $item_number; $i++) {
            $seed = rand(1, $all_likelihoods);
            $rolling_likelihood = 0;
            foreach($item_likelihoods as $item_likelihood) {
                $rolling_likelihood  += $item_likelihood['likelihood'];
                if($seed <= $rolling_likelihood) {
                    $items[] = $item_likelihood['item_id'];
                    break;
                }
            }
        }

        $inventory = array();
        foreach($items as $item) {
            $inventory[] = $this->app->db()->findById('item', $item);
        }

        return $this->app->view('store', [
            'user' => $user,
            'store' => $store,
            'store_name' => $store_name,
            'store_text' => $store_text,
            'store_image' => $store_image,
            'inventory' => $inventory,
            'rarity' => $rarity
        ]);
    }

    public function showBank() {
        # Retrieve the user from the session super global
        $user = $_SESSION['user'];
        $place_name = 'TecheMono Bank';
        $place_text = 'Welcome to our most esteemed financial institution';
        $place_image = 'bank';
        return $this->app->view('bank', [
            'user' => $user,
            'place_name' => $place_name,
            'place_text' => $place_text,
            'place_image' => $place_image,
        ]);
    }

    public function showCenter() {
        # Retrieve the user from the session super global
        $user = $_SESSION['user'];
        $place_name = 'Adoption Center';
        $place_text = 'Welcome to our adoption center';
        $place_image = 'adopt';

        $pet_number = rand(1,3);

        # Get the rarities
        $sql = 'SELECT name FROM rarity';
        $executed = $this->app->db()->run($sql);
        $rarity = $executed->fetchAll();

        # Get the pet rarity likelihoods
        $sql = 'SELECT rarity.likelihood, pet.id AS pet_id
        FROM rarity
        JOIN pet ON rarity.id = pet.rarity_id';
        $executed = $this->app->db()->run($sql);
        $pet_likelihoods = $executed->fetchAll();

        # Sum all of the likelihoods
        $all_likelihoods = 0;
        foreach($pet_likelihoods as $pet_likelihood) {
            $all_likelihoods  += $pet_likelihood['likelihood'];
        };

        $pets = array();

        # Roll dice to determine what items are generated, according to their likelihoods
        for ($i = 0; $i < $pet_number; $i++) {
            $seed = rand(1, $all_likelihoods);
            $rolling_likelihood = 0;
            foreach($pet_likelihoods as $pet_likelihood) {
                $rolling_likelihood  += $pet_likelihood['likelihood'];
                if($seed <= $rolling_likelihood) {
                    $pets[] = $pet_likelihood['pet_id'];
                    break;
                }
            }
        }

        $inventory = array();
        foreach($pets as $pet) {
            $inventory[] = $this->app->db()->findById('pet', $pet);
        };
        
        return $this->app->view('center', [
            'user' => $user,
            'place_name' => $place_name,
            'place_text' => $place_text,
            'place_image' => $place_image,
            'inventory' => $inventory,
            'rarity' => $rarity
        ]);
    }
    
    public function buy() {
        
        $item_id = $this->app->input('id');
        $item_cost = $this->app->input('cost');

        # Retrieve the user from the session super global
        $user = $_SESSION['user'];

        # Check if the user has enough money to complete the transaction
        if($user['money'] >= $item_cost) {
    
            # Add ownership
            $data = [
                'item_id' => $item_id,
                'username' => $user['username'],
            ];
            $this->app->db()->insert('item_ownership', $data);

            # Calculate the new money balance
            $money = $user['money'] - $item_cost;
            
            # Update money
            $sql = 'UPDATE user
            SET money = '. $money . '
            WHERE username = "' . $user['username'] . '"';
            $this->app->db()->run($sql);
            
            # Update user in session
            $user_db = $this->app->db()->findByColumn('user', 'username', '=', $user['username']);
            $user = new User($user_db);
            $_SESSION['user'] = $user -> getDetails();
            
            # Send the user home (which will redirect to login)
            return $this->app->redirect('/');
        } else {
            return $this->app->redirect('/');
        }
    }

    public function adopt() {

        $pet_id = $this->app->input('id');

        # Retrieve the user from the session super global
        $user = $_SESSION['user'];

        # SQL statement with named parameters
        $sql = 'SELECT * FROM pet_ownership WHERE username = "' . $user['username'] . '"';
        $executed = $this->app->db()->run($sql);
        $pet_ownership = $executed->fetchAll();

        if(!$pet_ownership) {
            # Add ownership
            $data = [
                'pet_id' => $pet_id,
                'username' => $user['username'],
                'name' => "Test",
                'level_happiness' => 0,
                'level_hunger' => 0,
                'date_fed' => date("Y-m-d"),
                'date_play' => date("Y-m-d")
            ];
            $this->app->db()->insert('pet_ownership', $data);
            return $this->app->redirect('/home');
        } else {
            return $this->app->redirect('/center');
        }
    }

    public function showHome() {

        # Retrieve the user from the session super global
        $user = $_SESSION['user'];

        # Get the pet ownership
        $sql = 'SELECT * FROM pet_ownership WHERE username = "' . $user['username'] . '"';
        $executed = $this->app->db()->run($sql);
        $pet_ownership = $executed->fetchAll();

        # Get the pet
        $sql = 'SELECT * FROM pet WHERE id = "' . $pet_ownership[0]['pet_id'] . '"';
        $executed = $this->app->db()->run($sql);
        $pet = $executed->fetchAll();

        # Get the item ownership
        $sql = 'SELECT * FROM item_ownership WHERE username = "' . $user['username'] . '"';
        $executed = $this->app->db()->run($sql);
        $item_ownerships = $executed->fetchAll();

        $items = array();
        foreach($item_ownerships as $item_ownership) {
            $sql = 'SELECT * FROM item WHERE id = "' . $item_ownership['item_id'] . '"';
            $executed = $this->app->db()->run($sql);
            $item = $executed->fetchAll();
            $items[] = $item;
        }

        # Retrieve the user from the session super global
        $place_name = 'Home';
        $place_text = 'Welcome to your home!';
        $place_image = 'home';

        # Get the rarities
        $sql = 'SELECT name FROM rarity';
        $executed = $this->app->db()->run($sql);
        $rarity = $executed->fetchAll();
        
        return $this->app->view('home', [
            'place_name' => $place_name,
            'place_text' => $place_text,
            'place_image' => $place_image,
            'user' => $user,
            'pet' => $pet,
            'pet_ownership' => $pet_ownership,
            'items' => $items,
            'rarity' => $rarity
        ]);

    }

    }
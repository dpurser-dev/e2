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
        } elseif ($place == "adoption") {
            return $this->app->redirect('/adoption');
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
        } elseif($store == 'store-special') {
            $store_name = 'Special store';
            $store_text = 'Welcome to the special store';
            $store_image = 'store_special';
        }

        # Generate the items
        $items = array();
        $item_number = 5;

        $sql = 'SELECT rarity_id FROM item';
        $executed = $this->app->db()->run($sql);
        $executed = $executed->fetchAll();
        $rarity_ids = array();
        foreach($executed as $item) {
            $rarity_ids[] = $item["rarity_id"];
        }
        $rarity_ids2 = array();
        $rarity_ids2 = ["rarity_id" => $rarity_ids];
        dump($rarity_ids2);

        $sql = 'SELECT likelihood FROM rarity WHERE id = :rarity_id';
        $executed = $this->app->db()->run($sql, $rarity_ids2);
        $likelihoods = $executed->fetchAll();
        #$likelihoods = array();
        #foreach($executed as $item) {
        #    $likelihoods = $item[0];
        #}        
        dump($likelihoods);
        
        for ($i = 0; $i < $item_number; $i++) {
            $items = $i;
        }

        return $this->app->view('store', [
            'user' => $user,
            'store' => $store,
            'store_name' => $store_name,
            'store_text' => $store_text,
            'store_image' => $store_image,
            'items' => 10,
        ]);
    }
    
}
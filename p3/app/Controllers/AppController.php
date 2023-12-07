<?php
namespace App\Controllers;

use Exception;
use App\User;

class AppController extends Controller
{

    public function index()
    {
        ################################
        # Check if the user is logged in   

        if (isset($_SESSION['user'])) {            
            $user = $_SESSION['user'];
            return $this->app->view('index', [
                'user' => $user
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
        return $this->app->redirect('/place?place=' . $place);
    }

    public function showPlace()
    {
        $place = $this->app->param('place');
        
        if($place=='adopt') {
            $place_name = 'Adoption centre';
            $place_text = 'Welcome to the adoption centre';
            $place_image = 'tm-place-adopt';
        }

        #return $this->app->db()->all('p3');

        return $this->app->view('place', [
            'place' => $place,
            'place_name' => $place_name,
            'place_text' => $place_text,
            'place_image' => $place_image
        ]);
    }
    
}
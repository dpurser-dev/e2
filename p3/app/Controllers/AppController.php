<?php
namespace App\Controllers;

class AppController extends Controller
{
    public function index()
    {
        # Check if the user is logged in       
        return $this->app->view('index');
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
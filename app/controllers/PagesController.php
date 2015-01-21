<?php

class PagesController extends BaseController {

	public function home()
	{
		return View::make('pages.home');
	}
    
    public function about()
    {
        return View::make('pages.about');
    }
    
    public function login() 
    {
        return View::make('forms.users.connexion');
    }
    
    public function doLogin() {
        // test si l'email est correct
        //$this->loginForm->validate(Input::only('email', 'password'));
        // Si on arrive à se connecter
        if(Auth::attempt(Input::only('email', 'password'))) {
            // On va vers la page 'tasks'
            return Redirect::intended('home');
        // Si on ne peut pas se connecter
        }else{
            // On retourne vers la page d'accueil avec un message d'erreur
            return Redirect::back()->withInput()->with('message', 'On dirait que vous avez oublié votre identifiant ...');
        }
    }
    
    public function events()
    {
        return View::make('pages.event');
    }

}

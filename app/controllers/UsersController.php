<?php

class UsersController extends BaseController {
    
    public function register()
    {
        return View::make('forms.users.register');
    }

    public function store() {
        $data = Input::all(); // Récupère les données entrées par l'user dans le formulaire
        
        $rules = [
            'email' => 'required|email|unique:users',
        ];

        // Validation
        $validator = Validator::make($data, $rules);

        if($validator->passes()) {
            $user = new User;

            $user->name = Input::get('name');
            $user->firstname = Input::get('firstname');
            $user->company = Input::get('company');
            $user->phone = Input::get('phone');
            $user->fax = Input::get('fax');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->newsletter = Input::get('newsletter');
            $user->save();

            return Redirect::to('/login')->withMessage('Bravo ! Vous êtes enregistré ! :-)');
        }else {
            return Redirect::to('/')->withError($validator);   
        }
    }
}
<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'cpf' => 'required|string|max:14', 
            'idade' => 'required|integer|min:18',
            'status' => 'required|boolean',
            'role' => 'required|string|in:admin,user',
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([


            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'idade'=> $input['idade'],
            'status' =>$input['status'],
            'cpf'=>$input['cpf'],
            'role' => $input['role'],

            // dd($input['role'])

        ])->redirect('/');
       
    }

    
}

<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'civil_status' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'present_address' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6|same:confirm_password',
            'confirm_password' => 'required',
            'terms_and_condition' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        // Create User record for the member
        $user = User::create([
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'type' => 'member'
        ]);

        // Persist Member's Information
        $member = $user->member()->create([
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'last_name' => $data['last_name'],
            'civil_status' => $data['civil_status'],
            'birthday' => $data['birthday'],
            'mobile_number' => $data['mobile_number'],
            'gender' => $data['gender'],
            'present_address' => $data['present_address'],
            'permanent_address' => $data['permanent_address'],
            'tax_identification_number' => $data['tax_identification_number'],
            'employer' => $data['employer'],
            'employer_address' => $data['employer_address'],
            'position' => $data['position'],
            'department' => $data['department'],
            'employment_date' => $data['employment_date'],
            'salary' => $data['salary'],
            'other_source_of_income' => $data['other_source_of_income'],
            'number_of_dependents' => $data['number_of_dependents'],
        ]);

        // Persist Membership Application
        $member->membershipApplication()->create([]);

        return $user;
    }
}

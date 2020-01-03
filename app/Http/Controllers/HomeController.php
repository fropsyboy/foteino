<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }

    public function profile()
    {
        return view('profile');
    }

    public function profiles($id)
    {
        $profileData = $this->getProfileData($id);

        $data = [
            'profile' => $profileData,
        ];

        if($profileData->credentials== null){
           return view('user.profile2', $data);
        }

        return view('user.profile', $data);
    }

    public function applicants()
    {
        $user = User::where('type',0)->orderby('id','desc')->paginate(12);

        $data = [
            'applicants' => $user,
        ];

        return view('user.index', $data);
    }

    public function companies()
    {
        $companies = User::where('type',1)->orderby('id','desc')->paginate(9);

        $data = [
            'companies' => $companies,
        ];

        return view('user.companies', $data);
    }

    public function getProfileData($id)
    {
        $result = User::with('credentials')->where('id', $id)->first();

        return $result;
    }

    public function jobs()
    {
        // $user = User::where('type',0)->orderby('id','desc')->paginate(12);

        // $data = [
        //     'applicants' => $user,
        // ];

        return view('user.jobs');
    }
}

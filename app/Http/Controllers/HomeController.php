<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
Use Alert;
use App\Job;

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
        $jobs = Job::with('company')->orderby('id','desc')->paginate(10);

        $data = [
            'jobs' => $jobs,
        ];

        return view('user.jobs',$data);
    }

    public function addJob(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'location' => 'required',
            'type' => 'required',
            'experience' => 'required',
            'salary' => 'required',
            'needed' => 'required',
            'start' => 'required',
            'end' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            $message = $validator->errors();
             return $message;
        }
        $user = auth()->user();

        $job = new Job([
            'user_id' => $user->id,
            'title' => $request->title,
            'location' => $request->location,
            'type' => $request->type,
            'experience' => $request->experience,
            'salary' => $request->salary,
            'needed' => $request->needed,
            'start' => $request->start,
            'end' => $request->end,
            'description' => $request->description,
        ]);
        $job->save();
        Alert::success('Success', 'Your Job has been successfully created');

        return back();
    }

    public function job_status($id, $status)
    {
        try {
            $update = "active";
            if($status == "active"){
                $update = "in-active";
            }
            Job::where('id', $id)->update([
                'status' => $update
                    ]);
            
            
            Alert::success('Success', 'Your Job has been successfully created');

            return back();
        }catch(Exception $e) {
             $message =  $e->getMessage();
             Alert::error('Error', $message);

             return back();
          }

    }

    public function job_profile($id, $company)
    {
        
        $profile = User::find($company);

        $job = Job::find($id);

        $data = [
            'job' => $job,
            'profile' => $profile
        ];
        return view('user.job_profile',$data);
    }

    public function application($id)
    {
        
        $applicant = [];

        $job = Job::find($id);

        $data = [
            'job' => $job,
            'applicant' => $applicant
        ];
        return view('user.applicants',$data);
    }

    public function applications()
    {
        
        $applicant = [];


        $data = [
            'applicant' => $applicant
        ];
        return view('user.applications',$data);
    }
}

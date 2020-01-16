<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
Use Alert;
use App\Job;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Hash;
use App\Application;

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
        $user = auth()->user();
        
        if($user->type == 1){
            

            $applications = Job::with('cleanCompany')->where('user_id', $user->id)->orderby('id','desc')->paginate(10);
            $applicationsCount = Job::where('user_id', $user->id)->orderby('id','desc')->count();

            $applicants = Application::with('user', 'job')->where('user_id', $user->id)->orderby('id','desc')->paginate(10);
            $applicantsCount = Application::where('user_id', $user->id)->orderby('id','desc')->count();

            $applicantsApproved = Application::where('user_id', $user->id)->where('status', 'active')->orderby('id','desc')->count();
            $applicantsPending = Application::where('user_id', $user->id)->where('status', 'disable')->orderby('id','desc')->count();

            $data = [
                'applications' => $applications,
                'applicationsCount' => $applicationsCount,
                'applicants' => $applicants,
                'applicantsCount' => $applicantsCount,
                'pending' => $applicantsPending,
                'approved' => $applicantsApproved,
            ];


            return view('dashboard2', $data);
        }else{

            $applications = Job::orderby('id','desc')->paginate(10);
            $applicationsCount = Job::count();

            $applicants = Application::with('user', 'job')->orderby('id','desc')->paginate(10);
            $applicantsCount = Application::count();

            $user = User::where('type', 0 )->orderby('id','desc')->count();

            $companies = User::where('type', 1 )->orderby('id','desc')->count();

            $data = [
                'applications' => $applications,
                'applicationsCount' => $applicationsCount,
                'applicants' => $applicants,
                'applicantsCount' => $applicantsCount,
                'user' => $user,
                'companies' => $companies,
            ];


            return view('dashboard', $data);

        }
        
    }



    public function profile()
    {
        return view('profile');
    }

    public function profiles($id)
    {
        $profileData = $this->getProfileData($id);

        $getType = User::find($id);

        $data = [
            'profile' => $profileData,
        ];

        if($getType->type == 1){
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

    public function jobsC()
    {
        $user = auth()->user();

        $jobs = Job::with('company')->where('user_id', $user->id)->orderby('id','desc')->paginate(10);

        $data = [
            'jobs' => $jobs,
        ];

        return view('user.jobsC',$data);
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
        
        $job = Job::find($id);
        
        $applicant = Application::with('job','user')->where('job_id', $id)->get();


        $data = [
            'job' => $job,
            'applicant' => $applicant
        ];
        return view('user.applicants',$data);
    }

    public function applications()
    {
        $user = auth()->user();

        $applicant = Application::with('user', 'job')->orderby('id','desc')->get();


        $data = [
            'applicant' => $applicant
        ];
        return view('user.applications',$data);
    }

    public function admins()
    {
        
        $admins = User::select('id', 'name','username', 'email', 'phone', 'created_at')->where('type',2)->get();


        $data = [
            'admins' => $admins
        ];
        return view('user.admin',$data);
    }

    public function addAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'phone' => 'required',
            'username' => 'required|string|unique:users',
            'password' => 'required',
            'cpassword' => 'required|same:password'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $admin = new User([
            'type' => 2,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'username' => $request->username,
            'password' => bcrypt($request->password)
        ]);
        $admin->save();
        $admin->attachRole(5);

        Alert::success('Success', 'Admin Successfully Added');
        
        return back();
    }

    public function getOneapplication($job_id)
    {
        try {
            $job = Application::with('user', 'job')->where('job_id', $job_id)->orderby('id','desc')->paginate(10);

            $data = [
                'job' => $job,
            ];

            return response()->json(['jobs' => $job], 200);

        }catch (\Exception $e) {
            $message =  $e->getMessage();
             Alert::error('Error', $message);
        }
    }

    public function applicant_status($id, $status)
    {
        try {
            $update = "active";
            if($status == "active"){
                $update = "disable";
            }
            Application::where('id', $id)->update([
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

}

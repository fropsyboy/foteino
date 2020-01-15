<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Credential;
use App\Job;

class AuthController extends Controller
{
    //
        /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'full_name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'username' => 'required|string|unique:users',
            'phone' => 'required',
            'password' => 'required|string',
            'cpassword' => 'required|same:password'

        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $user = new User([
            'type' => $request->type,
            'name' => $request->full_name,
            'phone' => $request->phone,
            'phone2' => $request->phone2,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $user->save();
        $user->attachRole(1);

        $credential = new Credential([
            'user_id' => $user->id,
        ]);
        $credential->save();
        return response()->json([
            'message' => 'Successfully created User Account'
        ]);
    }


    public function user_details($id)
    {
        $user= User::where('id',$id)->first();

        return response()->json([
            'user' => $user
        ]);
    }
  
    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $credentials = request(['email', 'password']);

        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'access' => $user->type,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }
  
    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
  
    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        $user = auth()->user();

        $credentials = Credential::where('user_id', $user->id)->first();

        $data = [
            'name' => $user->name,
            'gender' => $user->gender,
            'dob' => $user->dob,
            'phone' => $user->phone,
            'phone2' => $user->name,
            'country' => $user->phone2,
            'state' => $user->dob,
            'username' => $user->username,
            'facebook' => $user->facebook,
            'twitter' => $user->twitter,
            'linkd' => $user->linkd,
            'insta' => $user->insta,
            'email' => $user->email,
            'staff_size' => $user->staff_size,
            'sector' => $user->sector,
            'industry' => $user->industry,
            'years' => $user->years,
            'qualification' => $credentials->qualification,
            'examing_body' => $user->examing_body,
            'subjects' => unserialize($user->subjects),
            'o_level_passed' => $user->o_level_passed,
            'skills' => $user->skills,
            'training_courses' => $user->training_courses,
            'career_path' => $credentials->career_path,
            'degree' => unserialize($user->degree),
            'employment' => unserialize($user->employment),
            
        ];
        return response()->json($data);
    }

    public function signupCompany(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'company_name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'country' => 'required',
            'state' => 'required',
            'staff_size' => 'required',
            'sector' => 'required',
            'industry' => 'required',
            'years' => 'required',
            'contact_person1' => 'required',
            'contact_person2' => 'required',
            'username' => 'required|string|unique:users',
            'password' => 'required|string',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $user = new User([
            'name' => $request->company_name,
            'type' => '1',
            'phone' => $request->phone,
            'country' => $request->country,
            'state' => $request->state,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'staff_size' => $request->staff_size,
            'sector' => $request->sector,
            'industry' => $request->industry,
            'years' => $request->years,
            'contact_person1' => serialize($request->contact_person1),
            'contact_person2' => serialize($request->contact_person2),
            'description' => $request->description,
            'cac_number' => $request->cac_number,
        ]);
        $user->save();
        $user->attachRole(2);
        return response()->json([
            'message' => 'Successfully created Company Account'
        ]);
    }

    public function updateProfile(Request $request)
    {

        $user = auth()->user();

    try {

            User::where('id', $user->id)->update([
                'name' => $request->name,
                'gender' => $request->gender,
                'dob' => $request->dob,
                'phone' => $request->phone,
                'phone2' => $request->phone2,
                'country' => $request->country,
                'state' => $request->state,
                'username' => $request->username,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkd' => $request->linkd,
                'insta' => $request->insta,
                'staff_size' => $request->staff_size,
                'sector' => $request->sector,
                'industry' => $request->industry,
                'years' => $request->years,
            ]);

            Credential::where('user_id', $user->id)->update([
                'qualification' => $request->qualification,
                'examing_body' => $request->examing_body,
                'subjects' => serialize($request->subjects),
                'o_level_passed' => $request->o_level_passed,
                'skills' => $request->skills,
                'training_courses' => $request->training_courses,
                'career_path' => $request->career_path,
                'degree' => serialize($request->degree),
                'employment' => serialize($request->employment),
            ]);

            return response()->json(['success' => 'Details Successfully Updated'], 200);

        }catch (\Exception $e) {
            return response()->json(['error' => $e], 401);
        }
    }

    public function jobs()
    {
        $jobs = Job::with('cleanCompany')->orderby('id','desc')->get();

        $data = [
            'jobs' => $jobs,
        ];

        return response()->json(['jobs' => $jobs], 200);
    }
}

<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Credential;

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
            'first_name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'username' => 'required|string|unique:users',
            'password' => 'required|string',

        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $user = new User([
            'name' => $request->first_name,
            'm_name' => $request->middle_name,
            'l_name' => $request->last_name,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'phone' => $request->phone,
            'phone2' => $request->whatsapp,
            'country' => $request->country,
            'state' => $request->state,
            'username' => $request->username,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkd' => $request->linkd,
            'insta' => $request->insta,
            'others' => $request->others,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $user->save();

        $credential = new Credential([
            'user_id' => $user->id,
            'qualification' => $request->qualification,
            'examing_body' => $request->examing_body,
            'subjects' => serialize($request->subjects),
            'o_level_passed' => $request->o_level_passed,
            'skills' => $request->skills,
            'training_courses' => $request->training_courses,
            'degree' => serialize($request->degree),
            'employment' => serialize($request->employment),
            'hobbies' => $request->hobbies,
            'career_path' => $request->career_path,
            'change_career' => $request->change_career,
            'change_reason' => $request->change_reason,
            'guide' => $request->guide,
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
        return response()->json($request->user());
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
        return response()->json([
            'message' => 'Successfully created Company Account'
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserController extends Controller
{

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $temenmariobangsad = $request->only('email', 'password');
        // console.log("",$credentials);
        if (Auth::attempt($temenmariobangsad)) {
            // $user = Auth::user();
            // // console.log("USER",$user);
            // $token = $user->createToken('uas_project')->accessToken;


              // Find the user by username
        $user = User::where('email', $request->input('email'))->first();

        if (!$user) {
            return response()->json(['message' => 'Invalid credentials.'], 401);
        }

        // Check the password
        if (!Hash::check($request->input('password'), $user->password)) {
            return response()->json(['message' => 'Invalid credentials.'], 401);
        }

        // Return the user data
        return response()->json($user, 200);
        } else {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }
    }
    
    public function getUsers()
    {
        $users = User::all();
        return response()->json($users);
    }


    public function registration(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',  
            'confirm_password' => 'required|string|min:6',
            'phone' => 'required|string|min:6',    
        ]);

        // Create the user
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'confirm_password' => bcrypt($validatedData['confirm_password']),
            'phone' => ($validatedData['phone']),
        ]);

        // Return a response
        return response()->json(['user' => $user, 'message' => 'User created successfully'], 201);
    }

    public function transfer(Request $request,$id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'rekening_tujuan' => 'required|string|max:255',
            'nominal' => 'required|string|max:255',
            'password' => 'required|string|min:4',  
        ]);

        
        $user = User::find($id);

        
        // $user = User::where('email', $request->input('email'))->first();
        // Check the password
        if (!Hash::check($request->input('password'), $user->password)) {
            return response()->json(['message' => 'Invalid credentials.'], 401);
        }


        // Return a response
        return response()->json(['user' => $user, 'message' => 'transfer successfully'], 201);
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255|unique:users,email,'.$id,
            'password' => 'sometimes|string|min:8',
            'phone' => 'sometimes|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Find the user by ID
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Update user details
        if ($request->has('name')) {
            $user->name = $request->input('name');
        }
        if ($request->has('email')) {
            $user->email = $request->input('email');
        }
        if ($request->has('password')) {
            $user->password = bcrypt($request->input('password'));
        } 
        if ($request->has('phone')) {
            $user->phone = $request->input('phone');
        }
        

        // Save the updated user data
        $user->save();

        return response()->json(['message' => 'User updated successfully', 'user' => $user], 200);
    }
}

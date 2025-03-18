<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $data = User::all();
            return response() -> json([
                'status' => 'success',
                'message' => 'Data Retrive Successfully',
                'data' => $data

            ],200);
        }catch(\Exception $e){
            \Log::error('Error in UserController@index: ' . $e->getMessage());
            return response()-> json([
                'status' => 'error',
                'message' => 'Failed to Retrive Data',
                'data error' => $e
            ],500);
        }
    }

    public function showId($id){
        try{
            $data = User::find($id);
            return response()-> json([
                'status' => 'success',
                'message' => 'Data Retrive Successfully',
                'data' => $data
            ],200);
        }catch(\Exception $e){
            return response()-> json([
                'status' => 'error',
                'message' => 'Failed to Retrive Data',
                'data error' => $e
            ],500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:users,name',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string'
        ]);

        $user = user::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'User Created Successfully',
            'data' => $user
        ],200);
    }

    public function login(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('name',$request->name)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid Credentials'
            ],401);
        }

        $token = $user->createToken('token')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'message' => 'User Logged In Successfully',
            'token' => $token,
            'data' => $user->name,
            'id' => $user->id
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */


public function update(Request $request, $id)
{
    try {
        // Log request masuk
        Log::info("Update Request Received", ['data' => $request->all(), 'id' => $id]);

       $request->validate([
            'name' => 'required|string|unique:users,name,' . $id,
            'email' => 'required|string|unique:users,email,' . $id,
            'password' => 'required|string'
        ]);

        Log::info("Validation Passed", ['validated' => $request]);

        $user = User::find($id);
        if (!$user) {
            Log::error("User Not Found", ['id' => $id]);
            return response()->json([
                'status' => 'error',
                'message' => 'User not found'
            ], 404);
        }

        Log::info("User Found", ['user' => $user]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        Log::info("User Updated Successfully", ['user' => $user]);

        return response()->json([
            'status' => 'success',
            'message' => 'User Updated Successfully',
            'data' => $user
        ]);
    } catch (\Exception $e) {
        Log::error("Update Failed", ['error' => $e->getMessage()]);

        return response()->json([
            'status' => 'error',
            'message' => 'Failed to Update User',
            'data error' => $e->getMessage()
        ], 500);
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{

            // Cek apakah user ditemukan sebelum delet

        $user = User::find($id);
        if(!$user){
            return response()->json([
                'status' => 'error',
                'message' => 'User Not Found'
            ],404);
        }

        $user->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'User Deleted Successfully'
            ],200);
        }catch(\Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to Delete User',
                'data error' => $e
            ],500);
        }
    }
}

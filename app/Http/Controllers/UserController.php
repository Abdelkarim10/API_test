<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Certification;
use App\Models\User;
use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterUserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

 public function index()
{
    $users = User::all();

    return response()->json(['users' => $users], 200);
}
    



public function register(Request $request): JsonResponse
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'gender' => 'required|in:Male,Female',
        'blood_type' => 'required|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $user = User::create($request->all());

    return response()->json(['user' => $user], 201);
}




 public function updateUser(Request $request, User $user)
{
    $user->update(['is_approved' => $request->input('is_approved')]);

    return response()->json(['message' => 'User approval status updated successfully.']);
}



public function updateOwnProfile(Request $request, $id)
{ 
    
    $validatedData = $request->validate([
        'name' => 'string|max:255',
        'email' => 'string|email|max:255|unique:users,email',
        'gender' => 'in:Male,Female',
        'blood_type' => 'in:A+,A-,B+,B-,AB+,AB-,O+,O-',
    ]);
    $user =User::findOrFail($id);
    $user->update($validatedData);
    return response()->json(['message' => 'Profile updated successfully']);
}
    


public function addCertificate(Request $request)
{
    $certificate = Certification::firstOrCreate(['name' => $request->name]);
    $user = $request->user();
    $user->certifications()->attach($certificate->id);
    
    return response()->json(['message' => 'Certificate added successfully']);
}

    
    
    
public function removeCertificate($certificateId)
{
    $certificate = Certification::findOrFail($certificateId);
    $certificate->delete();

    return response()->json(['message' => 'Certificate removed successfully']);
}



}
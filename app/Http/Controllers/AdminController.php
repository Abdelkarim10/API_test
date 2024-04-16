<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certification;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;



class AdminController extends Controller
{

    public function getCertifications()
    {   
        $certifications = Certification::all();
        return response()->json(['certifications' => $certifications], 200);
    }
    
    public function createCertification(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:certifications|max:255',
        ], [
            'name.required' => 'The certification name is required.',
            'name.unique' => 'The certification name must be unique.',
            'name.max' => 'The certification name may not be greater than 255 characters.',
        ]);

        $certification = Certification::create($request->only('name'));

        return response()->json(['message' => 'Certification created successfully', 'certification' => $certification], 201);
    }

    public function updateCertification(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:certifications,name,' . $id,
        ]);
        $certification = Certification::findOrFail($id);
        $certification->update($request->only('name'));
    
        return response()->json(['message' => 'Certification updated successfully', 'certification' => $certification]);
    }
    public function deleteCertification($id)
    {
        $certification = Certification::findOrFail($id);
        $certification->delete();

        return response()->json(['message' => 'Certification deleted successfully']);
    }

    public function approveUser($id)
    {
        $user = User::findOrFail($id);
        $user->update(['is_approved' => true]);

        return response()->json(['message' => 'User approved successfully', 'user' => $user]);
    }

    public function exportReports()
    {
        $certifications = Certification::withCount('users')->get();
        
        $pdf = Pdf::loadView('admin.certifications.pdf', ['certifications' => $certifications]);
        $filename = 'certifications_report_' . date('YmdHis') . '.pdf';
     
        return $pdf->download($filename);
    }
}
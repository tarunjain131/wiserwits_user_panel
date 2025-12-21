<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentAcademicSession;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StudentProfileController extends Controller
{
    public function edit()
    {
        $student = Auth::guard('student')->user();
        $studentAcadmicDetails = StudentAcademicSession::with('class','section')->where('student_id',$student->id)->first();
        $studentSubscription = Student::where('id',$student->id)->with('studentSubscription.plan')->first();

        return view('pages.profile', compact('student','studentAcadmicDetails','studentSubscription'));
    }

   public function update(Request $request)
{
    $student = Auth::guard('student')->user();

    $request->validate([
        'first_name'        => 'required|string|max:255',
        'middle_name'       => 'nullable|string|max:255',
        'last_name'         => 'required|string|max:255',
        'gender'            => 'nullable|in:Male,Female,Other',
        'date_of_birth'     => 'nullable|date',

        'email'             => 'required|email|unique:students,email,' . $student->id,
        'phone'             => 'nullable|string|max:20',
        'alternate_phone'   => 'nullable|string|max:20',

        'address'           => 'nullable|string|max:255',
        'city'              => 'nullable|string|max:255',
        'state'             => 'nullable|string|max:255',
        'country'           => 'nullable|string|max:255',
        'postal_code'       => 'nullable|string|max:20',

        'father_name'       => 'nullable|string|max:255',
        'mother_name'       => 'nullable|string|max:255',

        'guardian_name'     => 'nullable|string|max:255',
        'guardian_phone'    => 'nullable|string|max:20',
        'guardian_email'    => 'nullable|email|max:255',

        'profile_image'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Handle Profile Image
    if ($request->hasFile('profile_image')) {

        if ($student->profile_image) {
            Storage::disk('public')->delete($student->profile_image);
        }

        $path = $request->file('profile_image')->store('students', 'public');
        $student->profile_image = $path;
    }

    // Update remaining fields
    $student->update($request->except('profile_image'));

    return redirect()->back()->with('success', 'Profile updated successfully');
}

    public function uploadImage(Request $request)
    {
        $student = Auth::guard('student')->user();

        $request->validate([
            'profile_image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($student->profile_image) {
            Storage::disk('public')->delete($student->profile_image);
        }

        $path = $request->file('profile_image')->store('students', 'public');

        $student->update([
            'profile_image' => $path
        ]);

        return response()->json([
            'status' => true,
            'success' => 'Profile Image Update successfully',
            'path' => asset('storage/'.$path)
        ]);
    }

}

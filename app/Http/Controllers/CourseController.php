<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Student,StudentSubscription,Course,Plan,Assignment,Feature};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function enrolledCourses(){
        $student_id = Auth::guard('student')->id();
        $student = Student::where('id',$student_id)->with('studentSubscription.plan')->first();
        $courses = isset($student->studentSubscription) ? $student->studentSubscription->plan->course_list : [];
        return view('pages.courses', compact('courses'));
    }

    public function courseCatalog(){
        $courses = Course::get();
        $plans = Plan::get();
        return view('pages.courseCatalog', compact('courses','plans'));
    }

    public function languageCourse(){
        $courses = Course::where('type_of_course','language')->get();
        return view('pages.languageCourses', compact('courses'));
    }


    

}

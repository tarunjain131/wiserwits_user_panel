<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentChangeTiming;
use App\Models\User;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth;

class ClassChangeController extends Controller
{
    /**
     * List all requests
     */
    public function index()
    {
        $classChanges = StudentChangeTiming::with(['teacher','course'])
            ->where('student_id', Auth::id())
            ->latest()
            ->get();

        $subscriptionPlanId = \DB::table('student_subscriptions')->where('student_id',Auth::id())->pluck('plan_id');
        // dd($subscriptionPlanId);
       $plan = Plan::whereIn('id',$subscriptionPlanId)->get();
       
        return view('pages.Class_change_query', [
            'classChanges' => $classChanges,
            'teachers'     => User::where('role_id', 5)->get(),
            'plans'        => $plan ?? [],
        ]);
    }

    /**
     * Store new request
     */
    public function store(Request $request)
    {
        $request->validate([
            'teacher_id'             => 'required|exists:users,id',
            'course_id'              => 'required|exists:plans,id',
            'student_request_time'   => 'required',
            'scheduled_time'         => 'required',
            'description'            => 'nullable|string',
        ]);

        StudentChangeTiming::create([
            'student_id'           => Auth::id(),
            'consultant_id'        => Auth::id(), // OR assign later
            'teacher_id'           => $request->teacher_id,
            'course_id'            => $request->course_id,
            'student_request_time' => $request->student_request_time,
            'scheduled_time'       => $request->scheduled_time,
            'description'          => $request->description,
            'status'               => 'pending',
        ]);

        return redirect()->back()->with('success', 'Class change request submitted');
    }

    /**
     * Update request
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'student_request_time' => 'required|date',
            'scheduled_time'       => 'required|date|after:student_request_time',
            'description'          => 'nullable|string',
        ]);

        $change = StudentChangeTiming::where('id', $id)
            ->where('student_id', Auth::id())
            ->firstOrFail();

        $change->update($request->only([
            'student_request_time',
            'scheduled_time',
            'description'
        ]));

        return redirect()->back()->with('success', 'Request updated');
    }

    /**
     * Delete request
     */
    public function destroy($id)
    {
        StudentChangeTiming::where('id', $id)
            ->where('student_id', Auth::id())
            ->delete();

        return redirect()->back()->with('success', 'Request deleted');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        return view('pages.profile');
    }
    public function dashboard(){
        return view('pages.dashboard');
    }

    public function courses(){
        return view('pages.courses');
    }

    public function quiz(){
        $student = Auth::guard('student')->user();
       $quiz = Assignment::where('status', 'active')
                ->where('student_id', $student->id)
                ->orderByRaw("
                    CASE 
                        WHEN deadline < NOW() THEN 2      -- expired → last
                        WHEN assignment_status = 'pending' THEN 1
                        ELSE 0
                    END
                ")
                ->orderBy('deadline', 'ASC')  // nearest deadline first
                ->get();

        return view('pages.quiz',compact('quiz'));
    }

    public function teacherFeedback(){
        $teacher_feedbacks = DB::table('teacher_feedbacks')->get();
        return view('pages.teacherFeedback',compact('teacher_feedbacks'));
    }

    public function updateStatus(Request $request)
    {
        Assignment::where('id', $request->id)
            ->update([
                'assignment_status' => $request->status
            ]);

        return response()->json(['success' => true]);
    }

    public function classRoomReport(Request $request)
    {
       $studentId = Auth::guard('student')->id();
       $classRoomReport = DB::table('exam_report_cards')
            ->where('student_id', $studentId)
            ->orderBy('exam_date', 'DESC')
            ->get();
       return view('pages.classRoomReport',compact('classRoomReport'));
    }

    public function performance()
    {
        return view('pages.performance');
    }

   public function performanceData(Request $request)
{
    $studentId = auth()->id();          // logged-in student
    $type = $request->type ?? 'monthly'; // weekly | monthly | yearly

    $query = DB::table('student_data_performances as sdp')
        ->join('questionnaires as q', 'q.id', '=', 'sdp.questionnaires_id')
        ->where('q.student_id', $studentId);
    // dd($query);
    // 🔹 Date filters
    if ($type === 'weekly') {
        $query->whereBetween('sdp.created_at', [
            now()->startOfWeek(),
            now()->endOfWeek()
        ]);
    }

    if ($type === 'monthly') {
        $query->whereMonth('sdp.created_at', now()->month)
              ->whereYear('sdp.created_at', now()->year);
    }

    if ($type === 'yearly') {
        $query->whereYear('sdp.created_at', now()->year);
    }

    // 🔹 Date-wise average data (for Chart.js)
      $data = $query->selectRaw("
        DATE(sdp.created_at) as date,

        AVG(sdp.academic_performance) as academic_performance,
        AVG(sdp.competition) as competition,
        AVG(sdp.consistency) as consistency,
        AVG(sdp.test_preparedness) as test_preparedness,
        AVG(sdp.class_engagement) as class_engagement,
        AVG(sdp.subject_understanding) as subject_understanding,
        AVG(sdp.homework) as homework,
        AVG(sdp.grasping_ability) as grasping_ability,
        AVG(sdp.retention_power) as retention_power,
        AVG(sdp.conceptual_clarity) as conceptual_clarity,
        AVG(sdp.attention_span) as attention_span,
        AVG(sdp.learning_speed) as learning_speed,
        AVG(sdp.peer_interaction) as peer_interaction,
        AVG(sdp.discipline) as discipline,
        AVG(sdp.respect_for_authority) as respect_for_authority,
        AVG(sdp.motivation_level) as motivation_level,
        AVG(sdp.response_to_feedback) as response_to_feedback,
        AVG(sdp.stamina) as stamina,
        AVG(sdp.participation_in_sports) as participation_in_sports,
        AVG(sdp.teamwork_in_games) as teamwork_in_games,
        AVG(sdp.fitness_level) as fitness_level,
        AVG(sdp.interest_in_activities) as interest_in_activities,
        AVG(sdp.initiative_in_projects) as initiative_in_projects,
        AVG(sdp.curiosity_level) as curiosity_level,
        AVG(sdp.problem_solving) as problem_solving,
        AVG(sdp.extra_curricular) as extra_curricular,
        AVG(sdp.idea_generation) as idea_generation,
        AVG(sdp.maths) as maths,
        AVG(sdp.science) as science,
        AVG(sdp.english) as english
    ")
    ->groupBy('date')
    ->orderBy('date')
    ->get();

    return response()->json($data);
}

 public function labReport(){
    return view('pages.bmiChart');
 }

  public function BMIData(){
    $student = Auth::guard('student')->user(); // get currently logged-in student

    if (!$student) {
        return response()->json(['error' => 'Student not authenticated'], 401);
    }

    $heightInMeters = $student->height / 100;
    $bmi = $student->weight / ($heightInMeters * $heightInMeters);

    $studentData = [
        'name' => $student->first_name . ' ' . $student->last_name,
        'height' => $student->height,
        'weight' => $student->weight,
        'bmi' => round($bmi, 2),
    ];

    return response()->json($studentData);
}
}

<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'language' => 'required|string',
        ]);

        $course = Course::create([
            'title' => $request->title,
            'language' => $request->language,
            'user_id' => auth()->id(),
            'status' => 'Borrador',
            'price' => 0.00
        ]);

        return redirect()->route('courses.edit', $course->id);
    }

    public function edit(Course $course) {
        
        $course->load('sections.lessons'); 
        return view('instructor.edit-course', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
    
    $request->validate([
        'title' => 'required|string|max:255',
        'summary' => 'nullable|string',
        'level' => 'nullable|string',
        'learning_outcomes' => 'nullable|array',
        'requirements' => 'nullable|array',
    ]);

    
    $course->update([
        'title' => $request->title,
        'summary' => $request->summary,
        'level' => $request->level,
        'learning_outcomes' => $request->learning_outcomes,
        'requirements' => $request->requirements,
    ]);

    
    return redirect()->route('instructor.admin')->with('success', 'Curso actualizado correctamente');
    }

    public function destroy(Course $course)
    {
        if ($course->user_id === auth()->id()) {
            $course->delete();
        }
        return redirect()->route('instructor.admin');
    }

    public function curriculum(Course $course)
    {
        
        if ($course->user_id !== auth()->id()) {
            abort(403);
        }

        return view('instructor.curriculum', compact('course'));
    }

    public function updateLesson(Request $request, Lesson $lesson) {
    $request->validate([
        'video' => 'nullable|mimes:mp4,mov,mkv|max:5120000', // 5GB
        'material' => 'nullable|file|max:2048', // 2MB
    ]);

    if ($request->hasFile('video')) {
        $path = $request->file('video')->store('videos', 'public');
        $lesson->video_path = $path;
    }

    if ($request->hasFile('material')) {
        $path = $request->file('material')->store('materials', 'public');
        $lesson->material_path = $path;
    }

    $lesson->title = $request->title;
    $lesson->save();

    return response()->json(['message' => 'Guardado con éxito']);
    }

    public function guardarPlan(Request $request, Course $course)
    {
    $data = $request->all();

    if (!isset($data['secciones'])) {
        return response()->json(['error' => 'No hay datos'], 400);
    }

    foreach ($course->sections as $section) {
        $section->lessons()->delete();
    }

    $course->sections()->delete();

    foreach ($data['secciones'] as $sIndex => $seccion) {

        $section = \App\Models\Section::create([
            'title' => $seccion['titulo'],
            'order' => $sIndex,
            'course_id' => $course->id
        ]);

        foreach ($seccion['conferencias'] as $cIndex => $conf) {

            \App\Models\Lesson::create([
                'title' => $conf['titulo'],
                'is_published' => $conf['publica'],
                'order' => $cIndex,
                'section_id' => $section->id
            ]);
        }
    }

    return response()->json([
        'success' => true
    ]);
    }

    public function show(Course $course)
    {
        
        $course->load(['teacher', 'sections.lessons', 'category']);
        
        $course->students_count = $course->students()->count();

        return view('courses.show', compact('course'));
    }

    public function enroll(Course $course)
    {
    
        if (auth()->user()->isEnrolledIn($course)) {
            return redirect()->route('courses.learn', $course);
        }

        
        return redirect()->route('courses.payment', $course);
    }

    public function index()
    {
        
        $courses = \App\Models\Course::all(); 

        return view('catalogo', compact('courses'));
    }

    public function payment(Course $course) {
        return view('courses.payment', compact('course'));
    }

    
    public function checkout(Course $course) {
        return view('courses.checkout', compact('course'));
    }

    
    public function processPayment(Course $course) {
        
        auth()->user()->courses_enrolled()->attach($course->id);

    
        return view('courses.payment_success', compact('course'));
    }

    
    public function success(Course $course)
    {
        $course->load('teacher');
        return view('courses.payment_success', compact('course'));
    }
    }
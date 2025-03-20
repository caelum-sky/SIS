<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', ['studentList' => $students]);
    }

    public function create() {}
    public function store(StoreStudentRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make('password');
        Student::create($validated);
        return redirect('students')->with('success', 'Student added Successfully');
    }
    public function show(Student $student)
    {
        dd($student->all());
    }
    public function edit(Student $student) {}

    public function update(UpdateStudentRequest $request, Student $student)
    {
        $validated = $request->validated();
        $student->update($validated);
        return redirect()->back()->with('success', 'Student updated successfully!');
    }
    public function destroy(Student $student)
    {
        if (Enrollment::where("student_id", $student->id)->exists()) {
            return redirect('students')->with('error', 'Student is currently enrolled and cannot be deleted!');
        }
        $student->delete();
        return redirect('students')->with('success', 'Student Deleted Successfully');
    }
}

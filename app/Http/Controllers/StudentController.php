<?php

namespace App\Http\Controllers;

use App\Models\DegreeProgram;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    private $student, $degree_program;

    public function __construct(Student $student, DegreeProgram $degree_program)
    {
        $this->student = $student;
        $this->degree_program = $degree_program;
    }

    public function index(Request $request)
    {
        try {
            if ($request->isMethod('post')) {
                // Handle POST request logic here
                // For example, process form data or filters
            }

            // For GET request, return the students view
            $student_list = $this->student->getStudents();
            return view('students.manage_students', compact('student_list'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function create(Request $request)
    {
        try {
            if ($request->isMethod('post')) {
                // Validate and store the new student data


                $validatedData = $request->validate([
                    'email' => 'required|email|unique:students,email',
                    'name' => 'required|string|max:255',
                    'phone' => 'required|string|max:20',
                    'father_name' => 'required|string|max:255',
                    'father_contact' => 'required|string|max:20',
                    'father_occupation' => 'required|string|max:255',
                    'emergency_contact' => 'required|string|max:20',
                    'address' => 'required|string|max:500',
                    // Add other validation rules as needed
                ]);

                $form_collect = $request->all();

                $this->student->create($validatedData);

                return redirect()->route('students')->with('success', 'Student created successfully.');
            }

            // For GET request, return the create student view
            $degree_programs = $this->degree_program->getDegreePrograms(); // Fetch degree programs if needed for the form
            return view('students.modals.create_student', compact('degree_programs'))->render();
        } catch (\Exception $e) {
            parent::setResponse(false, 'An error occurred: ' . $e->getMessage());
        }
        return parent::getResponse();
    }
}

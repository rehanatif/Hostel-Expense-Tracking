<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\DegreeProgram;
use App\Models\Student;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Exception;

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
                return $this->getDatatable($request);
            }

            // For GET request, return the students view
            $student_list = $this->student->getStudents();
            return view('students.manage_students', compact('student_list'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function getDatatable($request, $condition = [], $only_trashed = false)
    {
        try {
            $student_list = $this->student->getStudentsForYajra($condition, $only_trashed);

            $count = $request->start;

            $value = $request->search['value'];

            return DataTables::of($student_list)
                ->filterColumn('name', function ($query, $value) {
                    $query->where('name', 'LIKE', '%' . $value . '%');
                })
                ->filterColumn('email', function ($query, $value) {
                    $query->where('email', 'LIKE', '%' . $value . '%');
                })
                ->filterColumn('phone', function ($query, $value) {
                    $query->where('phone', 'LIKE', '%' . $value . '%');
                })
                ->filterColumn('father_name', function ($query, $value) {
                    $query->where('father_name', 'LIKE', '%' . $value . '%');
                })
                ->filterColumn('father_contact', function ($query, $value) {
                    $query->where('father_contact', 'LIKE', '%' . $value . '%');
                })
                ->filterColumn('emergency_contact', function ($query, $value) {
                    $query->where('emergency_contact', 'LIKE', '%' . $value . '%');
                })
                ->filterColumn('address', function ($query, $value) {
                    $query->where('address', 'LIKE', '%' . $value . '%');
                })
                ->filterColumn('status', function ($query, $value) {
                    $query->where('status', 'LIKE', '%' . $value . '%');
                })
                ->filterColumn('referred_by', function ($query, $value) {
                    $query->whereHas('referredBy', function ($q) use ($value) {
                        $q->where('name', 'LIKE', '%' . $value . '%');
                    });
                })

                ->addColumn('count', function ($rows) use (&$count) {
                    return ++$count;
                })
                ->addColumn('student', function ($rows) {
                    return view('students.datatable_columns.student_column', ['rows' => $rows])->render();
                })
                ->addColumn('father', function ($rows) {
                    return view('students.datatable_columns.father_column', ['rows' => $rows])->render();
                })

                ->addColumn('address', function ($rows) {
                    return $rows->address;
                })
                ->addColumn('referred_by', function ($rows) {
                    return $rows->referredBy ? $rows->referredBy->name : 'N/A';
                })
                ->addColumn('status', function ($rows) {
                    return view('students.datatable_columns.status_column', ['rows' => $rows])->render();
                })
                ->addColumn('action', function ($rows) use ($request) {
                    return view('students.actions.student_action', ['rows' => $rows])->render();
                })
                ->rawColumns(['student', 'father', 'address', 'referred_by', 'status', 'action', 'count'])
                ->make(true);
        } catch (Exception $e) {
            parent::setResponse(false, $e->getMessage());
        }

        return parent::getResponse();
    }

    public function create(StudentRequest $request)
    {
        try {
            if ($request->isMethod('post')) {

                $form_collect = $request->all();

                if ($this->student->create($form_collect)) {
                    parent::setResponse(true, 'Student created successfully.');
                } else {
                    parent::setResponse(false, 'Failed to create student.');
                }
            } else {

                // For GET request, return the create student view
                $degree_programs = $this->degree_program->getDegreePrograms(); // Fetch degree programs if needed for the form
                return view('students.modals.create_student', compact('degree_programs'))->render();
            }
        } catch (Exception $e) {
            parent::setResponse(false, 'An error occurred: ' . $e->getMessage(), $e->getMessage());
        }
        return parent::getResponse();
    }

    public function update(Request $request)
    {
        try {
            if ($request->isMethod('post')) {

                $form_collect = $request->all();

                if ($this->student->updateStudent($request->id, $form_collect)) {
                    parent::setResponse(true, 'Student updated successfully.');
                } else {
                    parent::setResponse(false, 'Failed to update student.');
                }
            } else {

                // For GET request, return the edit student view
                $student = $this->student->find($request->id);
                $degree_programs = $this->degree_program->getDegreePrograms(); // Fetch degree programs if needed for the form
                return view('students.modals.edit_student', compact('student', 'degree_programs'))->render();
            }
        } catch (Exception $e) {
            parent::setResponse(false, 'An error occurred: ' . $e->getMessage(), $e->getMessage());
        }
        return parent::getResponse();
    }

    public function change_status(Request $request)
    {
        try {
            $student = $this->student->find($request->id);
            if (!$student) {
                parent::setResponse(false, 'Student not found.');
                return parent::getResponse();
            }

            $student->status = $student->status != 'Active' ? 'Active' : 'Inactive';

            $student->save();

            parent::setResponse(true, 'Student status updated successfully.');
        } catch (Exception $e) {
            parent::setResponse(false, 'An error occurred: ' . $e->getMessage(), $e->getMessage());
        }
        return parent::getResponse();
    }
}

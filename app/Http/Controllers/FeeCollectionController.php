<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Transaction;
use Illuminate\Http\Request;

class FeeCollectionController extends Controller
{
    protected $fee_collection, $student;

    public function __construct(Transaction $fee_collection, Student $student)
    {
        $this->fee_collection = $fee_collection;
        $this->student = $student;
    }
    public function index(Request $request)
    {
        // Handle both GET and POST requests for fee collections
        if ($request->isMethod('post')) {
            // Process POST request logic here
            return response()->json(['message' => 'Fee collection data processed.']);
        }

        // For GET request, return the fee collections view
        return view('fee_collections.manage_fee_collections');
    }

    public function create(Request $request)
    {
        // Handle both GET and POST requests for creating fee collections
        if ($request->isMethod('post')) {
            // Process POST request logic here
            return response()->json(['message' => 'Fee collection created successfully.']);
        }

        // For GET request, return the create fee collection view
        $students = $this->student->getStudents();
        return view('fee_collections.modals.create_fee_collection', compact('students'))->render();
    }

    public function list(Request $request)
    {
        // Handle both GET and POST requests for listing fee collections
        if ($request->isMethod('post')) {
            // Process POST request logic here
            return response()->json(['data' => []]); // Replace with actual data
        }

        // For GET request, return the list fee collections view
        return view('fee_collections.list_fee_collections');
    }
}

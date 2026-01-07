<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Transaction;
use EH;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Exception;


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
            return $this->getFeeCollectionsDatatable($request);
        }

        // For GET request, return the fee collections view
        return view('fee_collections.manage_fee_collections');
    }

    public function getFeeCollectionsDatatable($request, $condition = [], $only_trashed = false)
    {
        try {
            $fee_collections = $this->fee_collection->getFeeCollectionsForYajra($condition, $only_trashed);

            $count = $request->start;

            $value = $request->search['value'];

            return DataTables::of($fee_collections)
                ->filterColumn('created_by_name', function ($query, $value) {
                    $query->where('created_by_name', 'LIKE', '%' . $value . '%');
                })
                ->filterColumn('category', function ($query, $value) {
                    $query->where('category', 'LIKE', '%' . $value . '%');
                })
                ->filterColumn('amount', function ($query, $value) {
                    $query->where('amount', 'LIKE', '%' . $value . '%');
                })
                ->filterColumn('transaction_date', function ($query, $value) {
                    $query->where('transaction_date', 'LIKE', '%' . $value . '%');
                })
                ->filterColumn('remarks', function ($query, $value) {
                    $query->where('remarks', 'LIKE', '%' . $value . '%');
                })
                ->filterColumn('student_name', function ($query, $value) {
                    $query->where('student_name', 'LIKE', '%' . $value . '%');
                })

                ->addColumn('count', function ($rows) use (&$count) {
                    return ++$count;
                })
                ->addColumn('created_by', function ($rows) {
                    return $rows->created_by_name;
                })
                ->addColumn('category', function ($rows) {
                    return $rows->category_name;
                })

                ->addColumn('amount', function ($rows) {
                    return $rows->amount;
                })
                ->addColumn('transaction_date', function ($rows) {
                    return EH::dateFormat($rows->transaction_date);
                })
                ->addColumn('remarks', function ($rows) {
                    return $rows->remarks;
                })
                ->addColumn('student_name', function ($rows) {
                    return $rows->student_name;
                })
                ->addColumn('action', function ($rows) use ($request) {
                    return view('fee_collections.actions.fee_collection_action', ['rows' => $rows])->render();
                })
                ->rawColumns(['student_name', 'remarks', 'transaction_date', 'amount', 'created_by', 'category', 'action', 'count'])
                ->make(true);
        } catch (Exception $e) {
            parent::setResponse(false, $e->getMessage());
        }

        return parent::getResponse();
    }

    public function create(Request $request)
    {
        // Handle both GET and POST requests for creating fee collections
        if ($request->isMethod('post')) {
            // Process POST request logic here
            $form_collect = $request->input();
            $have_received_on_current_month = $this->fee_collection->haveFeeReceivedOnCurrentMonth($form_collect);

            if (isset($have_received_on_current_month->id)) {
                parent::setResponse(false, 'Fee collection already exists for this student in the current month.');
                return parent::getResponse();
            }
            $fee_collection = $this->fee_collection->createFeeCollection($form_collect);

            if (isset($fee_collection->id)) {
                parent::setResponse(true, 'Fee collection created successfully.');
            } else {
                parent::setResponse(false, 'Failed to create fee collection.');
            }

            return parent::getResponse();
        }

        // For GET request, return the create fee collection view
        $students = $this->student->getStudents();
        return view('fee_collections.modals.create_fee_collection', compact('students'))->render();
    }

    public function update(Request $request)
    {
        $fee_collection = $this->fee_collection->find($request->id);
        if (!$fee_collection) {
            parent::setResponse(false, 'Fee collection not found.');
            return parent::getResponse();
        }

        if ($request->isMethod('post')) {
            // Process POST request logic here
            $form_collect = $request->input();

            $fee_collection = $this->fee_collection->updateFeeCollection($form_collect);

            if (isset($fee_collection->id)) {
                parent::setResponse(true, 'Fee collection updated successfully.');
            } else {
                parent::setResponse(false, 'Failed to update fee collection.');
            }

            return parent::getResponse();
        }

        $students = $this->student->getStudents();
        return view('fee_collections.modals.update_fee_collection', compact('students', 'fee_collection'))->render();
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

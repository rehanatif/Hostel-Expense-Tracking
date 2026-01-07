<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Transaction;
use EH;
use Exception;

class ExpenseController extends Controller
{
    protected $expense, $category;

    public function __construct(Transaction $expense, Category $category)
    {
        $this->expense = $expense;
        $this->category = $category;
    }
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            return $this->getExpensesDatatable($request);
        }

        return view('expenses.manage_expenses');
    }

    public function getExpensesDatatable($request, $condition = [], $only_trashed = false)
    {
        try {
            $expenses = $this->expense->getExpensesForYajra($condition, $only_trashed);

            $count = $request->start;

            $value = $request->search['value'];

            return DataTables::of($expenses)
                ->filterColumn('created_by_name', function ($query, $value) {
                    $query->where('created_by_name', 'LIKE', '%' . $value . '%');
                })
                ->filterColumn('category_name', function ($query, $value) {
                    $query->where('category_name', 'LIKE', '%' . $value . '%');
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
                ->filterColumn('updated_by_name', function ($query, $value) {
                    $query->where('updated_by_name', 'LIKE', '%' . $value . '%');
                })

                ->addColumn('count', function ($rows) use (&$count) {
                    return ++$count;
                })
                ->addColumn('created_by', function ($rows) {
                    return $rows->created_by_name;
                })
                ->addColumn('category_name', function ($rows) {
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
                ->addColumn('updated_by_name', function ($rows) {
                    return $rows->updated_by_name;
                })
                ->addColumn('action', function ($rows) use ($request) {
                    return view('expenses.actions.expense_action', ['rows' => $rows])->render();
                })
                ->rawColumns(['updated_by_name', 'remarks', 'transaction_date', 'amount', 'created_by', 'category_name', 'action', 'count'])
                ->make(true);
        } catch (Exception $e) {
            parent::setResponse(false, $e->getMessage());
        }

        return parent::getResponse();
    }

    public function create(Request $request)
    {
        // Handle both GET and POST requests for creating Expenses
        if ($request->isMethod('post')) {
            // Process POST request logic here
            $form_collect = $request->input();

            $expense = $this->expense->createExpense($form_collect);

            if (isset($expense->id)) {
                parent::setResponse(true, 'Expense created successfully.');
            } else {
                parent::setResponse(false, 'Failed to create Expense.');
            }

            return parent::getResponse();
        }

        // For GET request, return the create Expense view
        $categories = $this->category->getCategories();
        return view('expenses.modals.create_expense', compact('categories'))->render();
    }

    public function update(Request $request)
    {
        $expense = $this->expense->find($request->id);
        if (!$expense) {
            parent::setResponse(false, 'Expense not found.');
            return parent::getResponse();
        }

        if ($request->isMethod('post')) {
            // Process POST request logic here
            $form_collect = $request->input();

            $expense = $this->expense->updateExpense($form_collect);

            if (isset($expense->id)) {
                parent::setResponse(true, 'Expense updated successfully.');
            } else {
                parent::setResponse(false, 'Failed to update Expense.');
            }

            return parent::getResponse();
        }

        $categories = $this->category->getCategories();
        return view('expenses.modals.update_expense', compact('categories', 'expense'))->render();
    }
}

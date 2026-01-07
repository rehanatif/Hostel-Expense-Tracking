<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    protected $fillable = [
        'student_id',
        'amount',
        'transaction_date',
        'description',
        'created_by',
        'student_id',
        'approved_by',
        'category_id',
        'remarks',
        'update_remarks',
        'updated_by',
    ];

    public function getFeeCollectionsForYajra()
    {
        return self::select('transactions.*', 'students.name as student_name', 'users.name as created_by_name', 'categories.name as category_name')
            ->leftJoin('students', 'transactions.student_id', '=', 'students.id')
            ->leftJoin('users', 'transactions.created_by', '=', 'users.id')
            ->leftJoin('categories', 'transactions.category_id', '=', 'categories.id');
    }

    public function getExpensesForYajra()
    {
        return self::select('transactions.*', 'users.name as created_by_name', 'categories.name as category_name', 'users2.name as updated_by_name')
            ->leftJoin('users', 'transactions.created_by', '=', 'users.id')
            ->leftJoin('categories', 'transactions.category_id', '=', 'categories.id')
            ->leftJoin('users as users2', 'transactions.updated_by', '=', 'users2.id')
            ->where('transactions.category_id', '!=', 2);
    }

    public function haveFeeReceivedOnCurrentMonth($object)
    {
        $current_month = $object['transaction_date'] ? date('m', strtotime($object['transaction_date'])) : date('m');
        $current_year = $object['transaction_date'] ? date('Y', strtotime($object['transaction_date'])) : date('Y');

        return self::where('student_id', $object['student_id'])
            ->whereMonth('transaction_date', $current_month)
            ->whereYear('transaction_date', $current_year)
            ->first();
    }

    public function createFeeCollection($object)
    {
        return DB::Transaction(function () use ($object) {
            return self::create([
                'student_id' => $object['student_id'],
                'amount' => $object['amount'],
                'transaction_date' => $object['transaction_date'],
                'remarks' => $object['remarks'],
                'created_by' => Auth::user()->id,
                'category_id' => 2,
                'remarks' => $object['remarks'],
            ]);
        });
    }

    public function updateFeeCollection($object)
    {
        return DB::Transaction(function () use ($object) {
            $fee_collection = self::find($object['id']);
            if ($fee_collection) {
                $fee_collection->update([
                    'student_id' => $object['student_id'],
                    'amount' => $object['amount'],
                    'transaction_date' => $object['transaction_date'],
                    'remarks' => $object['remarks'],
                ]);
            }
            return $fee_collection;
        });
    }

    // EXPENSES FUNCTIONS

    public function createExpense($object)
    {
        return DB::Transaction(function () use ($object) {
            return self::create([
                'amount' => $object['amount'],
                'transaction_date' => $object['transaction_date'],
                'remarks' => $object['remarks'],
                'created_by' => Auth::user()->id,
                'category_id' => $object['category_id'],
                'remarks' => $object['remarks'],
            ]);
        });
    }

    public function updateExpense($object)
    {
        return DB::Transaction(function () use ($object) {
            $fee_collection = self::find($object['id']);
            if ($fee_collection) {
                $fee_collection->update([
                    'amount' => $object['amount'],
                    'transaction_date' => $object['transaction_date'],
                    'remarks' => $object['remarks'],
                    'category_id' => $object['category_id'],
                    'updated_by' => Auth::user()->id,
                ]);
            }
            return $fee_collection;
        });
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}

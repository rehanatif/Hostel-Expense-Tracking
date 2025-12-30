<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = [
        'name',
        'email',
        'cnic',
        'phone',
        'father_name',
        'father_contact',
        'father_occupation',
        'emergency_contact',
        'address',
        'degree_program_id',
        'referred_by',
        // Add other fillable fields as necessary
    ];

    public function getStudentsForYajra($condition, $only_trashed)
    {
        $query = Student::where($condition);


        if ($only_trashed) {
            $query->onlyTrashed();
        }

        return $query->with('referredBy');
    }

    public function getStudents($conditions = [])
    {
        return DB::transaction(function () use ($conditions) {
            $query = $this->query();

            foreach ($conditions as $column => $value) {
                $query->where($column, $value);
            }

            return $query->get();
        });
    }

    public function create($object)
    {
        return DB::transaction(function () use ($object) {
            $this->fill($object);
            $this->save();
            return $this;
        });
    }

    public function updateStudent($id, $object)
    {
        return DB::transaction(function () use ($id, $object) {
            $student = $this->find($id);
            $student->fill($object);
            $student->save();
            return $student;
        });
    }

    public function referredBy()
    {
        return $this->belongsTo(User::class, 'referred_by');
    }
}

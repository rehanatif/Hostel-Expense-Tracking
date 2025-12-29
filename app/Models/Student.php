<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'date_of_birth',
        'enrollment_number',
        // Add other fillable fields as necessary
    ];

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
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DegreeProgram extends Model
{
    protected $table = 'degree_programs';

    protected $fillable = [
        'name',
        'description',
        // Add other fillable fields as necessary
    ];
    public function getDegreePrograms($conditions = [])
    {
        return DB::transaction(function () use ($conditions) {
            $query = $this->query();

            foreach ($conditions as $column => $value) {
                $query->where($column, $value);
            }

            return with($query->get());
        });
    }
}

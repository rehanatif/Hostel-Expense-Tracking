<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function getCategories($status = 'Active')
    {
        return self::where('status', $status)->get();
    }
}

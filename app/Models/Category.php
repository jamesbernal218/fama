<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    public function scopeSearching($query)
    {
        $search = request()->search;
        if (!$search)
            return $query;

        return $query->where('name', "like", "%" . $search . "%");
    }
}

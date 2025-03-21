<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
    protected $table = 'medicines';
    protected $fillable = [
        'name',
        'price',
        'category_id',
        'supplier_id',
    ];
    public function scopeSearching($query)
    {
        $search = request()->search;
        if (!$search)
            return $query;

        return $query->where('name', "like", "%" . $search . "%");
    }
}

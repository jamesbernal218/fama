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

    protected $appends = ['supplier_name', 'category_name'];

    public function scopeSearching($query)
    {
        $search = request()->search;
        if (!$search)
            return $query;

        return $query->where('name', "like", "%" . $search . "%");
    }

    public function proveedor()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id')->withDefault();
    }

    public function categoria()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id')->withDefault();
    }

    // Accessor para incluir el nombre del proveedor en la respuesta
    public function getSupplierNameAttribute()
    {
        return $this->proveedor->name;
    }

    // Accessor para incluir el nombre de la categoría en la respuesta
    public function getCategoryNameAttribute()
    {
        return $this->categoria->name;
    }
}

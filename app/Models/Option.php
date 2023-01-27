<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public $timestamps = false;

    public function properties() 
    {
        return $this->hasMany(Property::class);
    }

    public function values()
    {
        return $this->hasMany(AttributeValue::class)
            ->orderBy('sort_order');
    }
}

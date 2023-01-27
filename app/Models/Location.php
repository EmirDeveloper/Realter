<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
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

    public function parent() // whereNull('parent_id');
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function child() // whereNotNull('parent_id')
    {
        return $this->hasMany(self::class, 'parent_id')
            ->orderBy('id', 'desc')
            ->orderBy('name_tm');
    }
}

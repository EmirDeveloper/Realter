<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected static function booted()
    {
        static::saving(function ($obj) 
        {
            $obj->slug = str()->slug($obj->name_tm).'-'.str()->random(3);
        });
    }

    public function customers() 
    {
        return $this->belongsTo(Customer::class);
    }

    public function locations() 
    {
        return $this->belongsTo(Location::class);
    }

    public function property_types() 
    {
        return $this->belongsTo(PropertyType::class);
    }

    public function attributeValues()
    {
        return $this->belongsToMany(AttributeValue::class, 'property_attribute_values')
            ->orderBy('property_attribute_values.sort_order');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function option() 
    {
        return $this->belongsTo(Option::class);
    }

    public function attribute() 
    {
        return $this->belongsTo(Attribute::class);
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class, 'property_attribute_value')
            ->orderBy('id', 'desc');
    }

    public $timestamps = false;
    
    public function getName()
    {
        if (app()->getLocale() == 'en') {
            return $this->name_en ?: $this->name_tm;
        } else {
            return $this->name_tm;
        }
    }
}

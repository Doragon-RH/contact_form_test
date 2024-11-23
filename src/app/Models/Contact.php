<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'category_id',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'detail',
    ];

    public function scopeCategorySearch($query, $category)
    {
        if (!empty($category)) {
            return $query->where('category_id', $category);
        }
    }
    public function scopeGenderSearch($query, $gender)
    {
        if (!empty($gender)) {
            return $query->where('gender', $gender);
        }
    }
    public function scopeNameSearch($query, $name)
    {
        if (!empty($name)) {
            return $query->where('first_name', 'like', '%' . $name . '%')
                ->orWhere('last_name', 'like', '%' . $name . '%');
        }
    }
    public function scopeDaySearch($query, $day)
    {
        if (!empty($day)) {
            return $query->where('created_at', 'like', '%' . $day . '%');
        }
    }

}

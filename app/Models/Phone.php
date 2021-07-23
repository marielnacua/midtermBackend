<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone_name',
        'description',
        'ram',
        'battery',
        'price',
        'acquired_on'
    ];

    public function container() {
        return $this->belongsTo('App\Models\Phone');
    }
}

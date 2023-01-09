<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];
    public function product()
    {
        return $this->belongsTo('App\Models\product');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}

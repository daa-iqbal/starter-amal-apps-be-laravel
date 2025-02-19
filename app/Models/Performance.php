<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Performance extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function percentages()
    {
        return $this->hasMany(Percentage::class);
    }
}

<?php

namespace App\Models;

use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    use SoftDeletes, Uuid;

    protected $casts = [
        'id' => 'string'
    ];
    protected $fillable = ['name','description','is_active'];
    protected $date = ['deleted_at'];



}

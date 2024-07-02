<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $fillable = [
        'name_services','branch_id'
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class funnel extends Model
{
    use HasFactory;

    protected $table = 'funnel';
    protected $fillable = [
        'name',
    ];

    public $timestamps = false;

    public function contacts()
    {
        return $this->hasMany(contact::class, 'funnel_id');
    }
}

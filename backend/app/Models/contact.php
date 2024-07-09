<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    use HasFactory;

    protected $table = 'contact';
    protected $fillable = [
        'name',
        'funnel_id',
        'stage',
        'email',
        'phoneNumber',
        'dateOfBirth',
        'address',
        'buyValue',
    ];

    public $timestamps = false;

    public function funnel(){
        return $this->belongsTo(Funnel::class, 'funnel_id');
    }
}

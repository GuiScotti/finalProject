<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;
    
    public function funnel()
    {
        return $this->belongsTo(Funnel::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}

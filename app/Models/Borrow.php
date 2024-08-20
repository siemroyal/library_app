<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Borrow extends Model
{
    use HasFactory;
    public function students():HasMany{
        return $this->hasMany(Student::class,"student_id","id");
    }

    
}

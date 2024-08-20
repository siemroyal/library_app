<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BookType extends Model
{
    use HasFactory;
    protected $table = "book_types";
    protected $fillable = ["id","book_type_name","description"];

    public function getBookTypeNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function setBookTypeNameAttribute($value)
    {
        $this->attributes['book_type_name'] = strtolower($value);
    }
    //Dynamic properties
    public function books():HasMany{
        return $this->hasMany(Book::class,
        "book_type_id",
        "id");
    }
}

//Model_ID, ModelID, Modelid, modelid, modelid, model_id, Model_iD, 

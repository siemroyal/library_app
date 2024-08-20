<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        "book_title",
        "publish_date",
        "book_type_id",
        "number_of_pages",
        "number_of_copies",
        "edition",
        "publisher",
        "book_source",
        "remarks",
    ];
    // protected $guarded = [
    //     "id",
    //     "created_at",
    //     "updated_at",
    // ];
    //dynamic properties
    public function book_type():BelongsTo{
        return $this->belongsTo(BookType::class,
        "book_type_id","id");
    }
}
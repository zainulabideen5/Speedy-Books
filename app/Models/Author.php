<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $table = 'Author';
    protected $guarded = [ 'id', 'created_at', 'updated_at' ];

    public function author_books()
    {
        return $this->hasMany(Book::class, 'author_id');
    }
}

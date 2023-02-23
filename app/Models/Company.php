<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','logo','website'];

        /**
     * Get the comments for the blog post.
     */
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}

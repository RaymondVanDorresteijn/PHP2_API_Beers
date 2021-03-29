<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPerson extends Model
{
    use HasFactory;

    // Mass Assignment
    //protected $fillable = ['name', 'brewer_id'];
    protected $guarded = [];

    // Eager Loading By Default
    /*protected $with = ['brewer'];

    public function brewer()
    {
        return $this->belongsTo(Brewer::class);
    }*/
}

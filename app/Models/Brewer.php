<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brewer extends Model
{
    use HasFactory;

    // Mass Assignment
    //protected $fillable = ['name'];
    protected $guarded = [];

    // Eager Loading By Default
    /*protected $with = ['beers', 'contactPersons'];

    public function beers()
    {
        return $this->hasMany(Beer::class);
    }

    public function contactPersons()
    {
        return $this->hasMany(ContactPerson::class);
    }*/
}

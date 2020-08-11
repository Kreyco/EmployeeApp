<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name', 'email', 'sexo', 'area_id', 'bulletin', 'notes'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name', 'email', 'sexo', 'area_id', 'bulletin', 'notes'];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'employee_roles');
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}

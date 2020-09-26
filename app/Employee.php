<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name', 'email', 'gender', 'area_id', 'bulletin', 'notes'];

//    protected static function boot ()
//    {
//        parent::boot(); // TODO: Change the autogenerated stub
//
//        self::creating(function($table) {
//            if (!app()->runningInConsole()) {
//                $table->user_id = auth()->id();
//            }
//        });
//    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'employee_roles');
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}

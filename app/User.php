<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    public function roles() {
        return $this->belongsToMany('App\Role', 'user_role', 'user_id');
    }

    public function posts() {
        return $this->hasMany('App\Post');
    }

    public function hasAnyRole($roles) {
        if(is_array($roles)) {
            foreach ($roles as $role) {
                if($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }

        return false;
    }

    public function hasRole($role) {
        if ($this->roles()->where('name', $role->first())) {
            return true;
        } else {
            return false;
        }
    }

    public function getFileName() {
        $name = strtolower($this->name);
        $name = str_replace(' ', '_', $name);
        $filename = $name . '-' . $this->id;

        return $filename;
    }
}

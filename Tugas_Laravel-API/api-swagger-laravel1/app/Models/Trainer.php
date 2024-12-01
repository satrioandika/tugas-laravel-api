<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model {
    public $timestamps = false;
    protected $table = 'trainer';
    protected $fillable = [
        'id', 'nama', 'email', 'password', 'no_hp', 'status'
    ];
}

?>
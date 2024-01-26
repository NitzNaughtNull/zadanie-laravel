<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{

    use HasFactory;

    // table name in database
    public $table = "people";

    // hide some columns that are not required for the end user
    public $hidden = ["created_at", "updated_at"];
}

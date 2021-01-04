<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logged_in_user extends Model
{
    use HasFactory;
    private $user_id;
}

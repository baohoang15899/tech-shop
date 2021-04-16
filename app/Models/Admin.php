<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = "controladmin";
    protected $id = "id_admin";
    protected $fillable = ["admin_username","admin_password"];
}

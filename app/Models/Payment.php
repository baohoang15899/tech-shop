<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = "payment";
    protected $id = "id_payment";
    protected $primaryKey = "id_payment";
    protected $fillable = ['payment_type'];
    public $timestamps = false;

    public function getAll(){
        return $this->All();
    }
}

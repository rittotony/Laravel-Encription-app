<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $table = 'tbl_register';
    protected $primarykey = 'id';
    protected $fillable = ["email", "password", "gender"];
    use HasFactory;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvitingAuthority extends Model
{
    protected $table = 'inviters';

    use HasFactory;
   protected $fillable=['Name'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NatureOfParticipation extends Model
{
    public function foreigntrip(){
        return $this->hasOne(ForeignTrip::class,'id','participation_id');
    }
    protected $table = 'participations';
    use HasFactory;
    protected $fillable=['Name'];

}

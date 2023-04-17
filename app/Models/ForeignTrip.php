<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForeignTrip extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'foreigntrips';
public function employee(){
    return $this->belongsTo(Employee::class,'emp_id','id');
}
public function department(){
    return $this->belongsTo(Department::class,'department_id','id');
}
public function invitingAuthority(){
    return $this->belongsTo(InvitingAuthority::class,'inviter_id','id');
}
public function doner(){
    return $this->belongsTo(Doner::class,'doner_id','id');
}
public function participations(){
    return $this->belongsTo(NatureOfParticipation::class,'participation_id','id');
}

protected $fillable=['emp_id','department_id','program_name','inviter_id','date_of_program','eventPlace','doner_id','commitee_date','participation_id',
'pre_trip_date','pre_trip_subject','ministry_approval','order_of_authority','agree_mof','participant_grantee','participation','report_date','report_image','considerations'];
}

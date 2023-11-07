<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    protected $fillable=['name', 'gender','age', 'position', 'department','empFile','contactNumber'];

    public function trainingEvent(){
        return $this->belongsToMany('App\Models\trainingEvent');

    }
    public function events() {
        return $this->belongsToMany(trainingEvent::class, 'employee_training_event', 'employee_id', 'training_event_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Event extends Model
{
    protected $table = "events";

    protected $fillable = ['title','type','image','location','description','date','start_time','end_time','email','first_name','last_name'];

}

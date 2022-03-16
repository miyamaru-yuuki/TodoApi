<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table = 'note';
    protected $guarded = array('noteid');
    protected $primaryKey = 'noteid';
    public $timestamps = false;
}

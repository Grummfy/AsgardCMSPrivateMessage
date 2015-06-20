<?php namespace Modules\PrivateMessage\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $table = 'privatemessage__threads';
    protected $fillable = [];
}

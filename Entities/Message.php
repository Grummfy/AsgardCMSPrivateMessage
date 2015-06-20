<?php namespace Modules\PrivateMessage\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'privatemessage__messages';
    protected $fillable = [];
}

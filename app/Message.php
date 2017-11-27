<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    // die('hfdfhdj');
    protected $table = "message";
    
    protected $fillable = [
		'heading', 'message', 'file_link'
	];
}
// die('fjgfl');
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    // die('hfdfhdj');
    protected $table = "baract_chapters";
    
    protected $fillable = [
		'title', 'baract_id','chapter_number'
	];
}
// die('fjgfl');
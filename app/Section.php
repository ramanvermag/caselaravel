<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    // die('hfdfhdj');
    protected $table = "baract_chapter_sections";
    
    protected $fillable = [
		'title', 'baract_chapter_id','description'
	];
}
// die('fjgfl');
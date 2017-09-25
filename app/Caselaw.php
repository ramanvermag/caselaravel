<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caselaw extends Model
{
    //
    protected $fillable = [
		'title', 'description', 'link'
	];
}

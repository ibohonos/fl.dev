<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
	protected $fillable = [
		'title', 'description', 'active', 'end_date', 'price', 'image', 'files', 'remote', 'status', 'user_id', 'freelancer_id'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function freelancer()
    {
        return $this->belongsTo(User::class);
    }
}

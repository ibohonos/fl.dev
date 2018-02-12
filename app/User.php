<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Storage;

class User extends Authenticatable
{
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'first_name', 'last_name', 'email', 'password', 'api_token', 'avatar',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function projects()
	{
		return $this->hasMany(Projects::class);
	}

	public function roles()
	{
		return $this->belongsToMany(Role::class);
	}

	public function authorizeRoles($roles)
	{
		if ($this->hasAnyRole($roles)) {
			return true;
		}
		abort(401, 'Ця дія неавторизована.');
	}

	public function hasAnyRole($roles)
	{
		if (is_array($roles)) {
			foreach ($roles as $role) {
				if ($this->hasRole($role)) {
					return true;
				}
			}
		} else {
			if ($this->hasRole($roles)) {
				return true;
			}
		}
		return false;
	}

	public function hasRole($role)
	{
		if ($this->roles()->where('slug', $role)->first()) {
			return true;
		}
		return false;
	}

	public function getAvatarAttribute($avatar)
	{
		return asset(Storage::url($avatar));
	}
}

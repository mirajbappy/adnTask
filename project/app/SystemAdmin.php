<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SystemAdmin extends Authenticatable
{
	use Notifiable;

	protected $guard = 'systemadmin';

	protected $fillable = [
	'name', 'email', 'password',
	];

	protected $hidden = [
	'password', 'remember_token',
	];
}

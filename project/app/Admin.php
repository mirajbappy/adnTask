<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
	use Notifiable;

	protected $guard = 'admin';

	protected $fillable = [
	'name', 'email', 'password', 'user_type',
	];

	protected $hidden = [
	'password', 'remember_token',
	];
}

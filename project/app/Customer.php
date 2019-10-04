<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use Notifiable;

	protected $guard = 'customer';

	protected $fillable = [
	'name', 'email', 'password', 'user_type',
	];

	protected $hidden = [
	'password', 'remember_token',
	];
}

<?php

/**
 * Created by Trish Jedrick Coyoca
 * Date: Sun, 03 Mar 2019 03:21:35 +0000.
 */

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 *
 * @property int $id
 * @property int $security_id
 * @property string $username
 * @property string $password
 * @property string $access_level
 *
 * @package App\Models
 */

class User extends Authenticatable
{
	use Notifiable;

	public $table = 'users';
	public $incrementing = true;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'security_id' => 'int',
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'verified',
		'security_id',
		'username',
		'password',
		'access_level'
	];

}

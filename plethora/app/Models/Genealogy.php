<?php

/**
 * Created by Trish Jedrick Coyoca
 * Date: Sun, 03 Mar 2019 03:21:35 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Genealogy
 *
 * @property int $id
 * @property string $username
 * @property string $access_level
 * @property string $recruiter_username
 * @property int $counter
 *
 * @package App\Models
 */
class Genealogy extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'username',
		'upline_id',
		'unit_pos',
		'position',
	];
}

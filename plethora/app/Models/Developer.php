<?php

/**
 * Created by Trish Jedrick Coyoca
 * Date: Sun, 03 Mar 2019 03:21:35 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Developer
 * 
 * @property int $id
 * @property string $name
 *
 * @package App\Models
 */
class Developer extends Eloquent
{
	public $timestamps = false;

	protected $fillable = [
		'name'
	];
}

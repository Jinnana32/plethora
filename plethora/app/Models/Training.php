<?php

/**
 * Created by Trish Jedrick Coyoca
 * Date: Sun, 03 Mar 2019 03:21:35 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Training
 * 
 * @property int $id
 * @property string $header
 * @property string $content
 * @property string $venue
 * @property string $date
 * @property string $time
 * @property string $place
 *
 * @package App\Models
 */
class Training extends Eloquent
{
	public $timestamps = false;

	protected $fillable = [
		'header',
		'content',
		'venue',
		'date',
		'time',
		'place'
	];
}

<?php

/**
 * Created by Trish Jedrick Coyoca
 * Date: Sun, 03 Mar 2019 03:21:35 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Blog
 * 
 * @property int $id
 * @property string $posted_by
 * @property string $header
 * @property string $description
 * @property boolean $image
 *
 * @package App\Models
 */
class Blog extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'image' => 'boolean'
	];

	protected $fillable = [
		'posted_by',
		'header',
		'description',
		'image'
	];
}

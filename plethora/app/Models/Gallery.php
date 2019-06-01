<?php

/**
 * Created by Trish Jedrick Coyoca
 * Date: Sun, 03 Mar 2019 03:21:35 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Gallery
 * 
 * @property int $id
 * @property int $developer_id
 * @property boolean $image
 * @property string $description
 *
 * @package App\Models
 */
class Gallery extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'developer_id' => 'int',
		'image' => 'boolean'
	];

	protected $fillable = [
		'developer_id',
		'image',
		'description'
	];
}

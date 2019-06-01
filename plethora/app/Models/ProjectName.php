<?php

/**
 * Created by Trish Jedrick Coyoca
 * Date: Sun, 03 Mar 2019 03:21:35 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ProjectName
 * 
 * @property int $id
 * @property int $developer_id
 * @property string $name
 *
 * @package App\Models
 */
class ProjectName extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'developer_id' => 'int'
	];

	protected $fillable = [
		'developer_id',
		'name'
	];
}

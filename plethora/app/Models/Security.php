<?php

/**
 * Created by Trish Jedrick Coyoca
 * Date: Sun, 03 Mar 2019 03:21:35 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Security
 * 
 * @property int $id
 * @property int $account_id
 * @property string $question
 * @property string $answer
 *
 * @package App\Models
 */
class Security extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'account_id' => 'int'
	];

	protected $fillable = [
		'account_id',
		'question',
		'answer'
	];
}

<?php

/**
 * Created by Trish Jedrick Coyoca
 * Date: Sun, 03 Mar 2019 03:21:35 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Inbox
 * 
 * @property int $id
 * @property string $receiver
 * @property string $sender
 * @property string $title
 * @property string $description
 *
 * @package App\Models
 */
class Inbox extends Eloquent
{
	public $timestamps = false;

	protected $fillable = [
		'receiver',
		'sender',
		'title',
		'description'
	];
}

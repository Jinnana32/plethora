<?php

/**
 * Created by Trish Jedrick Coyoca
 * Date: Sun, 03 Mar 2019 03:21:35 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Webinar
 * 
 * @property int $id
 * @property string $title
 * @property string $content_description
 * @property string $youtube_link
 *
 * @package App\Models
 */
class Webinar extends Eloquent
{
	public $timestamps = false;

	protected $fillable = [
		'title',
		'content_description',
		'youtube_link'
	];
}

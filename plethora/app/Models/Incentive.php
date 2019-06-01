<?php

/**
 * Created by Trish Jedrick Coyoca
 * Date: Sun, 03 Mar 2019 03:21:35 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Incentive
 * 
 * @property int $id
 * @property string $category
 * @property string $description
 * @property float $milestone_income
 *
 * @package App\Models
 */
class Incentive extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'milestone_income' => 'float'
	];

	protected $fillable = [
		'category',
		'description',
		'milestone_income'
	];
}

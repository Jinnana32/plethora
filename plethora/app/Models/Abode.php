<?php

/**
 * Created by Trish Jedrick Coyoca
 * Date: Sun, 03 Mar 2019 03:21:35 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Abode
 *
 * @property int $id
 * @property string $developer
 * @property string $project_name
 * @property string $model_unit
 * @property string $unit_id
 * @property string $category
 * @property string $location
 * @property float $monthly_payment
 * @property string $bedrooms
 * @property int $no_of_toilets
 * @property float $total_contract_price
 *
 * @package App\Models
 */
class Abode extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'monthly_payment' => 'float',
		'no_of_toilets' => 'int',
		'total_contract_price' => 'float'
	];

	protected $fillable = [
		'assigned_to',
		'dev_id',
		'project_name',
		'model_unit',
		'unit_id',
		'category',
		'location',
		'monthly_payment',
		'bedrooms',
		'no_of_toilets',
		'total_contract_price',
		'net_selling_price',
		'image',
		'with_balcony',
		'with_loft',
		'with_maids_room',
		'type'
	];

	public function abodeID()
	{
		return $this->belongsToMany('App\Compensation');
	}
}

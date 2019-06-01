<?php

/**
 * Created by Trish Jedrick Coyoca
 * Date: Sun, 03 Mar 2019 03:21:35 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Compensation
 * 
 * @property int $id
 * @property string $username
 * @property string $client_name
 * @property float $commission_rate
 * @property float $percent_share
 * @property float $net_sale_price
 * @property float $commission_receivables
 * @property float $amount_released
 * @property float $balance
 * @property string $status
 * @property int $abode_id
 *
 * @package App\Models
 */
class Compensation extends Eloquent
{
	protected $table = 'compensations';
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'commission_rate' => 'float',
		'percent_share' => 'float',
		'net_sale_price' => 'float',
		'commission_receivables' => 'float',
		'amount_released' => 'float',
		'balance' => 'float',
		'abode_id' => 'int'
	];

	protected $fillable = [
		'username',
		'client_name',
		'commission_rate',
		'percent_share',
		'net_sale_price',
		'commission_receivables',
		'amount_released',
		'balance',
		'status',
		'abode_id'
	];

	public function getAbodeDetails()
	{
		return $this->hasMany('App\Abode');
	}
}

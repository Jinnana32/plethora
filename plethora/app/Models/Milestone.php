<?php

/**
 * Created by Trish Jedrick Coyoca
 * Date: Sun, 03 Mar 2019 03:21:35 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Milestone
 * 
 * @property int $id
 * @property int $agent_id
 * @property float $total_contract_price
 *
 * @package App\Models
 */
class Milestone extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'agent_id' => 'int',
		'total_contract_price' => 'float'
	];

	protected $fillable = [
		'agent_id',
		'total_contract_price'
	];
}

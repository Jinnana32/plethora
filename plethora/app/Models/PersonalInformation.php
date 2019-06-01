<?php

/**
 * Created by Trish Jedrick Coyoca
 * Date: Sun, 03 Mar 2019 03:21:35 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PersonalInformation
 *
 * @property int $id
 * @property string $last_name
 * @property string $first_name
 * @property string $middle_initial
 * @property string $name_suffix
 * @property string $gender
 * @property string $birthday
 * @property string $citizenship
 * @property string $religion
 * @property string $civil_status
 * @property string $permanent_address
 * @property string $facebook_account
 * @property string $email_address
 * @property string $contact_number
 *
 * @package App\Models
 */
class PersonalInformation extends Eloquent
{
	protected $table = 'personal_information';
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
	];

	protected $fillable = [
		'user_id',
		'last_name',
		'first_name',
		'middle_initial',
		'name_suffix',
		'gender',
		'birthday',
		'citizenship',
		'religion',
		'civil_status',
		'permanent_address',
		'facebook_account',
		'email_address',
		'contact_number',
		'referral_link',
		'image',
		'referred_by',
	];

}

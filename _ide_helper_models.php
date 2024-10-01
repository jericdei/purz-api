<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property string $id
 * @property string $region_code
 * @property string $province_code
 * @property string|null $municipality_code
 * @property string|null $sub_municipality_code
 * @property string|null $city_code
 * @property string $barangay_code
 * @property string $zip_code
 * @property string $line_1
 * @property string|null $line_2
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\AddressFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address query()
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereBarangayCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCityCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereLine1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereLine2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereMunicipalityCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereProvinceCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereRegionCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereSubMunicipalityCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereZipCode($value)
 */
	class Address extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property string $id
 * @property string $user_id
 * @property string $first_name
 * @property string|null $middle_name
 * @property string $last_name
 * @property string|null $suffix
 * @property string $birthday
 * @property string|null $avatar_url
 * @property string $gender
 * @property string $contact_number
 * @property string|null $address_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\ProfileFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile query()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereAvatarUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereContactNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereSuffix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereUserId($value)
 */
	class Profile extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property string $id
 * @property \App\Enums\TransactionType $type
 * @property \App\Enums\TransactionDebitName|\App\Enums\TransactionCreditName $name
 * @property string|null $user_id
 * @property string|null $from_user_id
 * @property float $amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $from
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\TransactionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereFromUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereUserId($value)
 */
	class Transaction extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property string $id
 * @property string $username
 * @property \App\Enums\UserRank $rank
 * @property float $balance
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $passcode
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Profile|null $profile
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Transaction> $transactions
 * @property-read int|null $transactions_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePasscode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 */
	class User extends \Eloquent {}
}

namespace Jericdei\PsgcDatabase\Models{
/**
 * 
 *
 * @property int $code
 * @property string|null $old_code
 * @property string $region_code
 * @property string $province_code
 * @property string $municipality_code
 * @property string $sub_municipality_code
 * @property string $barangay_code
 * @property string $name
 * @property string|null $old_name
 * @method static \Illuminate\Database\Eloquent\Builder|Barangay newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Barangay newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Barangay query()
 * @method static \Illuminate\Database\Eloquent\Builder|Barangay whereBarangayCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barangay whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barangay whereMunicipalityCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barangay whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barangay whereOldCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barangay whereOldName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barangay whereProvinceCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barangay whereRegionCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barangay whereSubMunicipalityCode($value)
 */
	class Barangay extends \Eloquent {}
}

namespace Jericdei\PsgcDatabase\Models{
/**
 * 
 *
 * @property int $code
 * @property string|null $old_code
 * @property string $region_code
 * @property string $province_code
 * @property string $city_code
 * @property string $name
 * @property string|null $old_name
 * @method static \Illuminate\Database\Eloquent\Builder|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City query()
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCityCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereOldCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereOldName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereProvinceCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereRegionCode($value)
 */
	class City extends \Eloquent {}
}

namespace Jericdei\PsgcDatabase\Models{
/**
 * 
 *
 * @property int $code
 * @property string|null $old_code
 * @property string $region_code
 * @property string $province_code
 * @property string $municipality_code
 * @property string $name
 * @property string|null $old_name
 * @method static \Illuminate\Database\Eloquent\Builder|Municipality newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Municipality newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Municipality query()
 * @method static \Illuminate\Database\Eloquent\Builder|Municipality whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Municipality whereMunicipalityCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Municipality whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Municipality whereOldCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Municipality whereOldName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Municipality whereProvinceCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Municipality whereRegionCode($value)
 */
	class Municipality extends \Eloquent {}
}

namespace Jericdei\PsgcDatabase\Models{
/**
 * 
 *
 * @property int $code
 * @property string|null $old_code
 * @property string $region_code
 * @property string $province_code
 * @property string $name
 * @property string|null $old_name
 * @method static \Illuminate\Database\Eloquent\Builder|Province newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Province newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Province query()
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereOldCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereOldName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereProvinceCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereRegionCode($value)
 */
	class Province extends \Eloquent {}
}

namespace Jericdei\PsgcDatabase\Models{
/**
 * 
 *
 * @property int $code
 * @property string|null $old_code
 * @property string $region_code
 * @property string $name
 * @property string|null $old_name
 * @method static \Illuminate\Database\Eloquent\Builder|Region newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Region newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Region query()
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereOldCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereOldName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereRegionCode($value)
 */
	class Region extends \Eloquent {}
}

namespace Jericdei\PsgcDatabase\Models{
/**
 * 
 *
 * @property int $code
 * @property string|null $old_code
 * @property string $region_code
 * @property string $province_code
 * @property string $municipality_code
 * @property string $sub_municipality_code
 * @property string $name
 * @property string|null $old_name
 * @method static \Illuminate\Database\Eloquent\Builder|SubMunicipality newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubMunicipality newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubMunicipality query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubMunicipality whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubMunicipality whereMunicipalityCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubMunicipality whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubMunicipality whereOldCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubMunicipality whereOldName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubMunicipality whereProvinceCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubMunicipality whereRegionCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubMunicipality whereSubMunicipalityCode($value)
 */
	class SubMunicipality extends \Eloquent {}
}


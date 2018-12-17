<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Criterion
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property int $platform_id
 * @property string $api_call
 * @property string $datatype
 * @property string $validation
 * @property-read \App\Platform $platform
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Search[] $searches
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Criterion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Criterion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Criterion query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Criterion whereApiCall($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Criterion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Criterion whereDatatype($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Criterion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Criterion whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Criterion wherePlatformId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Criterion whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Criterion whereValidation($value)
 */
	class Criterion extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $username
 * @property string $name
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Result[] $results
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Search[] $searches
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUsername($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Result
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $channel_name
 * @property string $url
 * @property int $followers
 * @property int $search_id
 * @property int $platform_id
 * @property int $user_id
 * @property-read \App\Platform $platform
 * @property-read \App\Search $search
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Result newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Result newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Result query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Result whereChannelName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Result whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Result whereFollowers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Result whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Result wherePlatformId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Result whereSearchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Result whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Result whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Result whereUserId($value)
 */
	class Result extends \Eloquent {}
}

namespace App{
/**
 * App\Platform
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Criterion[] $criteria
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Search[] $searches
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Platform newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Platform newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Platform query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Platform whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Platform whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Platform whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Platform whereUpdatedAt($value)
 */
	class Platform extends \Eloquent {}
}

namespace App{
/**
 * App\Search
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property float $frequency_value
 * @property string $frequency_unit
 * @property int $platform_id
 * @property int $user_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Criterion[] $criteria
 * @property-read \App\Platform $platform
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Search newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Search newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Search query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Search whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Search whereFrequencyUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Search whereFrequencyValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Search whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Search whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Search wherePlatformId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Search whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Search whereUserId($value)
 */
	class Search extends \Eloquent {}
}


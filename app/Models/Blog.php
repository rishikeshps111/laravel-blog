<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Blog
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $date
 * @property string $author
 * @property string $content
 * @property string $image
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Comment[] $comments
 *
 * @package App\Models
 */
class Blog extends Model
{
	use HasFactory;
	protected $table = 'blogs';

	protected $casts = [
		'date' => 'datetime'
	];

	protected $fillable = [
		'name',
		'date',
		'author',
		'content',
		'image'
	];

	public function comments()
	{
		return $this->hasMany(Comment::class);
	}
}

<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 * 
 * @property int $id
 * @property string $comment
 * @property int $user_id
 * @property int $blog_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Blog $blog
 * @property User $user
 * @property Collection|SubComment[] $sub_comments
 *
 * @package App\Models
 */
class Comment extends Model
{
	protected $table = 'comments';

	protected $casts = [
		'user_id' => 'int',
		'blog_id' => 'int'
	];

	protected $fillable = [
		'comment',
		'user_id',
		'blog_id'
	];

	public function blog()
	{
		return $this->belongsTo(Blog::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function sub_comments()
	{
		return $this->hasMany(SubComment::class);
	}
}

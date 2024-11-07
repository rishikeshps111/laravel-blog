<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SubComment
 * 
 * @property int $id
 * @property string $comment
 * @property int $user_id
 * @property int $comment_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class SubComment extends Model
{
	protected $table = 'sub_comments';

	protected $casts = [
		'user_id' => 'int',
		'comment_id' => 'int'
	];

	protected $fillable = [
		'comment',
		'user_id',
		'comment_id'
	];

	public function comment()
	{
		return $this->belongsTo(Comment::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}

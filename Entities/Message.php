<?php

namespace Modules\PrivateMessage\Entities;

use Illuminate\Database\Eloquent\Model;
use WebInterface\Models\Common\Author as AuthorInterface;
use WebInterface\Models\Common\Message as MessageInterface;

class Message extends Model implements MessageInterface
{
    protected $table = 'privatemessage__messages';
    protected $fillable = [];

	public function thread()
	{
		return $this->belongsTo('Modules\PrivateMessage\Thread');
	}

	public function author()
	{
		return $this->hasOne('Modules\User\Entities\Sentry\User', 'author_id');
	}

	public function getMetaData()
	{
		return [
			'created_at'    => $this->created_at,
			'updated_at'    => $this->updated_at,
		];
	}

	public function getBody()
	{
		return $this->message;
	}

	/**
	 * @return AuthorInterface
	 */
	public function getAuthor()
	{
		return new Author($this->author);
	}

	/**
	 * Get the body format : markdown, html, bbcode, ...
	 * @return string
	 */
	public function getFormat()
	{
		return $this->format;
	}
}

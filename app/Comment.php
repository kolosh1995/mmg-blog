<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 * @package App
 *
 * @property string $author
 * @property string $content
 * @property mixed  $created_at
 *
 */
class Comment extends Model
{
    protected $fillable = [
        'author',
        'content',
        'commentable_id',
        'commentable_type',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->created_at->format('Y-m-d');
    }
}

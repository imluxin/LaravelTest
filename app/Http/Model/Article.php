<?php

namespace App\Http\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // 指定表的名字
    protected $table = 'article';

    // 指定可以插入数据的字段
    protected $fillable = ['title', 'body', 'expert', 'published_at', 'user_id'];

    // 设置published_at为Carbon类型
    protected $dates = ['published_at'];

    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date); // 格式为当前时间
//        $this->attributes['published_at'] = Carbon::parse($date); // 格式化为0点时间
    }

    /**
     * 增加Sql过滤
     * @param $query
     */
    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    /**
     * user 与 article 建立一对多关系
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

<?php

namespace App\Http\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // 指定表的名字
    protected $table = 'article';

    // 指定可以插入数据的字段
    protected $fillable = ['title', 'body', 'expert', 'published_at'];


    protected $dates = ['published_at'];

    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date); // 格式为当前时间
//        $this->attributes['published_at'] = Carbon::parse($date); // 格式化为0点时间
    }

    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }
}

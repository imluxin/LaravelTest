<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    // 启用软删除
    use SoftDeletes;

    // 指定表的名字
    protected $table = 'article';

    // 指定可以插入数据的字段 - 白名单
    protected $fillable = ['title', 'body', 'expert', 'published_at', 'user_id'];
    // 指定不可以插入数据的字段 - 黑名单
//    protected $guarded = [];

    // 设置published_at为Carbon类型
    protected $dates = ['published_at', 'deleted_at'];

    // 取消created_at updated_at两个字段
//    public $timestamps = false;

    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date); // 格式为当前时间
//        $this->attributes['published_at'] = Carbon::parse($date); // 格式化为0点时间
    }

    /**
     * 查询作用域 - 增加Sql过滤
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

    /**
     * article 与 tag 多对多
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Model\Tag')->withTimestamps();
    }
}

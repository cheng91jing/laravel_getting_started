<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPassword;

class User extends Authenticatable
{
    use Notifiable;

    // protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
    * boot 方法会在用户模型类完成初始化之后进行加载，因此我们队事件的监听需要放在该方法中
    */
    public static function boot()
    {
        parent::boot();
        static::creating(function($user){
            $user->activation_token = str_random(30);
        });
    }

    public function statuses()
    {
        return $this->hasMany(Status::class);
    }

    /**
    * 使用 Gravatar 来为用户提供个人头像支持。  https://en.gravatar.com/
    * Gravatar 为 “全球通用头像”，当你在 Gravatar 的服务器上放置了自己的头像后，
    * 可通过将自己的 Gravatar 登录邮箱进行 MD5 转码，并与 Gravatar 的 URL 进行拼接来获取到自己的 Gravatar 头像。
    */
    public function gravatar($size = '100')
    {
        $hash = md5(strtolower(trim($this->attribates['eamil'])));
        return "http://www.gravatar.com/avatar/{$hash}?s={$size}";
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    /**
    * 将当前用户发不过的所有微博从数据库中去除，并根据时间倒序，后面为用户增加关注人功能后，
    * 在此处获取当前用户关注的人发不过的所有微博动态。
    */
    public function feed()
    {
        return $this->statuses()
                        ->orderBy('created_at', 'desc');
    }
}

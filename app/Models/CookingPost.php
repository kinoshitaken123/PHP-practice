<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CookingPost extends Model
{
    protected $table = "cooking_posts";
	protected $fillable = ["product_name","explanation","file_name","file_path"];
    use HasFactory;
    // usersテーブルとのリレーション（従テーブル側）
    public function user() { //1対多の「１」側なので単数系
        return $this->belongsTo('App\User');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadImage extends Model
{
    protected $table = "upload_image";
	protected $fillable = ["product_name","explanation","file_name","file_path"];
    use HasFactory;
}

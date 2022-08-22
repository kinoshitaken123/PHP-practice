<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cloudinary;

class CloudinaryUploadController extends Controller
{
    public function upload()
    {
        return view('uploads.upload');
    }

    public function store(Request $request)
    {
        $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        dd($uploadedFileUrl);
    }
}
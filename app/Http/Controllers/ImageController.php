<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function retrieveImage($id){
        $image = Image::find($id)->path;
        return Storage::download($image);
    }

    public function retrievePlaceholderImage($id){
        $image = Image::find($id)->preview_path;
        return Storage::download($image);
    }

    public function updateImage(Request $request, $id){
        $image_entry = Image::find($id);
        if(isset($image_entry)){
            $result = $image_entry->delete();
            return $result;
        }
    }
    public function destroy($id) {
        $image = Image::findOrFail($id);
        Storage::delete([$image->preview_path, $image->path]);
        $image->delete();
        return $image;        
    }
}


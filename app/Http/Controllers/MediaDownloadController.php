<?php

namespace App\Http\Controllers;

use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaDownloadController extends Controller
{
    public function show(Media $mediaItem)
    {
        return response()->file($mediaItem->getPath());
    }

    public function download(Media $mediaItem)
    {
        return $mediaItem;
    }
}

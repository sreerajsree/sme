<?php

namespace App\Traits;

use App\Models\Photo;
use Illuminate\Support\Facades\Storage;

trait BasePhotoUpload
{
    /**
     * Get photo of specified resource.
     *
     * @param int $id
     * @return \App\Models\Photo
     */
    private function getPhoto($id)
    {
        return Photo::find($id);
    }

    /**
     * Delete photo from folder.
     *
     * @param \App\Models\Photo $photo
     * @return bool
     */
    private function deletePhotoFromStorageFolder(Photo $photo)
    {
        return Storage::delete('news/'.$photo->year.'/'.$photo->month.'/'.$photo->path);
    }
}

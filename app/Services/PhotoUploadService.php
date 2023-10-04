<?php

namespace App\Services;

use App\Models\Photo;
use Illuminate\Http\Request;
use App\Traits\DeletePhoto;

/**
 * Save file to \storage\app\public\photos
 *
 * @author Volodymyr Zhonchuk
 */
abstract class PhotoUploadService
{
    use DeletePhoto;

    /**
     * Model instance.
     *
     * @var object
     */
    protected $model;

    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    /*
     * Get model namespace
     *
     * @return string
     */
    abstract public function getModelClass();

    /*
     * Store photo while creating/updating post/user entity
     *
     * @param  Illuminate\Http\Request $request
     * @param  $model
     * @return void
     */
    public function store(Request $request, $model)
    {
        if ($request->file('image')) {
            $currentMonth = now()->month;
            $currentYear = now()->year;
            $folderpath = 'public/photos/' . $currentYear . '/' . $currentMonth;
            $file = $request->file('image');
            $filename = $file->hashName();
            $file->storeAs($folderpath, $filename);
        }
        if ($request->file('image')) {
            $photo = new Photo();
            $photo['path'] = 'photos/' . $currentYear . '/' . $currentMonth .'/'. $filename ;
            $photo->month = $currentMonth;
            $photo->year = $currentYear;
            $model->photo()->save($photo);
        }

        return redirect('dashboard/posts')->withSuccessMessage('Image Updated Successfully!');
    }
}

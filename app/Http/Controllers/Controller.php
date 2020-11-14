<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use JD\Cloudder\Facades\Cloudder;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param $request
     * @param $field
     * @return string
     */
    public function storeMediaCloudinary($request, $field): string
    {
        $fileNameToStore = 'untitled';

        // Handle File Upload
        if ($request->hasFile($field)) {

            $media = $request->file($field);

            $media_type = explode('/', $media->getMimeType())[0];

            $media_ext = explode('/', $media->getMimeType())[1];

            $media_name = $media->getRealPath();

            list($width, $height) = getimagesize($media_name);

            if ($media_type == 'video' || $media_type == 'audio') {
                Cloudder::uploadVideo($media_name, null);

                if ($media_type == 'video') {
                    $media_url = 'https://res.cloudinary.com/quizy-edu/image/upload/' . Cloudder::getPublicId() . "." . $media_ext;
                } else {
                    $media_url = Cloudder::secureShow(Cloudder::getPublicId(), [
                        'resource_type' => 'video',
                        'format' => 'mp3'
                    ]);
                }
            } else {
                Cloudder::upload($media_name, null);
                $media_url = Cloudder::secureShow(Cloudder::getPublicId(), [
                    'resource_type' => $media_type,
                    'format' => $media_ext,
                    "width" => $width,
                    "height" => $height
                ]);
            }

            return $media_url;
        }

        return $fileNameToStore;
    }
}

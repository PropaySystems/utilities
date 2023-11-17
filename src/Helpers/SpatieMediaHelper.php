<?php

namespace PropaySystems\Utilities\Helpers;

use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\StreamedResponse;

class SpatieMediaHelper
{
    /**
     * @param $id
     * @return Media
     */
    public static function getItemById($id): Media
    {
        return Media::find($id)->first();
    }

    /**
     * @param $uuid
     * @return Media
     */
    public static function getItemByUuid($uuid): Media
    {
        return Media::where('uuid', $uuid)->first();
    }

    /**
     * @param $model
     * @param  string  $realpath
     * @param  string  $name
     * @param  string  $collection
     * @param  string  $disk
     * @param  array  $customProps
     * @return Media
     */
    public static function create($model, string $realpath, string $name, string $collection, string $disk, array $customProps = []): Media
    {
        return $model
            ->addMediaFromDisk($realpath, config('livewire.temporary_file_upload.disk'))
            ->setName($name)
            ->withCustomProperties($customProps)
            ->toMediaCollection($collection, $disk);
    }

    /**
     * @param $model
     * @param  string  $string
     * @param  string  $name
     * @param  string  $collection
     * @param  string  $disk
     * @param  array  $customProps
     * @return Media
     */
    public static function createFromString($model, string $string, string $name, string $collection, string $disk, array $customProps = []): Media
    {
        return $model
            ->addMediaFromString($string, config('livewire.temporary_file_upload.disk'))
            ->setName($name)
            ->withCustomProperties($customProps)
            ->toMediaCollection($collection, $disk);
    }

    /**
     * @param  Media  $media
     * @param  bool  $asFilename
     * @return Media|StreamedResponse
     */
    public static function download(Media $media, bool $asFilename = false): StreamedResponse|Media
    {
        return $media;
        //return Storage::download($media->getPath(), ($asFilename) ? $media->file_name : $media->name);
    }

    /**
     * @param  Media  $media
     * @return bool|null
     */
    public static function delete(Media $media): ?bool
    {
        return $media->delete();
    }
}

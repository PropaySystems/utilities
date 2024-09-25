<?php

namespace PropaySystems\Utilities\Helpers;

use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\StreamedResponse;

class SpatieMediaHelper
{
    public static function getItemById($id): Media
    {
        return Media::find($id)->first();
    }

    public static function getItemByUuid($uuid): Media
    {
        return Media::where('uuid', $uuid)->first();
    }

    public static function create($model, string $realpath, string $name, string $collection, string $disk, array $customProps = []): Media
    {
        return $model
            ->addMediaFromDisk($realpath, config('livewire.temporary_file_upload.disk'))
            ->setName($name)
            ->withCustomProperties($customProps)
            ->toMediaCollection($collection, $disk);
    }

    public static function createFromString($model, string $string, string $name, string $collection, string $disk, array $customProps = []): Media
    {
        return $model
            ->addMediaFromString($string, config('livewire.temporary_file_upload.disk'))
            ->setName($name)
            ->withCustomProperties($customProps)
            ->toMediaCollection($collection, $disk);
    }

    public static function download(Media $media, bool $asFilename = false, $disk = null): StreamedResponse|Media
    {
        if (! is_null($disk)) {
            return Storage::disk($disk)->download($media->getPath(), ($asFilename) ? $media->name : $media->file_name);
        }

        return Storage::download($media->getPath(), ($asFilename) ? $media->name : $media->file_name);
    }

    public static function delete(Media $media): ?bool
    {
        return $media->delete();
    }
}

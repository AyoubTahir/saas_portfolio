<?php

namespace App\Support\SaveModel\Fields;

use Closure;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileField extends Field
{
    private ?string $directory = null;

    private ?string $disk = null;

    private ?Closure $fileNameClosure = null;

    private bool $deleteOldFileOnUpdate = true;

    private bool $uploadAsOriginalName = false;

    public function execute(): mixed
    {
        if (!$this->value) {
            return $this->value;
        }

        if (!($this->value instanceof UploadedFile)) {
            return $this->value;
        }

        //delete file if in update mode and the $deleteOldFileOnUpdate is true
        if ($this->isUpdateMode() && $this->deleteOldFileOnUpdate) {
            Storage::disk($this->disk ?? config('filesystems.default'))->delete($this->model->getRawOriginal($this->column));
        }

        //store file with new hashed name
        if (!$this->uploadAsOriginalName) {

            return $this->value->store($this->directory, $this->disk ?? config('filesystems.default'));
        }

        //store file with original name
        $fileName = $this->value->getClientOriginalName();

        return $this->value->storeAs($this->directory, $fileName, $this->disk ?? config('filesystems.default'));
    }

    public function storeIn(string $dir)
    {
        $this->directory = $dir;

        return $this;
    }

    public function disk(string $disk)
    {
        $this->disk = $disk;

        return $this;
    }

    public function uploadAsOriginalName()
    {
        $this->uploadAsOriginalName = true;

        return $this;
    }

    public function keepTheOldFile()
    {
        $this->deleteOldFileOnUpdate = false;

        return $this;
    }
}

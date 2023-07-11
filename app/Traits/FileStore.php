<?php
namespace App\Traits;
use Illuminate\Support\Str;

trait FileStore {
    public function getPathFile($value, $type)
    {
        $ext        = $value->getClientOriginalExtension();
        $fileName   = basename($value->getClientOriginalName(), '.' . $ext);
        $name       = time() . '_' . Str::slug($fileName) . '.' . $ext;
        $path       = $value->storeAs($type, $name, 'public');
        return $path;
    }
}
<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class MyHelper
{
  public static function uploadFile($file)
  {
    $destination = "uploads";

    $fileName = time() . '_' . Str::random(10) . '.'  . $file->getClientOriginalExtension();

    $path =  $file->storeAs($destination, $fileName, 'public');

    return $path;
  }

  public static function removeFile($file)
  {
    $filePath = storage_path('app/public/' . $file);

    if (file_exists($filePath)) {
      @unlink($filePath);
    }

    Log::info("File Removed Successfully", [
      "file_path" => $filePath
    ]);
  }
}

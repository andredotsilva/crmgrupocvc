<?php

namespace App\Http\Controllers;

use App\Models\TemporaryFile;
use App\Models\TemporaryFiles;
use Illuminate\Http\Request;

class FilesUploadController extends Controller
{
    public function store(Request $request)
    {

        if ($request->hasFile('filepond')) {

            $file = $request->file('filepond');
            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;

            $file->storeAs('files/tmp/' . $folder, $filename);

            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filename,
                'upload_by' => auth()->id()
            ]);

            return $folder;
        }

        return '';
    }

    public function destroy()
    {
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\TemporaryFile;
use App\Models\TemporaryFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilesUploadController extends Controller
{
    public function store(Request $request)
    {

        if ($request->hasFile('filepond')) {

            $file = $request->file('filepond');
            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;

            //$file->storeAs('files/tmp/' . $folder, $filename);
            $file->storeAs('public/files/' . $folder, $filename);

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
        $temporary = TemporaryFile::where('folder', request()->getContent())->first();

        if ($temporary) {
            Storage::deleteDirectory('files/tmp/' . $temporary->folder);
            $temporary->delete();
        }

        return response()->noContent();
    }
}

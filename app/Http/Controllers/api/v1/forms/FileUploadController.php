<?php


namespace App\Http\Controllers\api\v1\forms;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController
{

    public function create(Request $request)
    {
        $file = $request->file('file');
        $ext = $file->getClientOriginalExtension();
        $fileName = $request['name'] . '.' . $ext;

        if (Storage::putFileAs('/storage/uploads', $file, $fileName)) {
            // Make sure you storage the location of the file somewhere. For example in your database
        }

        // Return a proper response
        return response()->json([
            'success' => true,
        ]);
    }

}

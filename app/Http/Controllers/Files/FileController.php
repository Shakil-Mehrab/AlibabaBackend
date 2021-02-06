<?php

namespace App\Http\Controllers\Files;

use App\Models\Obj;
use App\Models\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index(Request $request)
    {
        $object = Obj::with('children.objectable', 'ancestorsAndSelf.objectable')->where(
                'uuid', $request->get(
                    'uuid',
                    Obj::whereNull('parent_id')->first()->uuid
                )
            )
            ->firstOrFail();

        return view('files.index', [
            'object' => $object,
            'ancestors' => $object->ancestorsAndSelf()->breadthFirst()->get()
        ]);
    }

    public function download(File $file)
    {
        return Storage::disk('public')->download($file->path, $file->name);
    }
}

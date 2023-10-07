<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\File;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{

    public function index(Customer $customer)
    {
        $this->authorize('viewAny', File::class);

        $files = $this->getFilteredQuery(File::class, $customer)
                      ->orderBy('created_at')
                      ->get();

        return view('file.index', compact('customer', 'files'));
    }

    public function store(Customer $customer, Request $request)
    {
        $this->authorize('create', File::class);

        $filePath = '';
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store($customer->slug, 'local');

            $customer->files()->create([
                'file_path' => $filePath,
                'name' => $request->name,
                'extension' => $request->file->extension(),
            ]);
        }



        return redirect('/' . $customer->slug . '/file');
    }

    public function download(Customer $customer, File $file)
    {
        $name = $file->name . '.' . $file->extension;

        return Storage::download($file->file_path, $name);
    }

    public function destroy(Customer $customer, File $file)
    {
        $this->authorize('delete', File::class);

        Storage::delete($file->file_path);
        $file->delete();

        return redirect('/' . $customer->slug . '/file');
    }
}

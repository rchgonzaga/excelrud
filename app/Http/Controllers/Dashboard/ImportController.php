<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImportStoreRequest;
use App\Import;
use App\Jobs\ProcessImport;
use File;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Gate;

class ImportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $imports = $request->user()->imports()->orderBy('created_at', 'desc')->get();
        return view('dashboard.import.index', ['imports' => $imports]);
    }

    public function show($importId)
    {
        $import = Import::find($importId);
        if (Gate::denies('import', $import)) abort(403);

        $products = $import->products()->get();
        return view('dashboard.import.show', ['import' => $import, 'products' => $products]);
    }

    public function create()
    {
        return view('dashboard.import.create');
    }

    public function store(ImportStoreRequest $request)
    {
        $file = $request->file('file');

        // Create Import
        $import = new Import();
        $import->user_id = $request->user()->id;
        $import->filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $import->extension = $file->getClientOriginalExtension();
        $import->size = $file->getClientSize();
        $import->save();

        // Save file
        $folder = public_path() . '/uploads/imports';
        if (!File::exists($folder)) {
            File::makeDirectory($folder, $mode = 0777, true, true);

        }
        $file->move($folder, $import->id . '.' . $import->extension);

        // Dispatch
        $this->dispatch(new ProcessImport($import));

        return redirect()->route('import.index')->with('message', 'Import scheduled');
    }
}

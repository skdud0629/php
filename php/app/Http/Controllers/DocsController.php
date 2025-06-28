<?php

namespace App\Http\Controllers;

use App\Providers\Documentation;
use Illuminate\Http\Request;


//$articles = \App\Models\Article::with('user')->get();


class DocsController extends Controller
{

    protected $docs;
    public function __construct(Documentation $docs)
    {
        $this->docs = $docs;

    }

    public function show($name)
    {
        $doc = $this->docs->get($name);
        if (!$doc) {
            abort(404, "Documentation for {$name} not found.");
        }

        return view('docs.show', ['doc' => $doc]);
    }

    public function index()
    {
        $docs = $this->docs->all();
        return view('docs.index', ['docs' => $docs]);
    }

    public function etag($name)
    {
        $doc = $this->docs->get($name);
        if (!$doc) {
            abort(404, "Documentation for {$name} not found.");
        }

        $etag = md5(json_encode($doc));
        return response()->json($doc)->setEtag($etag);
    }

    public function image($filename)
    {
        $path = storage_path("app/public/docs/{$filename}");
        if (!file_exists($path)) {
            abort(404, "Image {$filename} not found.");
        }

        return response()->file($path);
    }
}

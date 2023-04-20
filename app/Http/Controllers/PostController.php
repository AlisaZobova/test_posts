<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Spatie\ArrayToXml\ArrayToXml;

class PostController extends Controller
{
    public function index(Request $request): \Illuminate\Contracts\View\View
    {
        $perPage = $request->get('per_page') ?: 10;
        $posts = Post::orderBy('publication_date', 'DESC')->paginate($perPage);
        return view('posts.index', compact(['posts']));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('posts.create');
    }

    public function store(PostCreateRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated()['post_info'];

        if ($data->getMimeType() !== 'application/json') {
            $xmlString = simplexml_load_string($data->get());
            $data = json_encode($xmlString);
        } else {
            $data = $data->get();
        }

        $data = json_decode($data, true);
        $data['publication_date'] = now();

        Post::create($data);

        return redirect()->route('posts.index');
    }

    public function export(): \Illuminate\Contracts\View\View
    {
        return view('posts.export');
    }

    public function download(Request $request): \Symfony\Component\HttpFoundation\StreamedResponse
    {
        $fileName = 'posts_from_' . $request->get('start_date') . '_to_' . $request->get('end_date');

        if ($request->get('file_type') === 'xml') {

            $posts = [
                "post" => Post::whereDate('publication_date', '>=', $request->get('start_date'))
                ->whereDate('publication_date', '<=', $request->get('end_date'))
                ->get()->toArray()
            ];

            return response()->streamDownload(
                function () use ($posts) {
                    echo ArrayToXml::convert($posts);
                }, $fileName . '.xml'
            );
        } else {

            $posts = Post::whereDate('publication_date', '>=', $request->get('start_date'))
                ->whereDate('publication_date', '<=', $request->get('end_date'))
                ->get()->toJson(JSON_PRETTY_PRINT);

            return response()->streamDownload(
                function () use ($posts) {
                    echo $posts;
                }, $fileName . '.json'
            );
        }
    }
}

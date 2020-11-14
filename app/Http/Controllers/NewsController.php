<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('news.index',[
            'news' => News::orderBy('updated_at', 'DESC')->paginate(4)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required',
            'image'         => 'required',
            'content'       => 'required'
        ]);

        $news = null;

        if (isset(Auth::user()->id)) {
            $news = News::create([
                'title'     => $request->title,
                'image'     => $this->storeMediaCloudinary($request, 'image'),
                'content'   => $request->content,
                'user_id'   => Auth::user()->id,
            ]);
        }

        activity()
            ->performedOn($news)
            ->causedBy(Auth::user())
            ->log('News created');

        alert()->success('Done', 'News created successfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param News $news
     * @return Response
     */
    public function show(News $news)
    {
        return view('news.show', [
            'new'           => $news,
            'nextNew'       => News::where('id', ($news->id) % count(News::all()) + 1 )->first(),
            'preNew'        => News::where('id', ($news->id - 2) % count(News::all()) + 1)->first(),
            'news'          => News::orderBy('updated_at', 'DESC')->paginate(4),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param News $news
     * @return Response
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title'         => 'required',
            'image'         => 'required',
            'content'       => 'required'
        ]);

        $news->update([
            'title'     => $request->title,
            'image'     => $this->storeMediaCloudinary($request, 'image'),
            'content'   => $request->content
        ]);

        activity()
            ->performedOn($news)
            ->causedBy(Auth::user())
            ->log('News updated');

        alert()->success('Done', 'News updated successfully');

        return redirect()->back();
    }

    public function destroy(News $news)
    {
        //
    }
}

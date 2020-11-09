<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news = News::create([
            'title'     => $request->title,
            'image'     => $this->storeMediaCloudinary($request, 'image'),
            'content'   => $request->content,
            'user_id'   => Auth::user()->id,
        ]);

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
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
    }
}

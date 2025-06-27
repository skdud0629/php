<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


//$articles = \App\Models\Article::with('user')->get();


class ArticlesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /*  public function index()
      {
          //
          return __METHOD__ . " 은 Article 컬렉션을 조회합니다.";
      }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*  public function create()
      {
          return __METHOD__ . " 은 Article 컬렉션을 만들기 위한 폼을 담은 뷰를 반환합니다";
      }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    /* public function store(Request $request)
     {
         return __METHOD__ . " 은 사용자의 입력한 폼 데이터로 새로운 Article 컬렉션을 생성합니다.";
     }*/

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = \App\Models\Article::find($id);
        dd($article);
        return $article->toArray();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return __METHOD__ . " 은 다음 기본키를 가진 모델을 수정하는 폼을 반환합니다." . $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return __METHOD__ . " 은 다음 기본키를 가진 모델을 업데이트합니다: " . $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return __METHOD__ . " 은 다음 기본키를 가진 모델을 삭제합니다." . $id;
    }

    public function index()
    {
        $articles = \App\Models\Article::all();
        dd(view('articles.index', ['articles' => $articles]));
        return view('articles.index', ['articles' => $articles]);
    }

    public function load()
    {
        $articles = \App\Models\Article::get();
        $articles->load('user'); // Eager loading
        return view('articles.index', ['articles' => $articles]);

    }

    public function create()
    {
        return view('articles.create');
    }


    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ];

        $this->validate($request, $rules);
        $article = new \App\Models\Article();
        $article->title = $request->input('title');
        $article->content = $request->input('content');

        return redirect()->route('articles.index')->with('success', 'Article created successfully.');
    }
}

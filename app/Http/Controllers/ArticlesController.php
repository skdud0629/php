<?php

namespace App\Http\Controllers;

class ArticlesController extends Controller
{
    public function index()
    {
        return __METHOD__ . " 은 모든 모델을 조회합니다.";
    }
    public function create()
    {
        return __METHOD__ . " 은 새로운 모델을 생성하는 폼을 반환합니다.";
    }

    public function store(Request $request)
    {
        $article = \App\User::find(1)->articles()->create($request->all());
        event(new \App\Events\ArticlesCreated($article));
        return __METHOD__ . " 은 새로운 모델을 저장합니다: " . json_encode($request->all());
    }
    public function show($id)
    {
        return __METHOD__ . " 은 다음 기본키를 가진 모델을 조회합니다.";
    }

    public function edit($id)
    {
        return __METHOD__ . " 은 다음 기본키를 가진 모델을 수정하는 폼을 반환합니다.";
    }
    public function update(Request $request, $id)
    {
        return __METHOD__ . " 은 다음 기본키를 가진 모델을 업데이트합니다: " . json_encode($request->all());
    }
    public function destroy($id)
    {
        return __METHOD__ . " 은 다음 기본키를 가진 모델을 삭제합니다.";
    }
}
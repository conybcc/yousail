<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\Comment;
use Auth;

class ArticleController extends Controller
{
    /**
     * saveShow
     * @param   $request
     * @param   $id
     * @return
     */
    public function saveShow(Request $request, $id = 0)
    {
        $data = [
            'categories' => Category::all(),
            'title' => '',
            'content' => '',
            'category_id' => 0,
        ];

        if ($id) {
            $article = $this->__checkPermission($id);

            $data['title'] = $article->title;
            $data['content'] = $article->content;
            $data['category_id'] = $article->category_id;
        }

        return view('article/save', $data);
    }

    /**
     * saveSubmit
     * @param   $request
     * @param   $id
     * @return
     */
    public function saveSubmit(Request $request, $id = 0)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required|max:65535',
            'category' => 'required|integer',
        ]);

        if ($id) {
            $article = $this->__checkPermission($id);
        }

        $category = Category::find($request->input('category'));
        if (!$category) {
            throw new \Exception('无效的分类');
        }

        $title = $request->input('title');
        $content = $request->input('content');

        if (!$id) {
            $article = new Article;
            $article->user_id = Auth::user()->id;
        }

        $article->title = $title;
        $article->content = $content;
        $article->category_id = $category->id;

        $article->save();

        return redirect()->route('article.detail', ['id' => $article->id]);
    }

    /**
     * detail
     * @param   $id
     * @param   $request
     * @return
     */
    public function detail($id, Request $request)
    {
        $article = Article::find($id);
        if (!$article) {
            throw new \Exception('文章不存在');
        }

        $data = [
            'article' => $article,
            'isAuthor' => false
        ];

        if ($article->user_id == Auth::user()->id) {
            $data['isAuthor'] = true;
        }

        $category = Category::find($article->category_id);
        $data['category'] = $category->name;
        $data['comments'] = Comment::paginate(2);

        return view('article/detail', $data);
    }

    /**
     * delete
     * @param   $id
     * @return
     */
    public function delete($id)
    {
        $article = $this->__checkPermission($id);
        $article->delete();

        return redirect()->route('home');
    }

    private function __checkPermission($id)
    {
        $article = Article::find($id);

        if (!$article) {
            throw new \Exception('文章不存在');
        }

        if ($article->user_id != Auth::user()->id) {
            throw new \Exception('没有权限编辑');
        }

        return $article;
    }
}

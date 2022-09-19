<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Yajra\Datatables;
use Datatable;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin/article');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Article $article)
    {


        $article_id = $request->article_id;

        if ($article_id == null) {
            $article = new Article;
            $article->heading = $request->heading_text;
            $article->content = $request->content_text;

            $file = $request->file('pdf_file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . rand(100, 999) . '.' .  $extension;
            $file->move('admin-assets/upload/', $filename);
            $article->Pdf_file = $filename;

            $result = $article->save();
        } else {

            if ($request->file('pdf_file') == null) {
                $article = Article::find($request->get('article_id'));
                $article->heading = $request->get('heading_text');
                $article->content = $request->get('content_text');
                $result = $article->save();
            } else {
                $article = Article::find($request->get('article_id'));
                $article->heading = $request->get('heading_text');
                $article->content = $request->get('content_text');
                $file = $request->file('pdf_file');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . rand(100, 999) . '.' .  $extension;
                $file->move('admin-assets/upload/', $filename);
                $article->Pdf_file = $filename;


                $result = $article->save();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
        $article = DB::table('articles')->get();
        return datatables()->of($article)

            ->addColumn('heading', function ($article) {

                return $article->heading;
            })
            ->addColumn('content', function ($article) {
                return $article->content;
            })

            ->addColumn('Pdf_file', function ($article) {
                $url = url('admin-assets/images/file_icon.jpg');

                $pdf = '<img src="' . $url . '" width="50" class="img-thumbnail "></img>';
                return $pdf;
            })


            ->addColumn('actions', function ($article) {

                $id = $article->id;

                $action = '<button type="button" class="btn btn-primary edit_btn" data-toggle="modal" data-target="#add_article_modal" data-id="' . $article->id . ' " >
                   edit
                </button>';
                return $action;
            })



            ->rawColumns(['heading', 'content', 'Pdf_file', 'actions'])->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //

        $id = $request->id;
        $rows = DB::table('articles')->where('id', $id)->first();
        return response()->json($rows);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }

    public function list(Article $article)
    {
        //

        $data['articles'] = DB::table('articles')->get();

        return view('articles-n-updates')->with($data);
    }
}

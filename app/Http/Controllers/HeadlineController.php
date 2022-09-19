<?php

namespace App\Http\Controllers;

use App\Models\Headline;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class HeadlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin/headline');
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
    public function store(Request $request, Headline $headline)
    {
        $headline_id = $request->headline_id;

        if ($headline_id == null) {
            $headline = new Headline;
            $headline->headline = $request->headline_text;
            $headline->position = $request->position;
            $result = $headline->save(); {
            }
        } else {

            $headline = Headline::find($request->get('headline_id'));
            $headline->headline = $request->get('headline_text');
            $headline->position = $request->get('position');
            $result = $headline->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Headline  $headline
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)

    {

        $headline = DB::table('headlines')->get();

        return datatables()->of($headline)

            ->addColumn('headline', function ($headline) {
                return $headline->headline;
            })

            ->addColumn('position', function ($headline) {
                return $headline->position;
            })

            ->addColumn('status', function ($headline) {

                // if ($headline->status == '1') {
                //     $status = '<span class="badge badge-pill badge-light-info">Enable</span>';
                // } elseif ($headline->is_active == '0') {
                //     $status = '<span class="badge badge-pill badge-light-danger">Disabled</span>';
                // }
                // return $status;

                if ($headline->status == '1') {
                    $buttons = ' <a href="javascript:void(0);" data-id="' . $headline->id . '" class="btn btn-sm btn-info deactivate-post-btn" data-toggle="tooltip" data-placement="top" title="Block Detail" style="padding:.700rem .666rem;"> Activete </a>';
                } else {
                    $buttons = ' <a href="javascript:void(0);" data-id="' . $headline->id . '" class="btn btn-sm btn-danger activate-post-btn" data-toggle="tooltip" data-placement="top" title="Block Detail" style="padding:.700rem .666rem;" >Deactivate</i></a>';
                }
                return $buttons;
            })



            ->addColumn('actions', function ($headline) {

                $id = $headline->id;

                $button = '<button type="button" class="btn btn-primary edit_btn" data-toggle="modal" data-target="#add_headline_modal" data-id="' . $headline->id . ' " >
                   edit
                </button>';


                return $button;
            })

            ->rawColumns(['headline', 'position', 'status', 'actions'])->make(true);


        // return view('admin/author_index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Headline  $headline
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //

        $id = $request->id;
        $rows = DB::table('Headlines')->where('id', $id)->first();
        return response()->json($rows);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Headline  $headline
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Headline $headline)
    {
        //
        $headline = Headline::find($request->get('id'));
        $headline->headline = $request->get('headline_text');
        $headline->position = $request->get('position');
        $result = $headline->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Headline  $headline
     * @return \Illuminate\Http\Response
     */
    public function destroy(Headline $headline)
    {
        //
    }

    public function list()
    {
        $data['headlines'] = DB::table('headlines')->get();
        //  dd($data['headlines']);
        return view('home')->with($data);
    }

    public function deactivate(Request $request)
    { {
            $id = $request->id;
            $data = [
                'status' => "0",
            ];
            $query =  DB::table('headlines')->where('id', $id)->update($data);
            if ($query > 0) {
                return response()->json(['error' => false, 'message' => 'Heading Deactivated successfully !']);
            } else {
                return response()->json(['error' => true, 'message' => 'Something went wrong !',]);
            }
        }
    }

    public function activate(Request $request)
    {
        $id = $request->id;
        $data = [
            'status' => "1",
        ];
        $query =  DB::table('headlines')->where('id', $id)->update($data);
        if ($query > 0) {
            return response()->json(['error' => false, 'message' => 'Heading Activated successfully !']);
        } else {
            return response()->json(['error' => true, 'message' => 'Something went wrong !',]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Legal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Yajra\Datatables;
use Datatable;

class LegalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, Legal $legal)
    {
        $legal_id = $request->legal_id;


        if ($legal_id == null) {
            $legal = new Legal;
            $legal->content = $request->content_text;
            $legal->position = $request->position;
            $legal->subject = $request->subject;
            $result = $legal->save();
        } else {

            $legal = Legal::find($request->get('legal_id'));
            $legal->content = $request->get('content_text');
            $legal->position = $request->get('position');
            $legal->subject = $request->get('subject');
            $result = $legal->save();
        }
    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Legal  $legal
     * @return \Illuminate\Http\Response
     */
    public function show(Legal $legal)
    {

        //

        $legal = DB::table('legals')->get();
        return datatables()->of($legal)


            ->addColumn('content', function ($legal) {
                return $legal->content;
            })
            ->addColumn('position', function ($legal) {
                return $legal->position;
            })
            ->addColumn('subject', function ($legal) {
                return $legal->subject;
            })
            ->addColumn('status', function ($legal) {
                if ($legal->status == '1') {
                    $buttons = ' <a href="javascript:void(0);" data-id="' . $legal->id . '" class="btn btn-sm btn-info deactivate-post-btn" data-toggle="tooltip" data-placement="top" title="Block Detail" style="padding:.700rem .666rem;"> Activete </a>';
                } else {
                    $buttons = ' <a href="javascript:void(0);" data-id="' . $legal->id . '" class="btn btn-sm btn-danger activate-post-btn" data-toggle="tooltip" data-placement="top" title="Block Detail" style="padding:.700rem .666rem;" >Deactivate</i></a>';
                }
                return $buttons;
            })

            ->addColumn('actions', function ($legal) {

                $id = $legal->id;

                $action = '<button type="button" class="btn btn-primary edit_btn" data-toggle="modal" data-target="#add_legal_modal" data-id="' . $legal->id . ' " >
                   edit
                </button>';
                return $action;
            })
            ->rawColumns(['content', 'position', 'subject', 'status', 'actions'])->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Legal  $legal
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Legal $legal)
    {
        //
        $id = $request->id;
        $rows = DB::table('legals')->where('id', $id)->first();
        return response()->json($rows);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Legal  $legal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Legal $legal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Legal  $legal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Legal $legal)
    {
        //
    }
    public function list(Legal $legal)
    {
        //

        $data['legals'] = DB::table('legals')->where('status', '1')->get();

        return view('case-studies-2-insights')->with($data);
    }


    public function deactivate(Request $request)
    { {
            $id = $request->id;
            $data = [
                'status' => "0",
            ];
            $query =  DB::table('legals')->where('id', $id)->update($data);
            if ($query > 0) {
                return response()->json(['error' => false, 'message' => 'Heading Deactivated successfully !']);
            } else {
                return response()->json(['error' => true, 'message' => 'Something went wrong !',]);
            }
        }
    }

    public function activate(Request $request)
    { {
            $id = $request->id;
            $data = [
                'status' => "1",
            ];
            $query =  DB::table('legals')->where('id', $id)->update($data);
            if ($query > 0) {
                return response()->json(['error' => false, 'message' => 'Heading Deactivated successfully !']);
            } else {
                return response()->json(['error' => true, 'message' => 'Something went wrong !',]);
            }
        }
    }
}

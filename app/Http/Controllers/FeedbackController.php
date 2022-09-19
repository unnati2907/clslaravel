<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin/feedback-report');
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
    public function store(Request $request)
    {
        //
        $feedback = new Feedback;
        $feedback->name = $request->name;
        $feedback->email = $request->email;
        $feedback->phone = $request->phone;

        $feedback->feed = $request->note;

        $result = $feedback->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        //
        $i = 0;
        $feedback = DB::table('feedback')->get();

        return datatables()->of($feedback)

            ->addColumn('id', function ($feedback) {
                $i = 0;

                return $i;
            })

            ->addColumn('name', function ($feedback) {
                return $feedback->name;
            })

            ->addColumn('email', function ($feedback) {
                return $feedback->email;
            })
            ->addColumn('phone', function ($feedback) {
                return $feedback->phone;
            })

            ->addColumn('feed', function ($feedback) {
                return $feedback->feed;
            })

            ->addColumn('created_at', function ($feedback) {

                $created_date = $feedback->created_at;

                $date = date("Y-m-d", strtotime($created_date));

                return $date;
            })




            ->rawColumns(['id', 'name', 'email', 'phone', 'feed', 'created_at'])->make(true);

        return view('contact-report');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        //
    }
}

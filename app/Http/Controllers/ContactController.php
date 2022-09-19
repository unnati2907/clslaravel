<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin/contact-report');
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
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->contact_sub = $request->subject;
        $contact->description = $request->note;

        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . rand(100, 999) . '.' .  $extension;
        $file->move('admin-assets/upload/', $filename);

        $contact->file = $filename;

        $result = $contact->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
        $i = 0;
        $contact = DB::table('contacts')->get();

        return datatables()->of($contact)

            ->addColumn('id', function ($contact) {

                return 1;
            })

            ->addColumn('name', function ($contact) {
                return $contact->name;
            })

            ->addColumn('email', function ($contact) {
                return $contact->email;
            })
            ->addColumn('phone', function ($contact) {
                return $contact->phone;
            })

            ->addColumn('contact_sub', function ($contact) {
                return $contact->contact_sub;
            })
            ->addColumn('file', function ($article) {
                $url = url('admin-assets/upload/') . '/' . $article->file;

                $pdf = '<img src="' . $url . '" width="50" class="img-thumbnail "></img>';
                return $pdf;
            })
            ->addColumn('description', function ($contact) {
                return $contact->description;
            })
            ->addColumn('created_at', function ($contact) {

                $created_date = $contact->created_at;

                $date = date("Y-m-d", strtotime($created_date));

                return $date;
            })




            ->rawColumns(['name', 'email', 'phone', 'contact_sub', 'file', 'description', 'created_at'])->make(true);

        return view('contact-report');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Amranidev\Ajaxis\Ajaxis;
use App\Contact;
use Request;
use URL;
class ContactMtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('ContactMaterialize',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $api = '/ContactMt/store/';
        $Ajaxis = Ajaxis::MtCreateFormModal([
        ['type' => 'text' , 'value' => '', 'name' => 'firstname' , 'key' => 'First Name :'],
        ['type' => 'text' , 'value' => '', 'name' => 'lastname' , 'key' => 'Last Name :'],
        ['type' => 'date' , 'value' => '', 'name' => 'date' , 'key' => 'Date :'],
        ['type' => 'text' , 'value' => '', 'name' => 'phone' , 'key' => 'Phone :']
        ],$api);

        if(Request::ajax()){
            return $Ajaxis;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = Request::except('_token');
        $contact = new Contact();
        $contact->firstname = $input['firstname'];
        $contact->lastname = $input['lastname'];
        $contact->date = $input['date'];
        $contact->phone = $input['phone'];
        $contact->save();

        return URL::To('ContactMt');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

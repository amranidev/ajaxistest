<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
//use App\Http\Requests;
use App\Http\Controllers\Controller;
use Amranidev\Ajaxis\Ajaxis;
use App\Contact;
use URL;
use Request;
class ContactBtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('ContactBootstrap',compact('contacts'));
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
        $contact = Contact::FindOrFail($id);
        $api = '/ContactBt/'.$id.'/update/';
        $Ajaxis = Ajaxis::BtEditFormModal([
        ['type' => 'text' , 'value' => $contact->firstname, 'name' => 'firstname' , 'key' => 'First Name :'],
        ['type' => 'text' , 'value' => $contact->lastname, 'name' => 'lastname' , 'key' => 'Last Name :'],
        ['type' => 'date' , 'value' => $contact->date, 'name' => 'date' , 'key' => 'Date :'],
        ['type' => 'text' , 'value' => $contact->phone, 'name' => 'phone' , 'key' => 'Phone :']
        ],$api);

        if(Request::ajax()){
            return $Ajaxis;
        }

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
        $input = Request::except('_token');
        $contact = Contact::FindOrFail($id);
        $contact->firstname = $input['firstname'];
        $contact->lastname = $input['lastname'];
        $contact->date = $input['date'];
        $contact->phone = $input['phone'];
        $contact->save();

        return URL::To('ContactBt');

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

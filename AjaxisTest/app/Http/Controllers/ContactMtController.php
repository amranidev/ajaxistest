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
        $string = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
        $contact = Contact::FindOrFail($id);
        $Ajaxis = Ajaxis::MtDisplay([
            ['key' => 'FirstName','value' => $contact->firstname],
            ['key' => 'LastName','value' => $contact->lastname],
            ['key' => 'Date','value' => $contact->date],
            ['key' => 'Phone','value' => $contact->phone],
            ['key' => 'info','value' => $string]
            ]);

        if(Request::ajax()){
            return $Ajaxis;
        }
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
        $api = '/ContactMt/'.$id.'/update/';
        $Ajaxis = Ajaxis::MtEditFormModal([
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

        return URL::To('ContactMt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::FindOrFail($id);
        $contact->delete();
        return URL::to('ContactMt');
    }
 
    /**
     * Deleting confirmation message
     * 
     * @param int $id
     * @return \Amranidev\Ajaxis\Ajaxis
     */     
    public function delete($id){
      
    $api = '/ContactMt/'.$id.'/destroy';
    $Ajaxis = Ajaxis::MtDeleting('Delete','Are you sure to delete this contact ?',$api);      
      
      if(Request::ajax()){
        return $Ajaxis;
      }  
    }
}

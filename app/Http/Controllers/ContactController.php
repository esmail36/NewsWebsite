<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Dotenv\Validator;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::orderBy('id' , 'asc')->paginate(4);
        return response()->view('cms.contacts.index' , compact('contacts'));
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
        $validator = Validator($request->all() , [

        ],[

        ]);

        if(! $validator->fails()){
            $contacts = new Contact();
            $contacts->full_name = $request->get('full_name');
            $contacts->phone = $request->get('phone');
            $contacts->email = $request->get('email');
            $contacts->message = $request->get('message');

            $isSaved = $contacts->save();

            if($isSaved){
                return response()->json(['icon' => 'success' , 'title' => 'Send Successfully'] , 200);
            }

        }
        else{
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);
        }
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
    public function destroy($id)
    {
        $contacts = Contact::destroy($id);
        return response()->json(['icon' => 'success' , 'title' => 'Deleted Successfully'] , 200);
    }
}

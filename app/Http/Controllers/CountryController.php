<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $countries = Country::all();
        $countries = Country::withCount('cities')->orderBy('id' , 'asc')->paginate(4);
        $this->authorize('viewAny' , Country::class);
        return response()->view('cms.country.index' , compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create' , Country::class);
        return response()->view('cms.country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'country_name' => 'required|string|min:3|max:20',
            'code' => 'required|string|min:3',
        ] , [
            'country_name.required' => 'لا يقبل القيمة الفارغة',
            'code.required' => 'لا يقبل القيمة الفارغة',
            'country_name.min' => 'لا يقبل قيمة اقل من 3',
            'code.min' => 'لا يقبل قيمة اقل من 3',
            'country_name.max' => 'لا يقبل قيمة اكبر من 20',
        ]);
        $countries = new Country();
        $countries->country_name = $request->get('country_name');
        $countries->code = $request->get('code');

        $isSaved = $countries->save();

        session()->flash('message' , $isSaved ? "Created Successfully" : "Created Failed" );
        return(redirect()->back());
        // return $isSaved ? "Created Successfully" : "Created Failed";

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
        $countries = Country::findOrFail($id);
        $this->authorize('update' , Country::class);
        return response()->view('cms.country.edit' , compact('countries'));
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
        $request->validate([
            'country_name' => 'required|string|min:3|max:20',
            'code' => 'required|string|min:3',
        ] , [
            'country_name.required' => 'لا يقبل القيمة الفارغة',
            'code.required' => 'لا يقبل القيمة الفارغة',
            'country_name.min' => 'لا يقبل قيمة اقل من 3',
            'code.min' => 'لا يقبل قيمة اقل من 3',
            'country_name.max' => 'لا يقبل قيمة اكبر من 20',
        ]);

        $countries = Country::findOrFail($id);
        $countries->country_name = $request->get('country_name');
        $countries->code = $request->get('code');

        $isSaved = $countries->save();

        session()->flash('message' , $isSaved ? "Updated Successfully" : "Updated Failed" );
        // return(redirect()->back());
        return(redirect()->route('countries.index'));
        // return $isSaved ? "Created Successfully" : "Created Failed";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $countries = Country::destroy($id);
        $this->authorize('delete' , Country::class);
        return(redirect()->back());

    }
}

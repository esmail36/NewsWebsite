<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Dotenv\Validator;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('id' , 'asc')->paginate(5);
        return response()->view('cms.slider.index' , compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.slider.create');
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
            'image' => 'required',
            'main_title' => 'required|min:5|string',
            'sub_title' => 'required|min:5|string'
        ],[
            'image.required' => 'Must Add An Image',
            'main_title.required' => 'Must Enter A Title',
            'sub_title.required' => 'Must Enter A Sub Title',
        ]);

        if(! $validator->fails()){
            $sliders = new Slider();

            if(request()->hasFile('image')){
                $image = $request->file('image');
                $imageName = time() . 'image' . $image->getClientOriginalExtension();
                $image->move('storage/images/slider' , $imageName);
                $sliders->image = $imageName;
            }

            $sliders->main_title = $request->get('main_title');
            $sliders->sub_title = $request->get('sub_title');

            $isSaved = $sliders->save();

            if($isSaved){
                return response()->json(['icon' => 'success' , 'title' => 'Slider Created Successfully'] , 200);
            }
        }
        else{
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sliders = Slider::findOrFail($id);
        return response()->view('cms.slider.edit' , compact('sliders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $validator = Validator($request->all() , [
            'image' => 'required',
            'main_title' => 'required|min:5|string',
            'sub_title' => 'required|min:5|string'
        ],[
            'image.required' => 'Must Add An Image',
            'main_title.required' => 'Must Enter A Title',
            'sub_title.required' => 'Must Enter A Sub Title',
        ]);

        if(! $validator->fails()){
            $sliders = Slider::findOrFail($id);
            $sliders->main_title = $request->get('main_title');
            $sliders->sub_title = $request->get('sub_title');

            if(request()->hasFile('image')){
                $image = $request->file('image');
                $imageName = time() . 'image' . $image->getClientOriginalExtension();
                $image->move('storage/images/slider' , $imageName);
                $sliders->image = $imageName;
            }

            
            $isUpdated = $sliders->save();
            return ['redirect' => route('sliders.index')];
            
            if($isUpdated){
                return response()->json(['icon' => 'success' , 'title' => 'Slider Updated Successfully'] , 200);
            }
        }
        else{
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sliders = Slider::destroy($id);
        return response()->json(['icon' => 'success' , 'title' => 'Slider Deleted Successfully'] , 200);
    }
}

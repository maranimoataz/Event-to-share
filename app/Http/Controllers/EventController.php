<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Illuminate\Support\Facades\Validator;
use App\Traits\ImageUploader;


class EventController extends Controller
{
    public function index(){
        return Event::all();
    }

    public function show($id) {
        return Event::find($id);
    }

    use ImageUploader;
    public function store(Request $request) {

        $validator = Validator::make($request->all() , [     
            'title'=>'required|string|max:255',
            'type'=>'required|string|max:255',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'location'=>'string|max:255',
            'description'=>'required|string|max:255',
            'date'=>'required|date',
            'start_time'=>'required|date_format:H:i',
            'end_time'=>'required|date_format:H:i',
            'email'=> 'required|string|email|max:255',
            'first_name'=>'required|string|max:255',
            'last_name'=> 'required|string|max:255',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);        
        }

        $event = new Event;
          $event->title = $request->title;
          $event->type = $request->type;
          $event->image = $request->image;
          $event->location = $request->location;
          $event->description = $request->description;
          $event->date = $request->date;
          $event->start_time = $request->start_time;
          $event->end_time = $request->end_time;
          $event->email = $request->email;
          $event->first_name = $request->first_name;
          $event->last_name = $request->last_name;

        if($event->image)
        {
            try{
                $filePath = $this->UserImageUpload($event->image);
                $event->image = $filePath;
                $event->save();
                return redirect()->back();
            }
            catch(Exception $e) {
                "erreur";
            }
        }
        return response()->json('created');
    }

    public function update(Request $request, $id) {
        $event = Event::findOrFail($id);
        $event->update($request->all());

        return $event;
    }

    public function delete(Request $request, $id){
        $event = Event::findOrFail($id);
        $event->delete();

        return 204;
    }
}

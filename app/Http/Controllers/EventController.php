<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Illuminate\Support\Facades\Validator;
use App\Traits\ImageUploader;
use DB;

class EventController extends Controller
{
    public function index(){
        $event = Event::orderBy('created_at','desc')->paginate(3);
        return response()->json($event);
    }

    public function show($id) {
        return Event::find($id);
    }

    use ImageUploader;
    public function store(Request $request) {

        $validator = Validator::make($request->all() , [     
            'title'=>'required|string|max:255',
            'type'=>'required|string|max:255',
            'location'=>'string|max:255',
            'description'=>'required|string|max:255',
            'date'=>'required|date',
            'start_time'=>'required|date_format:H:i',
            'end_time'=>'required|date_format:H:i',
            'animateur'=>'required|string|max:255',
            'email_animateur'=> 'required|string|email|max:255',
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
          $event->location = $request->location;
          $event->description = $request->description;
          $event->date = $request->date;
          $event->start_time = $request->start_time;
          $event->end_time = $request->end_time;
          $event->animateur = $request->animateur;
          $event->email_animateur = $request->email_animateur;
          $event->save();

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
    public function search(Request $request) {
        $qry = $request->qry;
        return $event = DB::table('events')
        ->where('title', 'like', '%'. $qry . '%')
        ->get();
    }
}

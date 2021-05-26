<?php

namespace App\Http\Controllers;

use App\Models\Fields;
use App\Models\EventType;
use Illuminate\Http\Request;
use Session;

class EventTypeController extends Controller
{
    protected $fields, $store_route, $store_method, $update_method, $event_types;

    public function __construct()
    {
      $this->fields = Fields::all();
      $this->event_types = EventType::all();
      $this->store_route = route('event_types.store');
      $this->store_method = 'POST';
      $this->update_method = 'PUT';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('event_types', ['event_types' => $this->event_types, 'fields' => $this->fields]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fields = Fields::all();
        return view('add_edit_event')->with(['fields' => $this->fields, 'route' => $this->store_route, 'method' => $this->store_method]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:event_types',
            'fields' => 'required',
        ]);
        
        $event = new EventType;
        $event->name = $request->name;
        $event->fields = $request->fields;
        $event->save();

        Session::flash('message', ['Insertion Successful!', 'Event Type Stored Successfully!', 'success']);
        return redirect()->route('event_types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EventType  $eventType
     * @return \Illuminate\Http\Response
     */
    public function show(EventType $eventType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EventType  $eventType
     * @return \Illuminate\Http\Response
     */
    public function edit(EventType $eventType)
    {
        $old = $eventType;
        $update_route = route('event_types.update', $eventType);
        return view('add_edit_event', ['fields' => $this->fields, 'route' => $update_route, 'method' => $this->update_method, 'old' => $old]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EventType  $eventType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventType $eventType)
    {
        $eventType->name = $request->name;
        $eventType->fields = $request->fields;
        $eventType->save();

        Session::flash('message', ['Update Successful!', 'Event Type Updated Successfully!', 'success']);
        return redirect()->route('event_types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventType  $eventType
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventType $eventType)
    {
        $eventType->delete();
        Session::flash('message', ['Deletion Successful!', 'Event Type Deleted Successfully!', 'success']);
        return redirect()->route('event_types.index');
    }
}

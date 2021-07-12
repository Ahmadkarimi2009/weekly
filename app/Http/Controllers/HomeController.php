<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\EventType;
use App\Http\Traits\CommonFunctions;

class HomeController extends Controller
{
    use CommonFunctions;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $provinces = Province::all();
        $event_types = EventType::all();
        $years = $this->get_list_of_years();
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        return view('home', compact('provinces', 'event_types', 'months', 'years'));
    }
}

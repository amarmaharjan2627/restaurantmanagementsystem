<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Item;
use App\Slider;
use App\Reservation;
use App\Contact;

class AdminController extends Controller
{
    public function index()
    {
    	$categoryCount = Category::count();
    	$itemCount = Item::count();
    	$sliderCount = Slider::count();
    	$reservations = Reservation::where('status',false)->get();
    	$contactCount = Contact::count();
    	
    	return view('admin.dashboard', compact('categoryCount','itemCount','sliderCount','reservations','contactCount'));
    }
}

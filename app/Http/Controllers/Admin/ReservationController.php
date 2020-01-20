<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ReservationConfirmed;

class ReservationController extends Controller
{
    public function index()
    {
    	$reservations = Reservation::all();
    	return view('admin.reservation.index', compact('reservations'));
    }
    public function status($id)
    {
    	$reservation = Reservation::find($id);
    	$reservation->status = true;
    	$reservation->save();
        Notification::route('mail', $reservation->email)
            ->notify(new ReservationConfirmed());

    	Toastr::success('Reservation successfully confirmed', 'Success',["positionClass" => "toast-top-right"]);
    	return redirect()->back();
    }
    public function destory($id)
    {
    	$reservation = Reservation::find($id)->delete();
    	Toastr::success('Reservation request sent successfully. we will confirm to you shortly', 'Success',["positionClass" => "toast-top-right"]);
    	return redirect()->back();
    }
}

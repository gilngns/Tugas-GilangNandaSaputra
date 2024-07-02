<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Reservation;
use App\Models\Services;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        $branches = Branch::all();
        $services = Services::all();
        return view('pages.reservation', compact('reservations', 'branches', 'services'));
    }

    public function store(Request $request)
    {
        // dd($request->all());


        $request->validate([
            'name' => 'required|string',
            'branch_id' => 'required|exists:branch,id',
            'service_id' => 'required|exists:services,id',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);
        $reservations = $request->all();
        Reservation::create($reservations);


        return redirect()->route('reservation')->with('success', 'Reservation created successfully');
    }


    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        $branches = Branch::all();
        $services = Services::all();
        return view('pages.edit_reservation', compact('reservation', 'branches', 'services'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'branch_id' => 'required|exists:branch,id',
            'service_id' => 'required|exists:services,id',
            'start_time' => 'required',
            'end_time' => 'required',
            'status' => 'required|string|in:process,finish,cancel',
        ]);

        $reservation = Reservation::findOrFail($id);
        $reservation->update($request->all());

        return redirect()->route('reservation')->with('success', 'Reservation updated successfully');
    }

    public function destroy($id)
    {
        Reservation::destroy($id);
        return redirect()->route('reservation')->with('success', 'Reservation deleted successfully');
    }
}
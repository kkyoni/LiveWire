<?php

namespace App\Http\Livewire\Cities;

use Livewire\Component;
use App\Models\City;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Notify;
use Yajra\DataTables\DataTables;
use Auth;
use App\Helpers\Helper;
use App\Models\Country;
use App\Models\Federalstate;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use RuntimeException;

class From extends Component
{
    public $currentSection = 1;
    public $cities, $cities_id, $plz, $bezeichnung, $bundesland_id, $land_id;

    public function mount()
    {
        if (!empty($this->cities)) {
            $cities = City::where('id', $this->cities->id)->first();
            $this->bundesland_list = Federalstate::pluck('bezeichnung', 'id');
            $this->land_list = Country::pluck('Bezeichnung', 'id');
            $this->cities_id = $cities->id;
            $this->plz = $cities->plz;
            $this->bezeichnung = $cities->bezeichnung;
            $this->bundesland_id = $cities->bundesland_id;
            $this->land_id = $cities->land_id;
        }
    }

    public function render()
    {
        $this->bundesland_list = Federalstate::pluck('bezeichnung', 'id');
        $this->land_list = Country::pluck('Bezeichnung', 'id');
        return view('pages.cities.from');
    }

    public function step1()
    {
        $customMessages = [
            'plz.required'             => 'text ist nötig',
            'bezeichnung.required'     => 'bezeichnung ist nötig',
            'land_id.required'         => 'land ist nötig',
        ];
        $validatedData = $this->validate([
            'plz' => 'required',
            'bezeichnung' => 'required',
            'land_id' => 'required',
        ], $customMessages);
        try {
            City::updateOrCreate(['id' => $this->cities_id], [
                'plz' => $this->plz,
                'bezeichnung' => $this->bezeichnung,
                'bundesland_id' => $this->bundesland_id,
                'land_id' => $this->land_id,
            ]);
            if (!empty($this->cities_id)) {
                $message = 'Städte aktualisiert';
            } else {
                $message = 'Städte erstellt';
            }
            Notify::success($message, $title = "Erfolgreich..!");
            return redirect()->route('cities.index');
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }
}

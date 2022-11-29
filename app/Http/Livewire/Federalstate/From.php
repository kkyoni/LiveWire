<?php

namespace App\Http\Livewire\Federalstate;

use App\Models\Federalstate;
use App\Models\Country;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Note;
use Notify;
use Yajra\DataTables\DataTables;
use Auth;
use App\Helpers\Helper;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use RuntimeException;

class From extends Component
{
    public $federalstate, $federalstate_id, $bezeichnung, $land_id;

    public function mount()
    {
        if (!empty($this->federalstate)) {
            $federalstate = Federalstate::where('id', $this->federalstate->id)->first();
            $this->land_list = Country::pluck('Bezeichnung', 'id');
            $this->federalstate_id = $federalstate->id;
            $this->bezeichnung = $federalstate->bezeichnung;
            $this->land_id = $federalstate->land_id;
        }
    }

    public function render()
    {
        $this->land_list = Country::pluck('Bezeichnung', 'id');
        return view('pages.federalstate.from');
    }

    public function final()
    {
        $customMessages = [
            'bezeichnung.required'             => 'bezeichnung ist nötig',
            'land_id.required'                 => 'land ist nötig',
        ];
        $validatedData = $this->validate([
            'bezeichnung' => 'required',
            'land_id'  => 'required',

        ], $customMessages);
        try {
            Federalstate::updateOrCreate(['id' => $this->federalstate_id], [
                'bezeichnung' => $this->bezeichnung,
                'land_id' => $this->land_id,
            ]);
            Notify::success('Bundesland erstellt', $title = "Erfolgreich..!");
            return redirect()->route('federalstate.index');
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }
}

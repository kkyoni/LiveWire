<?php

namespace App\Http\Livewire\Salutation;

use App\Models\Salutation;
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
    public $salutation, $salutation_id, $bezeichnung;

    public function mount()
    {
        if (!empty($this->salutation)) {
            $salutation = Salutation::where('id', $this->salutation->id)->first();
            $this->salutation_id = $salutation->id;
            $this->bezeichnung = $salutation->bezeichnung;
        }
    }

    public function render()
    {
        return view('pages.salutation.from');
    }

    public function final()
    {
        $customMessages = [
            'bezeichnung.required'             => 'bezeichnung ist nötig',
        ];
        $validatedData = $this->validate([
            'bezeichnung' => 'required',
        ], $customMessages);
        try {
            Salutation::updateOrCreate(['id' => $this->salutation_id], [
                'bezeichnung' => $this->bezeichnung,
            ]);
            Notify::success('Anrede erstellt', $title = "Erfolgreich..!");
            return redirect()->route('salutation.index');
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }
}

<?php

namespace App\Http\Livewire\Statusperson;

use App\Models\Statusperson;
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
    public $statusperson, $statusperson_id, $bezeichnung;

    public function mount()
    {
        if (!empty($this->statusperson)) {
            $statusperson = Statusperson::where('id', $this->statusperson->id)->first();
            $this->statusperson_id = $statusperson->id;
            $this->bezeichnung = $statusperson->bezeichnung;
        }
    }

    public function render()
    {
        return view('pages.statusperson.from');
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
            Statusperson::updateOrCreate(['id' => $this->statusperson_id], [
                'bezeichnung' => $this->bezeichnung,
            ]);
            Notify::success('Statusperson erstellt', $title = "Erfolgreich..!");
            return redirect()->route('statusperson.index');
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }
}

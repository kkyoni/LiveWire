<?php

namespace App\Http\Livewire\Functions;

use App\Models\Functions;
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
    public $functions, $functions_id, $bezeichnung;

    public function mount()
    {
        if (!empty($this->functions)) {
            $functions = Functions::where('id', $this->functions->id)->first();
            $this->functions_id = $functions->id;
            $this->bezeichnung = $functions->bezeichnung;
        }
    }

    public function render()
    {
        return view('pages.functions.from');
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
            Functions::updateOrCreate(['id' => $this->functions_id], [
                'bezeichnung' => $this->bezeichnung,
            ]);
            Notify::success('Funktionen erstellt', $title = "Erfolgreich..!");
            return redirect()->route('functions.index');
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }
}

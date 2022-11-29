<?php

namespace App\Http\Livewire\Titleprefix;

use App\Models\Titleprefix;
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
    public $titleprefix, $titleprefix_id, $bezeichnung;

    public function mount()
    {
        if (!empty($this->titleprefix)) {
            $titleprefix = Titleprefix::where('id', $this->titleprefix->id)->first();
            $this->titleprefix_id = $titleprefix->id;
            $this->bezeichnung = $titleprefix->bezeichnung;
        }
    }

    public function render()
    {
        return view('pages.titleprefix.from');
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
            Titleprefix::updateOrCreate(['id' => $this->titleprefix_id], [
                'bezeichnung' => $this->bezeichnung,
            ]);
            Notify::success('Titelpräfix Erstellt', $title = "Erfolgreich..!");
            return redirect()->route('titleprefix.index');
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }
}

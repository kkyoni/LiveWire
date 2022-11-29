<?php

namespace App\Http\Livewire\Titlesuffix;

use App\Models\Titlesuffix;
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
    public $titlesuffix, $titlesuffix_id, $bezeichnung;

    public function mount()
    {
        if (!empty($this->titlesuffix)) {
            $titlesuffix = Titlesuffix::where('id', $this->titlesuffix->id)->first();
            $this->titlesuffix_id = $titlesuffix->id;
            $this->bezeichnung = $titlesuffix->bezeichnung;
        }
    }

    public function render()
    {
        return view('pages.titlesuffix.from');
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
            Titlesuffix::updateOrCreate(['id' => $this->titlesuffix_id], [
                'bezeichnung' => $this->bezeichnung,
            ]);
            Notify::success('Titelsuffix erstellt', $title = "Erfolgreich..!");
            return redirect()->route('titlesuffix.index');
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }
}

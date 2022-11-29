<?php

namespace App\Http\Livewire\Titleawarded;

use App\Models\Titleawarded;
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
    public $titleawarded, $titleawarded_id, $bezeichnung;

    public function mount()
    {
        if (!empty($this->titleawarded)) {
            $titleawarded = Titleawarded::where('id', $this->titleawarded->id)->first();
            $this->titleawarded_id = $titleawarded->id;
            $this->bezeichnung = $titleawarded->bezeichnung;
        }
    }

    public function render()
    {
        return view('pages.titleawarded.from');
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
            Titleawarded::updateOrCreate(['id' => $this->titleawarded_id], [
                'bezeichnung' => $this->bezeichnung,
            ]);
            Notify::success('Verliehener Titel erstellt', $title = "Erfolgreich..!");
            return redirect()->route('titleawarded.index');
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }
}

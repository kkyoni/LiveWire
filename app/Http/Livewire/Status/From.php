<?php

namespace App\Http\Livewire\Status;

use App\Models\Status;
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
    public $status, $status_id, $bezeichnung;

    public function mount()
    {
        if (!empty($this->status)) {
            $status = Status::where('id', $this->status->id)->first();
            $this->status_id = $status->id;
            $this->bezeichnung = $status->bezeichnung;
        }
    }

    public function render()
    {
        return view('pages.status.from');
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
            Status::updateOrCreate(['id' => $this->status_id], [
                'bezeichnung' => $this->bezeichnung,
            ]);
            Notify::success('Zustand erstellt', $title = "Erfolgreich..!");
            return redirect()->route('status.index');
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }
}

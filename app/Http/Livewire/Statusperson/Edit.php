<?php

namespace App\Http\Livewire\Statusperson;

use Livewire\Component;
use Notify;
use Yajra\DataTables\DataTables;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Helper;
use App\Models\Statusperson;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use RuntimeException;

class Edit extends Component
{
    protected $statusperson;
    public $bezeichnung, $statusperson_id;
    public $updateMode = false;
    public $editStatuspersonIndex = null;

    public function render()
    {
        return view('pages.statusperson.edit', [
            'statusperson' => Statusperson::orderBy('updated_at', 'DESC')->paginate(10),
        ]);
    }

    private function resetInputFields()
    {
        $this->bezeichnung = '';
    }

    public function edit($id)
    {
        $statusperson = Statusperson::findOrFail($id);
        $this->statusperson_id = $id;
        $this->bezeichnung = $statusperson->bezeichnung;
        $this->editStatuspersonIndex = $id;
        $this->updateMode = true;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $customMessages = [
            'bezeichnung.required'             => 'bezeichnung ist nötig',
        ];
        $validatedDate = $this->validate([
            'bezeichnung' => 'required',
        ], $customMessages);
        try {
            $statusperson = Statusperson::find($this->statusperson_id);
            $statusperson->update([
                'bezeichnung' => $this->bezeichnung,
            ]);
            $this->updateMode = false;
            $this->editStatuspersonIndex = null;
            Notify::success('Status Person aktualisiert', $title = "Erfolgreich..!");
            return redirect()->route('statusperson.index');
            $this->resetInputFields();
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }
}

<?php

namespace App\Http\Livewire\Federalstate;

use Livewire\Component;
use Notify;
use Yajra\DataTables\DataTables;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Helper;
use App\Models\Federalstate;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use RuntimeException;

class Edit extends Component
{
    protected $federalstate;
    public $bezeichnung, $federalstate_id;
    public $updateMode = false;
    public $editFederalstateIndex = null;

    public function render()
    {
        return view('pages.federalstate.edit', [
            'federalstate' => Federalstate::orderBy('updated_at', 'DESC')->paginate(10),
        ]);
    }

    private function resetInputFields()
    {
        $this->bezeichnung = '';
    }

    public function edit($id)
    {
        $federalstate = Federalstate::findOrFail($id);
        $this->federalstate_id = $id;
        $this->bezeichnung = $federalstate->bezeichnung;
        $this->editFederalstateIndex = $id;
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
            $federalstate = Federalstate::find($this->federalstate_id);
            $federalstate->update([
                'bezeichnung' => $this->bezeichnung,
            ]);
            $this->updateMode = false;
            $this->editFederalstateIndex = null;
            Notify::success('Bundesland Aktualisiert', $title = "Erfolgreich..!");
            return redirect()->route('federalstate.index');
            $this->resetInputFields();
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }
}

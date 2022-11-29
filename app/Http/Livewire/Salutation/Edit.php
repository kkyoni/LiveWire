<?php

namespace App\Http\Livewire\Salutation;

use Livewire\Component;
use Notify;
use Yajra\DataTables\DataTables;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Helper;
use App\Models\Salutation;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use RuntimeException;

class Edit extends Component
{
    protected $salutation;
    public $bezeichnung, $salutation_id;
    public $updateMode = false;
    public $editSalutationIndex = null;

    public function render()
    {
        return view('pages.salutation.edit', [
            'salutation' => Salutation::orderBy('updated_at', 'DESC')->paginate(10),
        ]);
    }

    private function resetInputFields()
    {
        $this->bezeichnung = '';
    }

    public function edit($id)
    {
        $salutation = Salutation::findOrFail($id);
        $this->salutation_id = $id;
        $this->bezeichnung = $salutation->bezeichnung;
        $this->editSalutationIndex = $id;
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
            $salutation = Salutation::find($this->salutation_id);
            $salutation->update([
                'bezeichnung' => $this->bezeichnung,
            ]);
            $this->updateMode = false;
            $this->editSalutationIndex = null;
            Notify::success('Anrede aktualisiert', $title = "Erfolgreich..!");
            return redirect()->route('salutation.index');
            $this->resetInputFields();
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }
}

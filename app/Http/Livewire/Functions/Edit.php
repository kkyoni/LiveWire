<?php

namespace App\Http\Livewire\Functions;

use Livewire\Component;
use Notify;
use Yajra\DataTables\DataTables;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Helper;
use App\Models\Functions;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use RuntimeException;

class Edit extends Component
{
    protected $functions;
    public $bezeichnung, $functions_id;
    public $updateMode = false;
    public $editFunctionsIndex = null;

    public function render()
    {
        return view('pages.functions.edit', [
            'functions' => Functions::orderBy('updated_at', 'DESC')->paginate(10),
        ]);
    }

    private function resetInputFields()
    {
        $this->bezeichnung = '';
    }

    public function edit($id)
    {
        $functions = Functions::findOrFail($id);
        $this->functions_id = $id;
        $this->bezeichnung = $functions->bezeichnung;
        $this->editFunctionsIndex = $id;
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
            $functions = Functions::find($this->functions_id);
            $functions->update([
                'bezeichnung' => $this->bezeichnung,
            ]);
            $this->updateMode = false;
            $this->editFunctionsIndex = null;
            Notify::success('Funktionen aktualisiert', $title = "Erfolgreich..!");
            return redirect()->route('functions.index');
            $this->resetInputFields();
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }
}

<?php

namespace App\Http\Livewire\Titleprefix;

use Livewire\Component;
use Notify;
use Yajra\DataTables\DataTables;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Helper;
use App\Models\Titleprefix;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use RuntimeException;

class Edit extends Component
{
    protected $titleprefix;
    public $bezeichnung, $titleprefix_id;
    public $updateMode = false;
    public $editTitleprefixIndex = null;

    public function render()
    {
        return view('pages.titleprefix.edit', [
            'titleprefix' => Titleprefix::orderBy('updated_at', 'DESC')->paginate(10),
        ]);
    }

    private function resetInputFields()
    {
        $this->bezeichnung = '';
    }

    public function edit($id)
    {
        $titleprefix = Titleprefix::findOrFail($id);
        $this->titleprefix_id = $id;
        $this->bezeichnung = $titleprefix->bezeichnung;
        $this->editTitleprefixIndex = $id;
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
            $titleprefix = Titleprefix::find($this->titleprefix_id);
            $titleprefix->update([
                'bezeichnung' => $this->bezeichnung,
            ]);
            $this->updateMode = false;
            $this->editTitleprefixIndex = null;
            Notify::success('Titelpräfix aktualisiert', $title = "Erfolgreich..!");
            return redirect()->route('titleprefix.index');
            $this->resetInputFields();
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }
}

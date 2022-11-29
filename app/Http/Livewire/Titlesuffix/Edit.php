<?php

namespace App\Http\Livewire\Titlesuffix;

use App\Models\Titlesuffix;
use Livewire\Component;
use Notify;
use Yajra\DataTables\DataTables;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Helper;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use RuntimeException;

class Edit extends Component
{
    protected $titlesuffix;
    public $bezeichnung, $titlesuffix_id;
    public $updateMode = false;
    public $editTitlesuffixIndex = null;

    public function render()
    {
        return view('pages.titlesuffix.edit', [
            'titlesuffix' => Titlesuffix::orderBy('updated_at', 'DESC')->paginate(10),
        ]);
    }

    private function resetInputFields()
    {
        $this->bezeichnung = '';
    }

    public function edit($id)
    {
        $titlesuffix = Titlesuffix::findOrFail($id);
        $this->titlesuffix_id = $id;
        $this->bezeichnung = $titlesuffix->bezeichnung;
        $this->editTitlesuffixIndex = $id;
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
            $titlesuffix = Titlesuffix::find($this->titlesuffix_id);
            $titlesuffix->update([
                'bezeichnung' => $this->bezeichnung,
            ]);
            $this->updateMode = false;
            $this->editTitlesuffixIndex = null;
            Notify::success('Titelsuffix aktualisiert', $title = "Erfolgreich..!");
            return redirect()->route('titlesuffix.index');
            $this->resetInputFields();
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }
}

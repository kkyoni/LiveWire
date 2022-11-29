<?php

namespace App\Http\Livewire\Titleawarded;

use Livewire\Component;
use Notify;
use Yajra\DataTables\DataTables;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Helper;
use App\Models\Titleawarded;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use RuntimeException;

class Edit extends Component
{
    protected $titleawarded;
    public $bezeichnung, $titleawarded_id;
    public $updateMode = false;
    public $editTitleawardedIndex = null;

    public function render()
    {
        return view('pages.titleawarded.edit', [
            'titleawarded' => Titleawarded::orderBy('updated_at', 'DESC')->paginate(10),
        ]);
    }

    private function resetInputFields()
    {
        $this->bezeichnung = '';
    }

    public function edit($id)
    {
        $titleawarded = Titleawarded::findOrFail($id);
        $this->titleawarded_id = $id;
        $this->bezeichnung = $titleawarded->bezeichnung;
        $this->editTitleawardedIndex = $id;
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
            $titleawarded = Titleawarded::find($this->titleawarded_id);
            $titleawarded->update([
                'bezeichnung' => $this->bezeichnung,
            ]);
            $this->updateMode = false;
            $this->editTitleawardedIndex = null;
            Notify::success('Hinweise aktualisiert', $title = "Erfolgreich..!");
            return redirect()->route('titleawarded.index');
            $this->resetInputFields();
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }
}

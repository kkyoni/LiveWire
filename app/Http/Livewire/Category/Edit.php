<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
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
    protected $category;
    public $bezeichnung, $category_id;
    public $updateMode = false;
    public $editCategoryIndex = null;

    public function render()
    {
        return view('pages.category.edit', [
            'category' => Category::orderBy('updated_at', 'DESC')->paginate(10),
        ]);
    }

    private function resetInputFields()
    {
        $this->bezeichnung = '';
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $this->category_id = $id;
        $this->bezeichnung = $category->bezeichnung;
        $this->editCategoryIndex = $id;
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
            $category = Category::find($this->category_id);
            $category->update([
                'bezeichnung' => $this->bezeichnung,
            ]);
            $this->updateMode = false;
            $this->editCategoryIndex = null;
            Notify::success('Kategorie aktualisiert', $title = "Erfolgreich..!");
            return redirect()->route('category.index');
            $this->resetInputFields();
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }
}

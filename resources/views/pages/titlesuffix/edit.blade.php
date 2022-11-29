<div>
    <table class="table table-striped table-vcenter data-table">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ __('messages.bezeichnung') }}</th>
                <th>{{ __('messages.Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @if (sizeof($titlesuffix) > 0)
                @foreach ($titlesuffix as $titlesuffixs)
                    <tr>
                        @if ($updateMode == true && $this->editTitlesuffixIndex == $titlesuffixs->id)
                            <td>{{ $titlesuffixs->id }}<input type="hidden" wire:model="titlesuffix_id"></td>
                            <td><input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Enter bezeichnung" wire:model="bezeichnung">
                                @error('bezeichnung')
                                    <span class="help-block">
                                        <font color="red"> {{ $message }} </font>
                                    </span>
                                @enderror
                            </td>
                            <td><button wire:click.prevent="update()"
                                    class="btn btn-success btn-sm me-1 mb-3 btn-circle" style="width:31px"><i
                                        class="fa fa-save"></i></button>
                                <button wire:click.prevent="cancel()" class="btn btn-danger btn-sm me-1 mb-3 btn-circle"
                                    style="width:31px"><i class="fa fa-times"></i></button>
                            </td>
                        @else
                            <td>{{ $titlesuffixs->id }}</td>
                            <td>{{ $titlesuffixs->bezeichnung }}</td>
                            <td>
                                @php
                                    $permission_data['hasUpdatePermission'] = \App\Helpers\Helper::checkPermission(['titlesuffix.edit']);
                                    $permission_data['hasDeletePermission'] = \App\Helpers\Helper::checkPermission(['titlesuffix.delete']);
                                @endphp
                                @if ($permission_data['hasUpdatePermission'])
                                    <a wire:click="edit({{ $titlesuffixs->id }})"
                                        class="btn btn-warning btn-sm me-1 mb-3 btn-circle" data-toggle="tooltip"
                                        title="Bearbeiten!"><i class="fa fa-pencil"></i></button>
                                @endif
                                @if ($permission_data['hasDeletePermission'])
                                    <a href="javascript:void(0)"
                                        class="btn btn-danger btn-sm mb-3 btn-circle deletetitlesuffix"
                                        data-id={{ $titlesuffixs->id }} data-toggle="tooltip" title="Löschen!"><i
                                            class="fa fa-trash"></i></a>
                                @endif
                                <a href="javascript:void(0)"
                                    class="btn btn-info btn-sm me-1 mb-3 btn-circle showtitlesuffix"
                                    data-id={{ $titlesuffixs->id }} data-toggle="tooltip" title="Aussicht!"><i
                                        class="fa fa-eye"></i></a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            @else
                <tr class="odd" style="text-align:center">
                    <td valign="top" colspan="4" class="dataTables_empty">No data available in table</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

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
            @if (sizeof($category) > 0)
                @foreach ($category as $categorys)
                    <tr>
                        @if ($updateMode == true && $this->editCategoryIndex == $categorys->id)
                            <td>{{ $categorys->id }}<input type="hidden" wire:model="topic_id"></td>
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
                            <td>{{ $categorys->id }}</td>
                            <td>{{ $categorys->bezeichnung }}</td>
                            <td>
                                @php
                                    $permission_data['hasUpdatePermission'] = \App\Helpers\Helper::checkPermission(['category.edit']);
                                    $permission_data['hasDeletePermission'] = \App\Helpers\Helper::checkPermission(['category.delete']);
                                @endphp
                                @if ($permission_data['hasUpdatePermission'])
                                    <a wire:click="edit({{ $categorys->id }})"
                                        class="btn btn-warning btn-sm me-1 mb-3 btn-circle" data-toggle="tooltip"
                                        title="Bearbeiten!"><i class="fa fa-pencil"></i></button>
                                @endif
                                @if ($permission_data['hasDeletePermission'])
                                    <a href="javascript:void(0)"
                                        class="btn btn-danger btn-sm mb-3 btn-circle deletecategory"
                                        data-id={{ $categorys->id }} data-toggle="tooltip" title="Löschen!"><i
                                            class="fa fa-trash"></i></a>
                                @endif
                                <a href="javascript:void(0)"
                                    class="btn btn-info btn-sm me-1 mb-3 btn-circle showcategory"
                                    data-id={{ $categorys->id }} data-toggle="tooltip" title="Aussicht!"><i
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
    <div class="row">
        <div class="col-sm-12 col-md-5">
        </div>
        @php
            $var = $category->currentPage();
            $var1 = $category->currentPage();
            $Prev = --$var;
            $Next = ++$var1;
        @endphp
        <div class="col-sm-12 col-md-7">
            <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"
                style="float: right">
                <ul class="pagination">
                    <li class="paginate_button page-item previous " id="DataTables_Table_0_previous">
                        <a href="category?page={{ $Prev }}" class="page-link"
                            style="@if (1 <= $Prev) @else cursor: not-allowed !important; pointer-events: none; @endif">Previous</a>
                    </li>
                    @for ($x = 1; $x <= $category->lastPage(); $x++)
                        @if ($category->currentPage() == $x)
                            <li class="paginate_button page-item active">
                                <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0"
                                    class="page-link">{{ $x }}</a>
                            </li>
                        @else
                            <li class="paginate_button page-item  @if ($category->currentPage() == $x) active @endif">
                                <a href="category?page={{ $x }}" class="page-link">{{ $x }}</a>
                            </li>
                        @endif
                    @endfor
                    <li class="paginate_button page-item next" id="DataTables_Table_0_next">
                        <a href="category?page={{ $Next }}" class="page-link">Next</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

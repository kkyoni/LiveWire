@extends('layouts.master')
@section('title')
    {{ __('messages.Roles Management') }}
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title"> {{ __('messages.Roles Table') }}</h3>
            </div>
            <div class="block-content">
                <table class="table table-striped table-vcenter data-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('messages.Roles Name') }}</th>
                            <th class="notexport">{{ __('messages.Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- PopUp Model --}}
    <div class="modal-lg modal fade" id="modal-block-fadein" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="block block-rounded block-transparent mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title"> {{ __('messages.Roles Management Detail') }}</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm testdata">
                    </div>
                    <div class="block-content block-content-full text-end bg-body">
                        <button type="button" class="btn btn-sm btn-danger me-1"
                            data-bs-dismiss="modal">{{ __('messages.Close') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('styles')
@endsection
@section('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript">
        $(function() {

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('roles.index') }}",
                    data: function(d) {
                        d.search = $('input[type="search"]').val()
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });
    </script>
    <script>
        $(document).on("click", "a.showroles", function(e) {
            var row = $(this);
            var id = $(this).attr('data-id');
            $.ajax({
                url: "{{ route('roles.show') }}",
                type: 'get',
                data: {
                    id: id
                },
                success: function(msg) {
                    $('.testdata').html(msg);
                    $('#modal-block-fadein').modal('show');
                },
                error: function() {
                    swal("Error!", 'Error in Record Not Show', "error");
                }
            });
        });
    </script>
@endsection

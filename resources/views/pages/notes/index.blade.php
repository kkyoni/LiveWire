@extends('layouts.master')
@section('title')
    {{ __('messages.Notes Management') }}
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('messages.Notes Table') }}</h3>
                <div class="block-options">
                    @if (\App\Helpers\Helper::checkPermission(['notes.create']))
                        <div class="block-options-item">
                            <a href="{{ route('notes.create') }}"
                                class="btn btn-primary btn-sm">{{ __('messages.Add Notes') }}</a>
                        </div>
                    @endif
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <?php
                                    $note = App\Models\Note::with('user_list')->get();
                                    ?>
                                    <div class="col-sm-3 col-sm-offset-3">
                                        <select id='text' class="js-select2 form-select form-control">
                                            <option value=''>{{ __('messages.Select Text') }}</option>
                                            <?php
                                            foreach ($note as $note_list) {
                                                if (!empty($note_list->text)) {
                                                    echo "<option value='$note_list->text'>$note_list->text</option>";
                                                }
                                            } ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-3 col-sm-offset-3">
                                        <select id='user_id' class='js-select2 form-select form-control'>
                                            <option value=''>{{ __('messages.Select User Id') }}</option>
                                            <?php
                                            foreach ($note as $note_list) {
                                                if (!empty($note_list->user_id)) {
                                                    if (!empty($note_list->user_list->first_name)) {
                                                        echo "<option value='$note_list->user_id'>" . $note_list->user_list->first_name . ' ' . $note_list->user_list->last_name . '</option>';
                                                    }
                                                }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-content">
                <table class="table table-striped table-vcenter data-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('messages.Text') }}</th>
                            <th>{{ __('messages.User Id') }}</th>
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
    <div class="modal fade" id="modal-block-fadein" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="block block-rounded block-transparent mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">{{ __('messages.Notes Management Detail') }}</h3>
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
    <style>
        <?php
    $checkPermission = \App\Helpers\Helper::checkPermission(['notes.export']);
    if($checkPermission){ ?> .buttons-csv {
            display: block;
        }

        <?php } ?> .buttons-csv {
            float: right;
            margin-left: 10px;
        }

        .dataTables_length {
            float: left;
        }
    </style>
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
                    url: "{{ route('notes.index') }}",
                    data: function(d) {
                        d.text = $('#text').val(),
                            d.user_id = $('#user_id').val(),
                            d.search = $('input[type="search"]').val()
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'id'
                    },
                    {
                        data: 'text',
                        name: 'text'
                    },
                    {
                        data: 'user_id',
                        name: 'user_id'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                dom: 'lBfrtip',
                buttons: [{
                    extend: 'csv',
                    text: '<i class="fa fa-fw fa-download me-1"></i>CSV',
                    className: 'btn btn-success btn-sm',
                    charset: 'utf-8',
                    fieldSeparator: ',',
                    bom: true,
                    filename: 'FEEI_Anmerkungen',
                    exportOptions: {
                        columns: ':not(.notexport)'
                    },
                }],
            });
            $('#text').change(function() {
                table.draw();
            });
            $('#user_id').change(function() {
                table.draw();
            });
        });
    </script>
    <script>
        $(document).on("click", "a.deletenotes", function(e) {
            var row = $(this);
            var id = $(this).attr('data-id');
            swal({
                title: "Bist du dir sicher?",
                text: "Sie können diesen Datensatz nicht wiederherstellen",
                imageUrl: "{{ asset('assets/bootstrap-sweetalert/thumbs-up.jpg') }}",
                showCancelButton: true,
                confirmButtonClass: "btn btn-success m-1",
                confirmButtonText: "Ja, löschen!",
                cancelButtonClass: "btn btn-danger m-1",
                cancelButtonText: "Nein, bitte stornieren!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "{{ route('notes.delete', ['']) }}" + "/" + id,
                        type: 'post',
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(msg) {
                            if (msg.status == 'success') {
                                swal({
                                        title: "Gelöscht",
                                        text: "Datensatz erfolgreich löschen",
                                        type: "success"
                                    },
                                    function() {
                                        location.reload();
                                    });
                            } else {
                                swal("Warning!", msg.message, "warning");
                            }
                        },
                        error: function() {
                            swal("Error!", 'Fehler beim Löschen des Datensatzes', "error");
                        }
                    });
                } else {
                    swal("Abgesagt", "Ihre Notizen sind sicher :)", "error");
                }
            });
            return false;
        })
        $(document).on("click", "a.shownotes", function(e) {
            var row = $(this);
            var id = $(this).attr('data-id');
            $.ajax({
                url: "{{ route('notes.show') }}",
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

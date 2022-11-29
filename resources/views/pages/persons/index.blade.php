@extends('layouts.master')
@section('title')
    {{ __('messages.Persons Management') }}
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('messages.Persons Table') }}</h3>
                <div class="block-options">
                    @if (\App\Helpers\Helper::checkPermission(['persons.create']))
                        <div class="block-options-item">
                            <a href="{{ route('persons.create') }}"
                                class="btn btn-primary btn-sm">{{ __('messages.Add Persons') }}</a>
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
                                    $person_list = App\Models\Person::get();
                                    ?>
                                    <div class="col-sm-3 col-sm-offset-3">
                                        <select id='nachname' class='js-select2 form-select form-control'>
                                            <option value=''>{{ __('messages.Select Nachname') }}</option>
                                            <?php
                                            foreach ($person_list as $personist) {
                                                if (!empty($personist->nachname)) {
                                                    echo "<option value='$personist->nachname'>$personist->nachname</option>";
                                                }
                                            } ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-3 col-sm-offset-3">
                                        <select id='vorname' class='js-select2 form-select form-control'>
                                            <option value=''>{{ __('messages.Select Vorname') }}</option>
                                            <?php
                                            foreach ($person_list as $personist) {
                                                if (!empty($personist->vorname)) {
                                                    echo "<option value='$personist->vorname'>$personist->vorname</option>";
                                                }
                                            } ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-3 col-sm-offset-3">
                                        <select id='email' class='js-select2 form-select form-control'>
                                            <option value=''>{{ __('messages.Select Email') }}</option>
                                            <?php
                                            foreach ($person_list as $personist) {
                                                if (!empty($personist->email)) {
                                                    echo "<option value='$personist->email'>$personist->email</option>";
                                                }
                                            } ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-3 col-sm-offset-3">
                                        <select id='telefon' class='js-select2 form-select form-control'>
                                            <option value=''>{{ __('messages.Select telefon') }}</option>
                                            <?php
                                            foreach ($person_list as $personist) {
                                                if (!empty($personist->telefon)) {
                                                    echo "<option value='$personist->telefon'>$personist->telefon</option>";
                                                }
                                            } ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-3 col-sm-offset-3 mt-2">
                                        <select id='mobil' class='js-select2 form-select form-control'>
                                            <option value=''>{{ __('messages.Select handy') }}</option>
                                            <?php
                                            foreach ($person_list as $personist) {
                                                if (!empty($personist->mobil)) {
                                                    echo "<option value='$personist->mobil'>$personist->mobil</option>";
                                                }
                                            } ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-3 col-sm-offset-3 mt-2">
                                        <select id='status_person_id' class="js-select2 form-select form-control">
                                            <option value=''>{{ __('messages.Select Status') }}</option>
                                            <?php
                                            foreach ($person_list as $personist) {
                                                if (!empty($personist->status_list->bezeichnung)) {
                                                    echo "<option value='$personist->status_person_id'>" . $personist->status_list->bezeichnung . '</option>';
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
                            <th>{{ __('messages.Nachname') }}</th>
                            <th>{{ __('messages.Vorname') }}</th>
                            <th>{{ __('messages.Status') }}</th>
                            <th>{{ __('messages.Organisations') }}</th>
                            <th>{{ __('messages.Netzwerkpartner') }}</th>
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
                        <h3 class="block-title">{{ __('messages.Persons Management Detail') }}</h3>
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
    $checkPermission = \App\Helpers\Helper::checkPermission(['persons.export']);
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
                    url: "{{ route('persons.index') }}",
                    data: function(d) {
                        d.nachname = $('#nachname').val(),
                            d.vorname = $('#vorname').val(),
                            d.email = $('#email').val(),
                            d.telefon = $('#telefon').val(),
                            d.mobil = $('#mobil').val(),
                            d.status_person_id = $('#status_person_id').val(),
                            d.person_organisation_id = $('#person_organisation_id').val(),
                            d.person_mitglied_id = $('#person_stakeholder_id').val(),
                            d.search = $('input[type="search"]').val()
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'id'
                    },
                    {
                        data: 'nachname',
                        name: 'nachname'
                    },
                    {
                        data: 'vorname',
                        name: 'vorname'
                    },
                    {
                        data: 'status_person_id',
                        name: 'status_person_id'
                    },
                    {
                        data: 'person_organisation_id',
                        name: 'person_organisation_id'
                    },
                    {
                        data: 'person_stakeholder_id',
                        name: 'person_stakeholder_id'
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
                    filename: 'FEEI_Persons',
                    exportOptions: {
                        columns: ':not(.notexport)'
                    },
                }],
            });
            $('#nachname').change(function() {
                table.draw();
            });
            $('#vorname').change(function() {
                table.draw();
            });
            $('#email').change(function() {
                table.draw();
            });
            $('#telefon').change(function() {
                table.draw();
            });
            $('#mobil').change(function() {
                table.draw();
            });
            $('#status_person_id').change(function() {
                table.draw();
            });
            $('#person_organisation_id').change(function() {
                table.draw();
            });
            $('#person_mitglied_id').change(function() {
                table.draw();
            });
            $('#person_stakeholder_id').change(function() {
                table.draw();
            });
        });
    </script>
    <script>
        $(document).on("click", "a.deletepersons", function(e) {
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
                        url: "{{ route('persons.delete', ['']) }}" + "/" + id,
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
                    swal("Abgesagt", "Ihre Personen sind sicher :)", "error");
                }
            });
            return false;
        })
        $(document).on("click", "a.showpersons", function(e) {
            var row = $(this);
            var id = $(this).attr('data-id');
            $.ajax({
                url: "{{ route('persons.show') }}",
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

@extends('layouts.master')
@section('title')
    {{ __('messages.Branchoffice Management') }}
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('messages.Branchoffice Table') }}</h3>
                <div class="block-options">
                    @if (\App\Helpers\Helper::checkPermission(['branchoffice.create']))
                        <div class="block-options-item">
                            <a href="{{ route('branchoffice.create') }}"
                                class="btn btn-primary btn-sm">{{ __('messages.Add Branchoffice') }}</a>
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
                                    $branchoffice = App\Models\BranchOffice::get();
                                    ?>
                                    <div class="col-sm-3 col-sm-offset-3">
                                        <select id='organisation_id' class='js-select2 form-select form-control'>
                                            <option value=''>{{ __('messages.Select Organisation') }}</option>
                                            <?php
                                            foreach ($branchoffice as $branchoffice_list) {
                                                if (!empty($branchoffice_list->organisations_list->titel)) {
                                                    echo "<option value='$branchoffice_list->organisation_id'>" . $branchoffice_list->organisations_list->titel . '</option>';
                                                }
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 col-sm-offset-3">
                                        <select id='bezeichnung' class='js-select2 form-select form-control'>
                                            <option value=''>{{ __('messages.Select Abweichende Bezeichnung') }}
                                            </option>
                                            <?php
                                            foreach ($branchoffice as $branchoffice_list) {
                                                if (!empty($branchoffice_list->bezeichnung)) {
                                                    echo "<option value='$branchoffice_list->bezeichnung'>$branchoffice_list->bezeichnung</option>";
                                                }
                                            } ?>
                                        </select>
                                    </div>
                                    @php
                                        $einteilung = ['1' => 'A', '2' => 'B', '3' => 'C'];
                                    @endphp
                                    <div class="col-sm-3 col-sm-offset-3">
                                        <select id='einteilung' class='js-select2 form-select form-control'>
                                            <option value=''>{{ __('messages.Select Einteilung') }}</option>
                                            <?php
                                            foreach ($einteilung as $key => $einteilung_list) {
                                                echo "<option value='$key'>$einteilung_list</option>";
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 col-sm-offset-3">
                                        <select id='ort_id' class='js-select2 form-select form-control'>
                                            <option value=''>{{ __('messages.Select Ort') }}</option>
                                            <?php
                                            foreach ($branchoffice as $branchoffice_list) {
                                                if (!empty($branchoffice_list->ort_list->plz)) {
                                                    echo "<option value='$branchoffice_list->ort_id'>" . $branchoffice_list->ort_list->plz . '</option>';
                                                }
                                            } ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-3 col-sm-offset-3 mt-2">
                                        <select id='status_id' class="js-select2 form-select form-control">
                                            <option value=''>{{ __('messages.Select Status') }}</option>
                                            <?php
                                            foreach ($branchoffice as $branchoffice_list) {
                                                if (!empty($branchoffice_list->status_list->bezeichnung)) {
                                                    echo "<option value='$branchoffice_list->status_id'>" . $branchoffice_list->status_list->bezeichnung . '</option>';
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
                            <th>{{ __('messages.organisation') }}</th>
                            <th>{{ __('messages.bezeichnung') }} </th>
                            <th>{{ __('messages.einteilung') }}</th>
                            <th>{{ __('messages.adresse') }}</th>
                            <th>{{ __('messages.ort') }}</th>
                            <th>{{ __('messages.telefon') }}</th>
                            <th>{{ __('messages.status') }}</th>
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
                        <h3 class="block-title">{{ __('messages.Branchoffice Management Detail') }}</h3>
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
    $checkPermission = \App\Helpers\Helper::checkPermission(['branchoffice.export']);
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
                    url: "{{ route('branchoffice.index') }}",
                    data: function(d) {
                        d.organisation_id = $('#organisation_id').val(),
                            d.bezeichnung = $('#bezeichnung').val(),
                            d.einteilung = $('#einteilung').val(),
                            d.mitglied_themen_id = $('#mitglied_themen_id').val(),
                            d.mitglied_netzwerkpartner_id = $('#mitglied_netzwerkpartner_id').val(),
                            d.ort_id = $('#ort_id').val(),
                            d.user_id = $('#user_id').val(),
                            d.status_id = $('#status_id').val(),
                            d.search = $('input[type="search"]').val()
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'id'
                    },
                    {
                        data: 'organisation_id',
                        name: 'organisation_id'
                    },
                    {
                        data: 'bezeichnung',
                        name: 'bezeichnung'
                    },
                    {
                        data: 'einteilung',
                        name: 'einteilung'
                    },
                    {
                        data: 'adresse',
                        name: 'adresse'
                    },
                    {
                        data: 'ort_id',
                        name: 'ort_id'
                    },
                    {
                        data: 'telefon',
                        name: 'telefon'
                    },
                    {
                        data: 'status_id',
                        name: 'status_id'
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
                    filename: 'FEEI_Branchoffice',
                    exportOptions: {
                        columns: ':not(.notexport)'
                    },
                }],
            });
            $('#organisation_id').change(function() {
                table.draw();
            });
            $('#bezeichnung').change(function() {
                table.draw();
            });
            $('#einteilung').change(function() {
                table.draw();
            });
            $('#mitglied_themen_id').change(function() {
                table.draw();
            });
            $('#mitglied_netzwerkpartner_id').change(function() {
                table.draw();
            });
            $('#ort_id').change(function() {
                table.draw();
            });
            $('#user_id').change(function() {
                table.draw();
            });
            $('#status_id').change(function() {
                table.draw();
            });
        });
    </script>
    <script>
        $(document).on("click", "a.deletebranchoffice", function(e) {
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
                        url: "{{ route('branchoffice.delete', ['']) }}" + "/" + id,
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
                    swal("Abgesagt", "Ihre Filiale ist sicher :)", "error");
                }
            });
            return false;
        })
        $(document).on("click", "a.showbranchoffice", function(e) {
            var row = $(this);
            var id = $(this).attr('data-id');
            $.ajax({
                url: "{{ route('branchoffice.show') }}",
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

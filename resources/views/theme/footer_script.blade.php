<script src="{{ asset('assets/js/plugins/chart.js/chart.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/be_pages_ecom_dashboard.min.js') }}"></script>
{{-- DataTable Js --}}
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="{{ asset('assets/js/oneui.app.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

{{-- Sweet Alert --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>

<script src="{{ asset('assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    One.helpersOnLoad(['jq-select2']);
</script>

{!! Notify::render() !!}
@livewireScripts
@yield('scripts')

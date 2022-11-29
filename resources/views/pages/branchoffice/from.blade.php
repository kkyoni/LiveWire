<div class="pt-5">
    <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
            <a class="nav-link {{ $currentSection != 1 ? '' : 'active' }}"
                href="#step1">{{ __('messages.Grunddaten') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $currentSection != 2 ? '' : 'active' }}"
                href="#step2">{{ __('messages.Personen') }}</a>
        </li>
    </ul>
    <div class="row pt-3">
        {{-- Step 1 --}}
        <div id="step1" class="needs-validation" style="display: {{ $currentSection != 1 ? 'none' : '' }}">
            <div class="mb-4">
                <label class="form-label" for="example-text-input-alt">{{ __('messages.Organisation') }}</label>
                <span class="text-danger">*</span>
                {!! Form::select('organisation_id', $organisations_list, $this->organisation_id, [
                    'class' => 'form-control',
                    'wire:model' => 'organisation_id',
                    'aria-describedby' => 'organisation_id',
                    'id' => 'organisation_id',
                    'placeholder' => 'Choose Organisations...',
                ]) !!}
                @error('organisation_id')
                    <span class="help-block">
                        <font color="red"> {{ $message }} </font>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label"
                    for="example-text-input-alt">{{ __('messages.Abweichende Bezeichnung') }}</label>
                {!! Form::text('bezeichnung', null, [
                    'class' => 'form-control',
                    'wire:model' => 'bezeichnung',
                    'aria-describedby' => 'bezeichnung',
                    'id' => 'example-text-input-alt',
                    'placeholder' => 'bezeichnung',
                ]) !!}

                @error('bezeichnung')
                    <span class="help-block">
                        <font color="red"> {{ $message }} </font>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label" for="example-text-input-alt">{{ __('messages.FEEI Nummer') }}</label>
                {!! Form::text('feei_id', null, [
                    'class' => 'form-control',
                    'wire:model' => 'feei_id',
                    'aria-describedby' => 'feei_id',
                    'id' => 'example-text-input-alt',
                    'placeholder' => 'feei_id',
                ]) !!}

                @error('feei_id')
                    <span class="help-block">
                        <font color="red"> {{ $message }} </font>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label" for="example-text-input-alt">{{ __('messages.Einteilung') }}</label>
                {!! Form::select('einteilung', $einteilung_list, $this->einteilung, [
                    'class' => 'form-control',
                    'id' => 'einteilung',
                    'wire:model' => 'einteilung',
                    'aria-describedby' => 'einteilung',
                    'placeholder' => 'Choose Einteilung...',
                ]) !!}
                @error('einteilung')
                    <span class="help-block">
                        <font color="red"> {{ $message }} </font>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label" for="example-text-input-alt">{{ __('messages.feei_kv') }}</label>
                <input type="checkbox" name="feei_kv" wire:model="feei_kv" aria-describedby="aria-describedby"
                    value="1" style="margin-left: 1rem">

                @error('feei_kv')
                    <span class="help-block">
                        <font color="red"> {{ $message }} </font>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label" for="example-text-input-alt">{{ __('messages.feei_member') }}</label>
                <input type="checkbox" name="feei_member" wire:model="feei_member" aria-describedby="aria-describedby"
                    value="1" style="margin-left: 1rem">
                @error('feei_member')
                    <span class="help-block">
                        <font color="red"> {{ $message }} </font>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label" for="example-text-input-alt">{{ __('messages.ev_member') }}</label>
                <input type="checkbox" name="ev_member" wire:model="ev_member" aria-describedby="aria-describedby"
                    value="1" style="margin-left: 1rem">
                @error('ev_member')
                    <span class="help-block">
                        <font color="red"> {{ $message }} </font>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label" for="example-text-input-alt">{{ __('messages.Netzwerkpartner') }}</label>
                <div wire:ignore class="mb-4">
                    {!! Form::select('mitglied_netzwerkpartner_id', $networkpartner_list, $this->mitglied_netzwerkpartner_id, [
                        'class' => 'form-select px-4 py-3 text-gray-900 dark:text-gray-300 form-control',
                        'id' => 'mitglied_netzwerkpartner_id',
                        'wire:model' => 'mitglied_netzwerkpartner_id',
                        'aria-describedby' => 'mitglied_netzwerkpartner_id',
                        'multiple' => 'multiple',
                        'style' => 'width: 83.5rem',
                    ]) !!}
                </div>
                @error('mitglied_netzwerkpartner_id')
                    <span class="help-block">
                        <font color="red"> {{ $message }} </font>
                    </span>
                @enderror
                @if (!empty($inputs1))
                    @foreach ($inputs1 as $key => $value)
                        <div class="mb-4">
                            <label class="form-label"
                                for="example-text-input-alt">{{ __('messages.Funktion') }}</label>
                            <select class="form-control" wire:model.defer="funktion_id_network.{{ $value }}">
                                <option>Select Function</option>
                                @foreach ($functions_list as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label"
                                for="example-text-input-alt">{{ __('messages.Abteilung') }}</label>
                            <input type="text" class="form-control" placeholder="Enter abteilung"
                                wire:model.defer="abteilung_network.{{ $value }}" aria-describedby='abteilung'
                                placeholder='abteilung'>

                        </div>
                    @endforeach
                @endif

            </div>

            <div class="mb-4">
                <label class="form-label" for="example-text-input-alt">{{ __('messages.Themengebiete') }}</label>
                <div wire:ignore class="mb-4">
                    {!! Form::select('mitglied_themen_id', $topic_list, $this->mitglied_themen_id, [
                        'class' => 'form-select px-4 py-3 text-gray-900 dark:text-gray-300 form-control',
                        'id' => 'mitglied_themen_id',
                        'wire:model' => 'mitglied_themen_id',
                        'aria-describedby' => 'mitglied_themen_id',
                        'multiple' => 'multiple',
                        'style' => 'width: 83.5rem',
                    ]) !!}
                </div>
                @error('mitglied_themen_id')
                    <span class="help-block">
                        <font color="red"> {{ $message }} </font>
                    </span>
                @enderror
                @if (!empty($inputs))
                    @foreach ($inputs as $key => $value)
                        <div class="mb-4">
                            <label class="form-label"
                                for="example-text-input-alt">{{ __('messages.Funktion') }}</label>
                            <select class="form-control" wire:model.defer="funktion_id.{{ $value }}">
                                <option>Select Function</option>
                                @foreach ($functions_list as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label"
                                for="example-text-input-alt">{{ __('messages.Abteilung') }}</label>
                            <input type="text" class="form-control" placeholder="Enter abteilung"
                                wire:model.defer="abteilung.{{ $value }}" aria-describedby='abteilung'
                                placeholder='abteilung'>

                        </div>
                    @endforeach
                @endif
            </div>

            <div class="mb-4">
                <label class="form-label" for="example-text-input-alt">{{ __('messages.Adresse') }}</label>
                <span class="text-danger">*</span>
                {!! Form::text('adresse', null, [
                    'class' => 'form-control',
                    'wire:model' => 'adresse',
                    'aria-describedby' => 'adresse',
                    'id' => 'example-text-input-alt',
                    'placeholder' => 'adresse',
                ]) !!}
                @error('adresse')
                    <span class="help-block">
                        <font color="red"> {{ $message }} </font>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label" for="example-text-input-alt">{{ __('messages.Ort') }}</label>
                <span class="text-danger">*</span>
                <select class="form-control" wire:model="ort_id" aria-describedby="ort_id" id="ort_id">
                    <option>Choose Ort...</option>
                    @foreach ($ort_list as $list)
                        <option value="{{ $list->id }}">{{ $list->plz }} {{ $list->bezeichnung }}</option>
                    @endforeach
                </select>
                @error('ort_id')
                    <span class="help-block">
                        <font color="red"> {{ $message }} </font>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label" for="example-text-input-alt">{{ __('messages.E-Mail') }}</label>
                {!! Form::email('email', null, [
                    'class' => 'form-control',
                    'wire:model' => 'email',
                    'aria-describedby' => 'email',
                    'id' => 'example-text-input-alt',
                    'placeholder' => 'E-Mail',
                ]) !!}
                @error('email')
                    <span class="help-block">
                        <font color="red"> {{ $message }} </font>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label" for="example-text-input-alt">{{ __('messages.Telefon') }}</label>
                {!! Form::text('telefon', null, [
                    'class' => 'js-masked-phone form-control',
                    'wire:model' => 'telefon',
                    'aria-describedby' => 'telefon',
                    'id' => 'js-masked-phone',
                    'placeholder' => '+99 999-999-9999',
                ]) !!}
                @error('telefon')
                    <span class="help-block">
                        <font color="red"> {{ $message }} </font>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label" for="example-text-input-alt">{{ __('messages.Fax') }}</label>
                {!! Form::text('fax', null, [
                    'wire:model' => 'fax',
                    'class' => 'form-control',
                    'id' => 'example-text-input-alt',
                    'aria-describedby' => 'fax',
                    'placeholder' => 'fax',
                ]) !!}
                @error('fax')
                    <span class="help-block">
                        <font color="red"> {{ $message }} </font>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label" for="example-text-input-alt">{{ __('messages.Website') }}</label>
                {!! Form::text('web', null, [
                    'class' => 'form-control',
                    'wire:model' => 'web',
                    'aria-describedby' => 'web',
                    'id' => 'example-text-input-alt',
                    'placeholder' => 'Website',
                ]) !!}
                @error('web')
                    <span class="help-block">
                        <font color="red"> {{ $message }} </font>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label" for="example-text-input-alt">{{ __('messages.Betreuung') }}</label>
                <div wire:ignore>
                    {!! Form::select('user_id', $user_list, $this->user_id, [
                        'class' => 'form-select px-4 py-3 text-gray-900 dark:text-gray-300 form-control',
                        'id' => 'user_id',
                        'wire:model' => 'user_id',
                        'aria-describedby' => 'user_id',
                        'multiple' => 'multiple',
                    ]) !!}
                </div>
                @error('user_id')
                    <span class="help-block">
                        <font color="red"> {{ $message }} </font>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label" for="example-text-input-alt">{{ __('messages.Status') }}</label>
                <span class="text-danger">*</span>
                {!! Form::select('status_id', $status_list, $this->status_id, [
                    'class' => 'form-control',
                    'id' => 'status_id',
                    'wire:model' => 'status_id',
                    'aria-describedby' => 'status_id',
                    'placeholder' => 'Choose Status...',
                ]) !!}
                @error('status_id')
                    <span class="help-block">
                        <font color="red"> {{ $message }} </font>
                    </span>
                @enderror
            </div>

            <button class="btn btn-primary" wire:click="step1" type="button">{{ __('messages.Next') }}</button>
        </div>
        {{-- Step 2 --}}
        <div id="step2" style="display: {{ $currentSection != 2 ? 'none' : '' }}">
            <div class="mb-4">
                <label class="form-label" for="person_mitglied_id">{{ __('messages.Personen') }}</label>
                <div wire:ignore class="mb-4">
                    {!! Form::select('person_mitglied_id', $person_list, $this->person_mitglied_id, [
                        'class' => 'form-select px-4 py-3 text-gray-900 dark:text-gray-300 form-control',
                        'id' => 'person_mitglied_id',
                        'wire:model' => 'person_mitglied_id',
                        'aria-describedby' => 'person_mitglied_id',
                        'multiple' => 'multiple',
                        'style' => 'width: 83.5rem',
                    ]) !!}
                </div>
                @error('person_mitglied_id')
                    <span class="help-block">
                        <font color="red"> {{ $message }} </font>
                    </span>
                @enderror

                @if (!empty($inputs2))
                    @foreach ($inputs2 as $key => $value)
                        <div class="mb-4">
                            <label class="form-label"
                                for="example-text-input-alt">{{ __('messages.Funktion') }}</label>
                            <select class="form-control" wire:model.defer="funktion_id_person.{{ $value }}">
                                <option>Select Function</option>
                                @foreach ($functions_list as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label"
                                for="example-text-input-alt">{{ __('messages.Abteilung') }}</label>
                            <input type="text" class="form-control" placeholder="Enter abteilung"
                                wire:model.defer="abteilung_person.{{ $value }}" aria-describedby='abteilung'
                                placeholder='abteilung'>
                        </div>
                    @endforeach
                @endif
                <button class="btn btn-danger" type="button"
                    wire:click="back(1)">{{ __('messages.Back') }}</button>
                <button class="btn btn-success" wire:click="step2"
                    type="button">{{ __('messages.Finish') }}</button>
            </div>
        </div>
    </div>
</div>
@section('styles')
    <link href="{{ asset('assets/select2/select2.min.css') }}" rel="stylesheet" />
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
    <script>
        $(document).ready(function() {
            $('#mitglied_netzwerkpartner_id').select2({
                dropdownCssClass: 'text-gray-900 dark:text-gray-600 font-family-is', // you can add name font
                selectionCssClass: 'text-gray-900 dark:text-gray-600 font-family-is',
                placeholder: "Choose Netzwerk Partner...",
            });

            $('#mitglied_netzwerkpartner_id').on('change', function(e) {
                livewire.emit('setSomeNetwork', $(this).val())
                @this.set('mitglied_netzwerkpartner_id', $(this).val());
            });

            window.addEventListener('cleanData', event => {
                $('#mitglied_netzwerkpartner_id').val('').trigger('change');
            });


            $('#mitglied_themen_id').select2({
                dropdownCssClass: 'text-gray-900 dark:text-gray-600 font-family-is', // you can add name font
                selectionCssClass: 'text-gray-900 dark:text-gray-600 font-family-is',
                placeholder: "Choose Themen...",
            });

            $('#mitglied_themen_id').on('change', function(e) {
                livewire.emit('setSomeProperty', $(this).val())
                @this.set('mitglied_themen_id', $(this).val());
            });

            window.addEventListener('cleanData', event => {
                $('#mitglied_themen_id').val('').trigger('change');
            });

            $('#person_mitglied_id').select2({
                dropdownCssClass: 'text-gray-900 dark:text-gray-600 font-family-is', // you can add name font
                selectionCssClass: 'text-gray-900 dark:text-gray-600 font-family-is',
                allowClear: true,
                placeholder: "Choose Person Themen...",
            });

            $('#person_mitglied_id').on('change', function(e) {
                livewire.emit('setSomeMitglied', $(this).val())
                @this.set('person_mitglied_id', $(this).val());

            });

            window.addEventListener('cleanData', event => {
                $('#person_mitglied_id').val('').trigger('change');
            });

            $('#user_id').select2({
                dropdownCssClass: 'text-gray-900 dark:text-gray-600 font-family-is', // you can add name font
                selectionCssClass: 'text-gray-900 dark:text-gray-600 font-family-is',
                placeholder: "Choose Betreuung...",
            });

            $('#user_id').on('change', function(e) {
                @this.set('user_id', $(this).val());
            });

            window.addEventListener('cleanData', event => {
                $('#user_id').val('').trigger('change');
            });

            jQuery('.js-masked-phone').mask('+99 999-999-9999');

            $('#js-masked-phone').on('change', function(e) {
                @this.set('telefon', $(this).val());
            });

            window.addEventListener('cleanData', event => {
                $('#js-masked-phone').val('').trigger('change');
            });
        });
    </script>
    <script src="{{ asset('assets/js/plugins/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
@endsection

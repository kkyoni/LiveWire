<form>
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
                    <label class="form-label" for="organisationen_themen_id">{{ __('messages.Organisations') }}</label>
                    <div wire:ignore class="mb-4">
                        {!! Form::select('organisationen_themen_id', $topic_list, $this->organisationen_themen_id, [
                            'class' => 'form-select px-4 py-3 text-gray-900 dark:text-gray-300 form-control',
                            'id' => 'organisationen_themen_id',
                            'wire:model' => 'organisationen_themen_id',
                            'aria-describedby' => 'organisationen_themen_id',
                            'multiple' => 'multiple',
                            'style' => 'width: 83.5rem',
                        ]) !!}
                    </div>
                    @error('organisationen_themen_id')
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
                    <label class="form-label" for="example-text-input-alt">{{ __('messages.Bezeichnung') }}</label>
                    <span class="text-danger">*</span>
                    {!! Form::text('titel', null, [
                        'class' => 'form-control',
                        'wire:model' => 'titel',
                        'aria-describedby' => 'titel',
                        'id' => 'example-text-input-alt',
                        'placeholder' => 'Bezeichnung',
                    ]) !!}
                    @error('titel')
                        <span class="help-block">
                            <font color="red"> {{ $message }} </font>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label" for="example-text-input-alt">{{ __('messages.Synonyme') }}</label>
                    {!! Form::textarea('synonyme', null, [
                        'class' => 'form-control',
                        'wire:model' => 'synonyme',
                        'aria-describedby' => 'synonyme',
                        'id' => 'example-text-input-alt',
                        'placeholder' => 'Synonyme',
                    ]) !!}
                    @error('synonyme')
                        <span class="help-block">
                            <font color="red"> {{ $message }} </font>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label" for="example-text-input-alt">{{ __('messages.Adresse') }}</label>
                    <span class="text-danger">*</span>
                    {!! Form::text('adresse', null, [
                        'class' => 'form-control',
                        'wire:model' => 'adresse',
                        'aria-describedby' => 'adresse',
                        'id' => 'example-text-input-alt',
                        'placeholder' => 'Adresse',
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
                    <span class="text-danger">*</span>
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
                        'class' => 'form-control',
                        'wire:model' => 'fax',
                        'aria-describedby' => 'fax',
                        'id' => 'example-text-input-alt',
                        'placeholder' => 'Fax',
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
                    <label class="form-label" for="example-text-input-alt">{{ __('messages.UmsatzsteuerID') }}</label>
                    {!! Form::text('uid', null, [
                        'class' => 'form-control',
                        'wire:model' => 'uid',
                        'aria-describedby' => 'uid',
                        'id' => 'example-text-input-alt',
                        'placeholder' => 'UmsatzsteuerID',
                    ]) !!}
                    @error('uid')
                        <span class="help-block">
                            <font color="red"> {{ $message }} </font>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label"
                        for="example-text-input-alt">{{ __('messages.Firmenbuchnummer') }}</label>
                    {!! Form::text('fb', null, [
                        'class' => 'form-control',
                        'wire:model' => 'fb',
                        'aria-describedby' => 'fb',
                        'id' => 'example-text-input-alt',
                        'placeholder' => 'Firmenbuchnummer',
                    ]) !!}
                    @error('fb')
                        <span class="help-block">
                            <font color="red"> {{ $message }} </font>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label"
                        for="example-text-input-alt">{{ __('messages.WKO Mitgliedsnummer') }}</label>
                    {!! Form::text('wkonr', null, [
                        'class' => 'form-control',
                        'wire:model' => 'wkonr',
                        'aria-describedby' => 'wkonr',
                        'id' => 'example-text-input-alt',
                        'placeholder' => 'WKO Mitgliedsnummer',
                    ]) !!}
                    @error('wkonr')
                        <span class="help-block">
                            <font color="red"> {{ $message }} </font>
                        </span>
                    @enderror
                </div>


                <div class="mb-4">
                    <label class="form-label" for="example-text-input-alt">{{ __('messages.Betreuung') }}</label>
                    <span class="text-danger">*</span>
                    <div wire:ignore>
                        {!! Form::select('user_organisation_id', $user_list, $this->user_organisation_id, [
                            'class' => 'form-select px-4 py-3 text-gray-900 dark:text-gray-300 form-control',
                            'id' => 'user_organisation_id',
                            'wire:model' => 'user_organisation_id',
                            'aria-describedby' => 'user_organisation_id',
                            'multiple' => 'multiple',
                            'placeholder' => 'Choose Organisation...',
                        ]) !!}
                    </div>
                    @error('user_organisation_id')
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

                <button wire:click.prevent="step1()" class="btn btn-primary">{{ __('messages.Next') }}</button>
            </div>

            {{-- Step 2 --}}
            <div id="step2" style="display: {{ $currentSection != 2 ? 'none' : '' }}">
                <div wire:ignore class="mb-4">
                    <label for="example-text-input-alt" class="form-label">{{ __('messages.Personen') }}</label>
                    {!! Form::select('person_organisation_id', $person_list, $this->person_organisation_id, [
                        'class' => 'form-select px-4 py-3 text-gray-900 dark:text-gray-300 form-control',
                        'id' => 'person_organisation_id',
                        'wire:model' => 'person_organisation_id',
                        'aria-describedby' => 'person_organisation_id',
                        'multiple' => 'multiple',
                        'style' => 'width: 83.5rem',
                    ]) !!}
                </div>
                @error('person_organisation_id')
                    <span class="help-block">
                        <font color="red"> {{ $message }} </font>
                    </span>
                @enderror
                @if (!empty($inputs1))
                    @foreach ($inputs1 as $key => $value)
                        <div class="mb-4">
                            <label class="form-label"
                                for="example-text-input-alt">{{ __('messages.Funktion') }}</label>
                            <select class="form-control" wire:model.defer="funktion_person_id.{{ $value }}">
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
                <button wire:click.prevent="step2()" class="btn btn-success">{{ __('messages.Finish') }}</button>
            </div>



        </div>
    </div>
    </div>
</form>
@section('styles')
    <link href="{{ asset('assets/select2/select2.min.css') }}" rel="stylesheet" />
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
    <script>
        $(document).ready(function() {
            $('#organisationen_themen_id').select2({
                dropdownCssClass: 'text-gray-900 dark:text-gray-600 font-family-is', // you can add name font
                selectionCssClass: 'text-gray-900 dark:text-gray-600 font-family-is',
                placeholder: "Choose Orgenisationen Themen...",
            });

            $('#organisationen_themen_id').on('change', function(e) {
                livewire.emit('setSomeProperty', $(this).val())
                @this.set('organisationen_themen_id', $(this).val());
            });

            window.addEventListener('cleanData', event => {
                $('#organisationen_themen_id').val('').trigger('change');
            });

            $('#person_organisation_id').select2({
                dropdownCssClass: 'text-gray-900 dark:text-gray-600 font-family-is', // you can add name font
                selectionCssClass: 'text-gray-900 dark:text-gray-600 font-family-is',
                placeholder: "Choose Orgenisationen Themen...",
            });

            $('#person_organisation_id').on('change', function(e) {
                livewire.emit('setSomePerson', $(this).val())
                @this.set('person_organisation_id', $(this).val());
            });

            window.addEventListener('cleanData', event => {
                $('#person_organisation_id').val('').trigger('change');
            });

            $('#user_organisation_id').select2({
                dropdownCssClass: 'text-gray-900 dark:text-gray-600 font-family-is', // you can add name font
                selectionCssClass: 'text-gray-900 dark:text-gray-600 font-family-is',
                placeholder: "Choose Personen Organisation...",
            });

            $('#user_organisation_id').on('change', function(e) {
                @this.set('user_organisation_id', $(this).val());
            });

            window.addEventListener('cleanData', event => {
                $('#user_organisation_id').val('').trigger('change');
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

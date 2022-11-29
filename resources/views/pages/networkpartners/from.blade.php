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
                <label class="form-label" for="example-text-input-alt">{{ __('messages.Bezeichnung') }}</label>
                <span class="text-danger">*</span>
                {!! Form::text('bezeichnung', null, [
                    'class' => 'form-control',
                    'wire:model' => 'bezeichnung',
                    'aria-describedby' => 'bezeichnung',
                    'id' => 'example-text-input-alt',
                    'placeholder' => 'Bezeichnung',
                ]) !!}
                @error('bezeichnung')
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

            <button class="btn btn-primary" wire:click="step1" type="button">{{ __('messages.Next') }}</button>
        </div>
        {{-- Step 2 --}}
        <div id="step2" style="display: {{ $currentSection != 2 ? 'none' : '' }}">

            <div class="mb-4">
                <label class="form-label" for="example-text-input-alt">{{ __('messages.Personen') }}</label>
                <div wire:ignore class="mb-4">
                    {!! Form::select('person_networkpartners_id', $person_list, $this->person_networkpartners_id, [
                        'class' => 'form-select px-4 py-3 text-gray-900 dark:text-gray-300 form-control',
                        'id' => 'person_networkpartners_id',
                        'wire:model' => 'person_networkpartners_id',
                        'aria-describedby' => 'person_networkpartners_id',
                        'multiple' => 'multiple',
                        'style' => 'width: 83.5rem',
                    ]) !!}
                </div>
                @error('person_networkpartners_id')
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

            <button class="btn btn-danger" type="button" wire:click="back(1)">{{ __('messages.Back') }}</button>
            <button class="btn btn-success" wire:click="step2" type="button">{{ __('messages.Finish') }}</button>
        </div>

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
            $('#person_networkpartners_id').select2({
                dropdownCssClass: 'text-gray-900 dark:text-gray-600 font-family-is', // you can add name font
                selectionCssClass: 'text-gray-900 dark:text-gray-600 font-family-is',
                allowClear: true,
                placeholder: "Choose Netzwerk Partner...",
            });

            $('#person_networkpartners_id').on('change', function(e) {
                livewire.emit('setSomeNetwork', $(this).val())
                @this.set('person_networkpartners_id', $(this).val());
            });

            window.addEventListener('cleanData', event => {
                $('#person_networkpartners_id').val('').trigger('change');
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

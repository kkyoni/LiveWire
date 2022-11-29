<form>
    <div class="pt-5">
        <ul class="nav nav-pills nav-fill">
            <li class="nav-item">
                <a class="nav-link {{ $currentSection != 1 ? '' : 'active' }}"
                    href="#step1">{{ __('messages.Grunddaten') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $currentSection != 2 ? '' : 'active' }}"
                    href="#step2">{{ __('messages.Organisationen') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $currentSection != 3 ? '' : 'active' }}"
                    href="#step3">{{ __('messages.Mitglieder') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $currentSection != 4 ? '' : 'active' }}"
                    href="#step4">{{ __('messages.Netzwerkpartner') }}</a>
            </li>
        </ul>
        <div class="row pt-3">

            {{-- Step 1 --}}
            <div id="step1" class="needs-validation" style="display: {{ $currentSection != 1 ? 'none' : '' }}">

                <div class="mb-4">
                    <label class="form-label" for="example-text-input-alt">{{ __('messages.Nachname') }}</label>
                    <span class="text-danger">*</span>
                    {!! Form::text('nachname', null, [
                        'wire:model' => 'nachname',
                        'class' => 'form-control',
                        'id' => 'example-text-input-alt',
                        'aria-describedby' => 'nachname',
                        'placeholder' => 'Nachname',
                    ]) !!}
                    @error('nachname')
                        <span class="help-block">
                            <font color="red"> {{ $message }} </font>
                        </span>
                    @enderror
                </div>


                <div class="mb-4">
                    <label class="form-label" for="example-text-input-alt">{{ __('messages.Vorname') }}</label>
                    <span class="text-danger">*</span>
                    {!! Form::text('vorname', null, [
                        'wire:model' => 'vorname',
                        'class' => 'form-control',
                        'id' => 'example-text-input-alt',
                        'aria-describedby' => 'vorname',
                        'placeholder' => 'vorname',
                    ]) !!}
                    @error('vorname')
                        <span class="help-block">
                            <font color="red"> {{ $message }} </font>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label" for="example-text-input-alt">{{ __('messages.Anrede') }}</label>
                    <span class="text-danger">*</span>
                    {!! Form::select('anrede_id', $anrede_list, $this->anrede_id, [
                        'class' => 'form-control',
                        'id' => 'anrede_id',
                        'wire:model' => 'anrede_id',
                        'aria-describedby' => 'anrede_id',
                        'placeholder' => 'Choose Anrede...',
                    ]) !!}
                    @error('anrede_id')
                        <span class="help-block">
                            <font color="red"> {{ $message }} </font>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label"
                        for="example-text-input-alt">{{ __('messages.Anrede Brief alternativ') }}</label>
                    {!! Form::text('anrede_brief_manuell', null, [
                        'wire:model' => 'anrede_brief_manuell',
                        'class' => 'form-control',
                        'id' => 'example-text-input-alt',
                        'aria-describedby' => 'anrede_brief_manuell',
                        'placeholder' => 'anrede_brief_manuell',
                    ]) !!}
                    @error('anrede_brief_manuell')
                        <span class="help-block">
                            <font color="red"> {{ $message }} </font>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label"
                        for="example-text-input-alt">{{ __('messages.Anrede Adresse alternativ') }}</label>
                    {!! Form::text('anrede_adresse_manuell', null, [
                        'wire:model' => 'anrede_adresse_manuell',
                        'class' => 'form-control',
                        'id' => 'example-text-input-alt',
                        'aria-describedby' => 'anrede_adresse_manuell',
                        'placeholder' => 'anrede_adresse_manuell',
                    ]) !!}
                    @error('anrede_adresse_manuell')
                        <span class="help-block">
                            <font color="red"> {{ $message }} </font>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label"
                        for="example-text-input-alt">{{ __('messages.Titel vorangestellt') }}</label>
                    {!! Form::select('titel_id', $titel_vorangestellt_list, $this->titel_id, [
                        'class' => 'form-control',
                        'id' => 'titel_id',
                        'wire:model' => 'titel_id',
                        'aria-describedby' => 'titel_id',
                        'placeholder' => 'Choose Titel Vorangestellt...',
                    ]) !!}
                    @error('titel_id')
                        <span class="help-block">
                            <font color="red"> {{ $message }} </font>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label" for="example-text-input-alt">{{ __('messages.Titel verliehen') }}</label>
                    {!! Form::select('titel_verliehen_id', $titel_verliehen_list, $this->titel_verliehen_id, [
                        'class' => 'form-control',
                        'id' => 'titel_verliehen_id',
                        'wire:model' => 'titel_verliehen_id',
                        'aria-describedby' => 'titel_verliehen_id',
                        'placeholder' => 'Choose Title Verliehen...',
                    ]) !!}
                    @error('titel_verliehen_id')
                        <span class="help-block">
                            <font color="red"> {{ $message }} </font>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label"
                        for="example-text-input-alt">{{ __('messages.Titel nachgestellt') }}</label>
                    {!! Form::select('titel_nachgestellt_id', $titel_nachgestellt_list, $this->titel_nachgestellt_id, [
                        'class' => 'form-control',
                        'id' => 'titel_nachgestellt_id',
                        'wire:model' => 'titel_nachgestellt_id',
                        'aria-describedby' => 'titel_nachgestellt_id',
                        'placeholder' => 'Choose Titel Nachgestellt...',
                    ]) !!}
                    @error('titel_nachgestellt_id')
                        <span class="help-block">
                            <font color="red"> {{ $message }} </font>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label" for="example-text-input-alt">{{ __('messages.E-Mail') }}</label>
                    <span class="text-danger">*</span>
                    {!! Form::text('email', null, [
                        'wire:model' => 'email',
                        'class' => 'form-control',
                        'id' => 'example-text-input-alt',
                        'aria-describedby' => 'email',
                        'placeholder' => 'email',
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
                    <label class="form-label" for="example-text-input-alt">{{ __('messages.Handy') }}</label>
                    {!! Form::text('mobil', null, [
                        'wire:model' => 'mobil',
                        'class' => 'form-control',
                        'id' => 'example-text-input-alt',
                        'aria-describedby' => 'mobil',
                        'placeholder' => 'Handy',
                    ]) !!}
                    @error('mobil')
                        <span class="help-block">
                            <font color="red"> {{ $message }} </font>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label" for="example-text-input-alt">{{ __('messages.E-Mail 2') }}</label>
                    {!! Form::text('email2', null, [
                        'wire:model' => 'email2',
                        'class' => 'form-control',
                        'id' => 'example-text-input-alt',
                        'aria-describedby' => 'email2',
                        'placeholder' => 'email2',
                    ]) !!}
                    @error('email2')
                        <span class="help-block">
                            <font color="red"> {{ $message }} </font>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label" for="example-text-input-alt">{{ __('messages.Telefon 2') }}</label>
                    {!! Form::text('telefon2', null, [
                        'class' => 'js-masked-phone1 form-control',
                        'wire:model' => 'telefon2',
                        'aria-describedby' => 'telefon2',
                        'id' => 'js-masked-phone1',
                        'placeholder' => '+99 999-999-9999',
                    ]) !!}
                    @error('telefon2')
                        <span class="help-block">
                            <font color="red"> {{ $message }} </font>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label" for="example-text-input-alt">{{ __('messages.Handy 2') }}</label>
                    {!! Form::text('mobil2', null, [
                        'wire:model' => 'mobil2',
                        'class' => 'form-control',
                        'id' => 'example-text-input-alt',
                        'aria-describedby' => 'mobil2',
                        'placeholder' => 'Handy2    ',
                    ]) !!}
                    @error('mobil2')
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
                    <label class="form-label" for="person_themen_id">{{ __('messages.Themengebiete') }}</label>

                    <div wire:ignore class="mb-4">

                        {!! Form::select('person_themen_id', $topic_list, $this->person_themen_id, [
                            'class' => 'form-select px-4 py-3 text-gray-900 dark:text-gray-300 form-control',
                            'id' => 'person_themen_id',
                            'wire:model' => 'person_themen_id',
                            'aria-describedby' => 'person_themen_id',
                            'multiple' => 'multiple',
                        ]) !!}
                    </div>
                    @error('person_themen_id')
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
                    <label class="form-label" for="example-text-input-alt">{{ __('messages.Assistenz') }}</label>
                    {!! Form::select('person_id_assistenz', $person_assistenz_list, $this->person_id_assistenz, [
                        'class' => 'form-control',
                        'id' => 'person_id_assistenz',
                        'wire:model' => 'person_id_assistenz',
                        'aria-describedby' => 'person_id_assistenz',
                        'placeholder' => 'Choose Preson Assistenz...',
                    ]) !!}
                    @error('person_id_assistenz')
                        <span class="help-block">
                            <font color="red"> {{ $message }} </font>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label" for="example-text-input-alt">{{ __('messages.Assistenz 2') }}</label>
                    {!! Form::select('person_id_assistenz2', $person_assistenz2_list, $this->person_id_assistenz2, [
                        'class' => 'form-control',
                        'id' => 'person_id_assistenz2',
                        'wire:model' => 'person_id_assistenz2',
                        'aria-describedby' => 'person_id_assistenz2',
                        'placeholder' => 'Choose Preson Assistenz2...',
                    ]) !!}
                    @error('person_id_assistenz2')
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
                    {!! Form::select('status_person_id', $status_list, $this->status_person_id, [
                        'class' => 'form-control',
                        'id' => 'status_person_id',
                        'wire:model' => 'status_person_id',
                        'aria-describedby' => 'status_person_id',
                        'placeholder' => 'Choose Status...',
                    ]) !!}
                    @error('status_person_id')
                        <span class="help-block">
                            <font color="red"> {{ $message }} </font>
                        </span>
                    @enderror
                </div>


                <div class="mb-4">
                    <label class="form-label" for="example-text-input-alt">{{ __('messages.Sprache') }}</label>
                    <span class="text-danger">*</span>
                    <div class="i-checks">
                        <label>
                            {{ Form::radio('sprache', 'de', true, ['id' => 'de', 'class' => 'form-check-input', 'wire:model' => 'sprache', 'aria-describedby' => 'sprache']) }}
                            <i></i> de
                        </label>
                        <label>
                            {{ Form::radio('sprache', 'en', false, ['id' => 'en', 'class' => 'form-check-input', 'wire:model' => 'sprache', 'aria-describedby' => 'sprache']) }}
                            <i></i> en
                        </label>
                    </div>
                    @error('sprache')
                        <span class="help-block">
                            <font color="red"> {{ $message }} </font>
                        </span>
                    @enderror
                </div>

                <button wire:click.prevent="step1()" class="btn btn-primary">{{ __('messages.Next') }}</button>
            </div>

            {{-- Step 2 --}}
            <div id="step2" style="display: {{ $currentSection != 2 ? 'none' : '' }};" class="needs-validation">

                <div class="mb-4">
                    <label class="form-label" for="person_organisation_id">{{ __('messages.Organisations') }}</label>
                    <div wire:ignore class="mb-4">
                        {!! Form::select('person_organisation_id', $organisations_list, $this->person_organisation_id, [
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
                                <select class="form-control"
                                    wire:model.defer="funktion_organisation_id.{{ $value }}">
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
                                    wire:model.defer="abteilung_organisation.{{ $value }}"
                                    aria-describedby='abteilung' placeholder='abteilung'>

                            </div>
                        @endforeach
                    @endif

                </div>

                <button class="btn btn-danger" type="button"
                    wire:click="back(1)">{{ __('messages.Back') }}</button>
                <button wire:click.prevent="step2()" class="btn btn-primary">{{ __('messages.Next') }}</button>
            </div>

            {{-- Step 3 --}}
            <div id="step3" style="display: {{ $currentSection != 3 ? 'none' : '' }};" class="needs-validation">

                <div class="mb-4">
                    <label class="form-label" for="person_mitglied_id">{{ __('messages.Mitglied') }}</label>
                    <div wire:ignore class="mb-4">
                        {!! Form::select('person_mitglied_id', $branchoffice_list, $this->person_mitglied_id, [
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
                                <select class="form-control"
                                    wire:model.defer="funktion_mitglied_id.{{ $value }}">
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
                                    wire:model.defer="abteilung_mitglied.{{ $value }}"
                                    aria-describedby='abteilung' placeholder='abteilung'>
                            </div>
                        @endforeach
                    @endif
                </div>

                <button class="btn btn-danger" type="button"
                    wire:click="back(2)">{{ __('messages.Back') }}</button>
                <button wire:click.prevent="step3()" class="btn btn-primary">{{ __('messages.Next') }}</button>
            </div>

            {{-- Step 4 --}}
            <div id="step4" style="display: {{ $currentSection != 4 ? 'none' : '' }}">
                <div class="mb-3">
                    <label class="form-label"
                        for="example-text-input-alt">{{ __('messages.Netzwerkpartner') }}</label>
                    <div wire:ignore>
                        {!! Form::select('person_stakeholder_id', $networkpartner_list, $this->person_stakeholder_id, [
                            'class' => 'form-select px-4 py-3 text-gray-900 dark:text-gray-300 form-control',
                            'id' => 'person_stakeholder_id',
                            'wire:model' => 'person_stakeholder_id',
                            'aria-describedby' => 'person_stakeholder_id',
                            'multiple' => 'multiple',
                            'placeholder' => 'Choose Organisation...',
                            'style' => 'width: 83.5rem',
                        ]) !!}
                    </div>
                    @error('person_stakeholder_id')
                        <span class="help-block">
                            <font color="red"> {{ $message }} </font>
                        </span>
                    @enderror

                    @if (!empty($inputs3))
                        @foreach ($inputs3 as $key => $value)
                            <div class="mb-4">
                                <label class="form-label"
                                    for="example-text-input-alt">{{ __('messages.Funktion') }}</label>
                                <select class="form-control"
                                    wire:model.defer="funktion_netzwerkpartner_id.{{ $value }}">
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
                                    wire:model.defer="abteilung_netzwerkpartner.{{ $value }}"
                                    aria-describedby='abteilung' placeholder='abteilung'>
                            </div>
                        @endforeach
                    @endif
                </div>

                <button class="btn btn-danger" type="button"
                    wire:click="back(3)">{{ __('messages.Back') }}</button>
                <button wire:click.prevent="step4()" class="btn btn-success">{{ __('messages.Finish') }}</button>
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

            $('#person_themen_id').select2({
                dropdownCssClass: 'text-gray-900 dark:text-gray-600 font-family-is', // you can add name font
                selectionCssClass: 'text-gray-900 dark:text-gray-600 font-family-is',
                allowClear: true,
                placeholder: "Choose Person Themen...",
            });

            $('#person_themen_id').on('change', function(e) {
                livewire.emit('setSomePerson', $(this).val())
                @this.set('person_themen_id', $(this).val());

            });

            window.addEventListener('cleanData', event => {
                $('#person_themen_id').val('').trigger('change');
            });


            $('#person_organisation_id').select2({
                dropdownCssClass: 'text-gray-900 dark:text-gray-600 font-family-is', // you can add name font
                selectionCssClass: 'text-gray-900 dark:text-gray-600 font-family-is',
                allowClear: true,
                placeholder: "Choose Person Themen...",
            });

            $('#person_organisation_id').on('change', function(e) {
                livewire.emit('setSomeOrganisation', $(this).val())
                @this.set('person_organisation_id', $(this).val());

            });

            window.addEventListener('cleanData', event => {
                $('#person_organisation_id').val('').trigger('change');
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

            $('#person_stakeholder_id').select2({
                dropdownCssClass: 'text-gray-900 dark:text-gray-600 font-family-is', // you can add name font
                selectionCssClass: 'text-gray-900 dark:text-gray-600 font-family-is',
                placeholder: "Choose Personen Organisation...",
            });

            $('#person_stakeholder_id').on('change', function(e) {
                livewire.emit('setSomeNetworkPartner', $(this).val())
                @this.set('person_stakeholder_id', $(this).val());
            });

            window.addEventListener('cleanData', event => {
                $('#person_stakeholder_id').val('').trigger('change');
            });

            jQuery('.js-masked-phone').mask('+99 999-999-9999');

            $('#js-masked-phone').on('change', function(e) {
                @this.set('telefon', $(this).val());
            });

            window.addEventListener('cleanData', event => {
                $('#js-masked-phone').val('').trigger('change');
            });

            jQuery('.js-masked-phone1').mask('+99 999-999-9999');

            $('#js-masked-phone1').on('change', function(e) {
                @this.set('telefon2', $(this).val());
            });

            window.addEventListener('cleanData', event => {
                $('#js-masked-phone1').val('').trigger('change');
            });
        });
    </script>
    <script src="{{ asset('assets/js/plugins/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
@endsection

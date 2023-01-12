<form wire:submit.prevent="formSubmit">
    {{-- {{ var_dump($selectedDays) }} --}}
    <div class="mb-6">
        @include('components.form-field', [
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text',
            'placeholder' => 'Enter name',
            'required' => 'required',
        ])
    </div>

    <div class="mb-6">
        @include('components.form-field', [
            'name' => 'description',
            'label' => 'Description',
            'type' => 'textarea',
            'placeholder' => 'Enter description',
            'required' => 'required',
        ])
    </div>

    <div class="mb-6">
        @include('components.form-field', [
            'name' => 'price',
            'label' => 'Price',
            'type' => 'number',
            'placeholder' => 'Add price',
            'required' => 'required',
        ])
    </div>

    <div class="flex items-center mb-6">
        <div class="w-full mr-4">
            <label class="lms-label" for="days">Days</label>
            <div class="flex flex-wrap -mx-4">
                @foreach ($days as $day)
                    <div class="min-w-max flex items-center px-4">
                        <input wire:model.lazy="selectedDays" class="mr-2" type="checkbox" value="{{ $day }}"
                            id="{{ $day }}"> <label for="{{ $day }}">{{ ucfirst($day) }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="min-w-max mr-4">
            @include('components.form-field', [
                'name' => 'time',
                'label' => 'Time',
                'type' => 'time',
                'placeholder' => 'Enter time',
                'required' => 'required',
            ])
        </div>

        <div class="min-w-max">
            @include('components.form-field', [
                'name' => 'end_date',
                'label' => 'End date',
                'type' => 'date',
                'placeholder' => 'Enter end date',
                'required' => 'required',
            ])
        </div>
    </div>

    @include('components.wire-loading-btn', [
        'for' => 'formSubmit',
        'text' => 'Submit',
    ])
</form>

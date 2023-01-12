<div>
    <form wire:submit.prevent="search" class="flex items-center mb-6">
        <input wire:model.lazy="search" type="text" class="lms-input" placeholder="Search" required />
        <span class="ml-4"><button type="submit" class="lms-btn">Search</button></span>
    </form>

    @if (count($leads) > 0)
        <form wire:submit.prevent='admit'>
            <div class="mb-4">
                <select wire:model.lazy="lead_id" class="lms-input">
                    <option value="">Select lead</option>
                    @foreach ($leads as $lead)
                        <option value="{{ $lead->id }}">{{ $lead->name }} - {{ $lead->phone }}</option>
                    @endforeach
                </select>
            </div>

            @if (!empty($lead_id))
                <div class="mb-4">
                    <select wire:change="courseSelected" wire:model.lazy="course_id" class="lms-input">
                        <option value="">Select course</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                </div>
            @endif

            @if (!empty($selectedCourse))
                <p class="mb-4">Price: ${{ number_format($selectedCourse->price, 2) }}</p>

                <div class="mb-4">
                    <input wire:model.lazy="payment" type="number" step=".01"
                        max="{{ number_format($selectedCourse->price, 2) }}" class="lms-input"
                        placeholder="Payment now" />
                </div>

                @include('components.wire-loading-btn', [
                    'for' => 'admit',
                    'text' => 'Submit',
                ])
            @endif
        </form>
    @endif
</div>

<div>
    <form wire:submit.prevent="submitForm" class="mb-6">
        <div class="flex -mx-4 mb-4">
            <div class="flex-1 px-4">
                <label for="" class="lms-label">Name</label>
                <input wire:model.lazy="name" type="text" class="lms-input">

                @error('name')
                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex-1 px-4"> <label for="" class="lms-label">Email</label>
                <input wire:model.lazy="email" type="text" class="lms-input">

                @error('email')
                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex-1 px-4"><label for="" class="lms-label">Phone</label>
                <input wire:model.lazy="phone" type="text" class="lms-input">

                @error('phone')
                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>

        @include('components.icons.wire-loading-btn')
    </form>

    <h1 class="font-bold text-lg mb-4">Notes</h1>
    @foreach ($notes as $note)
        <div class="mb-4 border border-gray-100 p-4">{{ $note->description }}</div>
    @endforeach

    <h4 class="font-bold mb-2">Add new note</h4>
    <form wire:submit.prevent="addNote">
        <div class="mb-4">
            <textarea wire:model.lazy="note" class="lms-input" placeholder="Type note"></textarea>
        </div>
        <button class="lms-btn" type="submit">Save</button>
    </form>


</div>
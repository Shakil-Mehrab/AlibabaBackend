@props([
    'multiple' => false,
])

<div class="flex" wire:ignore>
    <select {{ $multiple ? 'multiple' : '' }} {{ $attributes->merge(['class' => 'select2 form-select block w-full text-base leading-6 border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5']) }}>
        {{ $slot }}
    </select>
</div>


@push('scripts')
<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: 'Select an option',
            width: '100%'
        });

        $('.select2').on('select2:select', function (e) {
            var data = e.params.data.id;
            // console.log(data);
            // @this.upload('{{ $attributes['wire:model'] }}')
            @this.set('select2Data', data);
        });

        $('.select2').on('select2:unselect', function (e) {
            var data = e.params.data.id;
            // console.log(data);
            @this.set('select2Data', data);
        });

    });
</script>
@endpush

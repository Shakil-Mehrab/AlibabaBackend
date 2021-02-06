<div
    wire:ignore
    class="m-3 border-dashed border-2"
    x-data="{
        initFilepond () {
            FilePond.registerPlugin(FilePondPluginImagePreview);
            const pond = FilePond.create(this.$refs.filepond, {
                {{-- onprocessfile: (error, file) => {
                    pond.removeFile(file.id)

                    if (pond.getFiles().length === 0) {
                        @this.set('showingUploadForm', false)
                    }
                }, --}}

                allowRevert: false,
                maxFiles: 10,
                allowMultiple: true,
                instantUpload: true,
                server: {
                    process: (fileName, file, metadata, load, error, progress, abort, transfer, options) => {
                        @this.upload('{{ $attributes['wire:model'] }}', file, load, error, progress)
                    },
                    {{-- revert: (filename, load) => {
                        @this.removeUpload('{{ $attributes['wire:model'] }}', filename, load)
                    }, --}}
                },
            })
        }
    }"
    x-init="initFilepond"
>
    <input type="file" x-ref="filepond">
</div>

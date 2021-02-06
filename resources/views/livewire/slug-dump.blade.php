<div wire:ignore>
    <div x-data="abc()" x-init="$watch('customSlug', value => console.log(value))">
        <x-jet-input {{ $attributes }} id="slug" type="text" class="mt-1 block w-full" x-on:input="customSlug = $event.target.value" placeholder="Slug" />
        <div x-text="customSlug" class="mt-1 block w-full"></div>
        <div class="flex justify-between items-center mt-2">
            <a href="#" x-show="!isEditing" x-on:click.prevent="isEditing = true">Edit</a>
            <a href="#" x-on:click.prevent="editConfirm()">Confirm Edit</a>
            <a href="#" x-on:click.prevent="editCancel()">Cancel Edit</a>
            <a href="#" x-on:click.prevent="editReset()">Reset</a>
        </div>
    </div>

    <script>
        function abc() {
            return {
                    title: 'new title',
                    slug: '',
                    isEditing: false,
                    customSlug: '',
                    wasEdited: false,
                    editNow() {
                        this.customSlug = this.slug;
                        this.isEditing = true;
                    },
                    editConfirm() {
                        if (this.customSlug !== this.slug) {
                            this.wasEdited = true;
                        }
                        this.setSlug(this.customSlug);
                        this.isEditing = false;
                    },
                    editCancel() {
                        this.isEditing = false;
                    },
                    editReset() {
                        this.setSlug(this.title);
                        console.log(this.title);
                        console.log(this.slug);
                        this.wasEdited = false;
                        this.isEditing = false;
                    },
                    setSlug(newVal, count = 0) {
                        if (newVal === "") {
                            return "";
                        }

                        let slug = this.slugify(newVal + (count > 0 ? `-${count}` : ""));

                        this.slug = slug;

                        return this.slug;
                    },
                    slugify(value, delimiter = "-") {
                        return _.trim(value.replace(/[&\/\\#,+()$~%.।'":*?`@^;ঃ<>{}]/g, ""))
                            .replace(/ +/g, " ")
                            .replace(/\s/g, delimiter);

                        const a = "àáäâãåăæçèéëêǵḧìíïîḿńǹñòóöôœṕŕßśșțùúüûǘẃẍÿź·/_,:;";
                        const b = "aaaaaaaaceeeeghiiiimnnnoooooprssstuuuuuwxyz------";
                        const p = new RegExp(a.split("").join("|"), "g");
                        return value
                            .toString()
                            .toLowerCase()
                            .replace(/\s+/g, "-") // Replace spaces with -
                            .replace(p, (c) => b.charAt(a.indexOf(c))) // Replace special characters
                            .replace(/&/g, "-and-") // Replace & with ‘and’
                            .replace(/[^\w\-]+/g, "") // Remove all non-word characters
                            .replace(/\-\-+/g, "-") // Replace multiple - with single -
                            .replace(/^-+/, "") // Trim - from start of text
                            .replace(/-+$/, ""); // Trim - from end of text
                    },
                }
        }
    </script>
</div>


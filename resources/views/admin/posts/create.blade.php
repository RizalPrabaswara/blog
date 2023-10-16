<x-layout>

    <x-setting heading="Publish New Post">
        <form action="/admin/posts" method="post" enctype="multipart/form-data">
            @csrf

            <x-form.input name="title" />

            <x-form.input name="slug" />

            <x-form.input name="thumbnail" type="file" />

            <x-form.textarea name="excerpt" />

            <x-form.textarea name="body" />

            <x-form.dropdown name="category_id" />

            <x-submit-button>Publish</x-submit-button>
        </form>
    </x-setting>

</x-layout>

@auth
    <x-panel>
        <form action="/post/{{ $post->slug }}/comments" method="post">
            @csrf
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/40?u={{ auth()->id() }}" alt="" width="40" height="40"
                    class="rounded-full">
                <h2 class="ml-4">Want To Participate?</h2>
            </header>

            <div class="mt-4">
                <textarea name="body" id="body" rows="5" class="w-full text-sm focus:outline-none focus:ring"
                    placeholder="You Can Write Your Comment Here......" required></textarea>

                @error('body')
                    <span class="text-xs text-red-50">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end mt-4 pt-4 border-t border-gray-200">
                <x-submit-button>
                    Add Comment
                </x-submit-button>
            </div>
        </form>
    </x-panel>
@else
    <p>
        You Need To <a href="/login" class="hover:underline">Login</a> or <a href="/register"
            class="hover:underline">Register</a> First to Comment
    </p>
@endauth

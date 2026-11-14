<x-layout>
    <x-slot:title>
        Edit Post
    </x-slot:title>

    <div class="card bg-base">
        <div class="card-body">
            <form method='POST' action='/posts/{{$post->id}}'>
                @csrf
                @method('PUT')

                <div class="form-control">
                        <input type='text' name='title' class='input m-5' value='{{$post->title}}' required>
                    </div>

                <div class="form-control w-full">
                    <textarea
                        name='description'
                        class='textarea textarea-bordered w-full'
                        rows='4'
                        maxlength='256'
                        required
                    >{{old('message', $post->description)}}</textarea>

                    @error('message')
                        <div class="label">
                            <span class='label-text-alt text-error'>{{$message}}</span>
                        </div>
                    @enderror
                </div>

                <div class="card-actions">
                    <a href='/' class='btn btn-ghost btn-sm'>
                        Cancel
                    </a>
                    <button type='submit' class='btn btn-primary btn-sm'>
                        Update Post
                    </button>
                </div>

            </form>
        </div>
    </div>



</x-layout>
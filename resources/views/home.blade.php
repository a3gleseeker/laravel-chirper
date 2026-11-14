<x-layout>
    <x-slot:title>
        Home Feed Ahh
    </x-slot:title>



    <div class="max-w-2xl mx-auto">

        <!-- Post Form-->
        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <form method='POST' action="/posts">
                    @csrf
                    <div class="form-control">
                        <input type='text' name='title' class='input m-5' placeholder='Post title' required>
                    </div>

                    <div class="form-control w-full">
                        <textarea
                            name='desc'
                            placeholder='what are you posting about?'
                            class='textarea textarea-bordered w-full'
                            rows='4'
                            maxlength='255'
                            required    
                        >{{old('message')}}</textarea>

                        @error('message')
                            <div class="label">
                                <span class='label-text-alt'>
                                    {{'message'}}
                                </span>
                            </div>
                        @enderror   

                    </div> 

                    <div class="mt-8 flex items-center justify-end">
                        <button type='submit' class='btn btn-primary'>Post!</button>
                    </div>
                </form>
            </div>
        </div>


        <div class="space-y-4 mt-8">
            @forelse ($posts as $post)
                <x-post :post="$post" />
            @empty
                <p class="text-gray-500">No chirps yet. Be the first to chirp!</p>
            @endforelse
        </div>
    </div>
</x-layout>
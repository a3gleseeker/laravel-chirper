@props(['post'])

<div class="card bg-base-100 shadow">
    <div class="card-body">
        <div class="flex space-x-3">
            @if($post->user)
                <div class="avatar">
                    <div class="size-10 rounded-full">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSmhLGbO-BtiD9VaAaeWazaT_519ImrOVlrYh63X70ALSJmCH0Eo4tTkeu4&s=10"
                            alt="{{ $post->user->name }}'s avatar"
                            class="rounded-full" 
                            style='width: 50px; height: 50px;'
                             />

                    </div>
                </div>
            @else
                <div class="avatar placeholder">
                    <div class="size-10 rounded-full">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSmhLGbO-BtiD9VaAaeWazaT_519ImrOVlrYh63X70ALSJmCH0Eo4tTkeu4&s=10"
                            alt="anon user ahh"
                            class="rounded-full" 
                            style='width: 50px; height: 50px;'
                            />
                    </div>
                </div>
            @endif

            <div class="min-w-0">
                <div class="flex items-center gap-1">
                    <span class="text-sm font-semibold"> {{ $post->user ? $post->user->name : 'Anonymous' }}</span>
                    <span class="text-base-content/60"> ·</span>
                    <span class="text-sm text-base-content/60"> {{ $post->created_at->diffForHumans() }}</span>
                    @if($post->updated_at->gt($post->created_at->addSeconds(5)))
                        <span class='text-base-content/60'>.</span>
                        <span class='text-sm text-base-content/60 italic'>edited</span>
                    @endif
                </div>

                <div class="py-5">
                    <h1><strong>{{$post->title}}</strong></h1>
                </div>

                <div class="flex gap-1">
                    <a href="/posts/{{$post->id}}/edit" class="btn btn-ghost btn xs">
                        Edit 
                    </a>
                    <form method='POST' action='/posts/{{$post->id}}'>
                        @csrf
                        @method('DELETE')
                        <button type='submit'
                            onclick="return confirm('Are you sure you want to delete post?')"
                            class='btn btn-ghost btn-xs text-error'
                            >Delete
                        </button>
                    </form>
                </div>

                <p class="mt-1">
                    
                    {{ $post->description }}
                </p>
            </div>

        </div>
    </div>
</div>
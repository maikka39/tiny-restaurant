<div class="block">
    <h2 class="title is-size-1 has-text-weight-normal">Aanstaande projecten</h2>
    <p class="subtitle is-size-3 mt-5">Hier is een korte agenda om te zien wat de aankomende projecten van het Tiny Restaurant zijn.</p>
    <a href="{{ route('project.showAll') }}" class="button is-primary">Bekijk alle projecten</a>
</div>

<div class="columns">
    @forelse ($projects as $project)
        @php 
            $image = $project->image('project_image', 'flexible') ?? null; 
            $alt = $project->imageAltText('project_image') ?? null;
        @endphp

        <div class="column">
            <div class="card project-card">
                @if ($image)
                    <div class="card-image">
                        <figure class="image is-3by2">
                            <img class="project-image" src="{{ $image }}" alt="{{ $alt }}">
                        </figure>
                    </div>
                @endif
                
                <div class="card-content">
                    <p class="title is-4">{{ $project->name }}</p>
                    <p class="subtitle is-6">{{ $project->created_at->format('d-m-Y') }}</p>
                    
                    <div class="content">{!! $project->description !!}</div>
                    
                    <a href="{{ route('project.show', $project->slug) }}">Lees meer</a>
                </div>
            </div>
        </div>
    @empty
        <div class="column">
            <p>Er zijn geen projecten!</p>
        </div>
    @endforelse
</div>

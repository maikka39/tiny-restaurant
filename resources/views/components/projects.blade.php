<div class="block">
    <h2 class="title is-size-1 has-text-weight-normal">Aanstaande projecten</h2>
    <p class="subtitle is-size-3 mt-5">Hier is een korte agenda om te zien wat de aankomende projecten van het Tiny Restaurant zijn.</p>
    <a href="{{ route('project.showAll') }}" class="button is-primary">Bekijk alle projecten</a>
</div>

<div class="columns">
    @forelse ($projects as $project)
        @php 
            $image = $project->imagesAsArrays('project_image', 'flexible')[0] ?? null;
        @endphp

        <div class="column">
            <div class="card project-card">
                <div class="card-image">
                    <figure class="image is-3by2">
                        @if ($image)
                            <img class="project-image" src="{{ $image['src'] }}" alt="{{ $image['alt'] }}">
                        @else
                            <img class="project-image" src="{{ asset('img/news-placeholder.png') }}" alt="project-placeholder image">
                        @endif
                    </figure>
                </div>
                
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

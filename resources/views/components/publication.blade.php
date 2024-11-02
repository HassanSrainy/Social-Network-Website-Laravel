<div class="card mb-4 shadow-sm border-0" onclick="window.location='{{ route('publications.show', $publication->id) }}';">
    <div class="card-body">
        <div class="d-flex align-items-center mb-3">
            <div class="me-3">
                <a href="{{ route('profiles.show', $publication->profile->id) }}">
                    <img class="rounded-circle" src="{{ asset('storage/' . $publication->profile->image) }}" width="80px" height="80px" alt="Profile Image">
                </a>
            </div>
            <div>
                <h5 class="mb-0">{{ $publication->profile->name }}</h5>
                <small class="text-muted">Publié le {{ $publication->created_at->format('d/m/Y H:i') }}</small>
            </div>
        </div>

        @auth
        @if($canUpdate === true)
        <div class="d-flex justify-content-end mb-3">
            <a class="btn btn-primary btn-sm me-2" href="{{ route('publications.edit', $publication->id) }}">
                <i class="bi bi-pencil-square"></i> Modifier
            </a>
            <form action="{{ route('publications.destroy', $publication->id) }}" method="POST" class="d-inline-block">
                @csrf
                @method("DELETE")
                <button onclick="return confirm('Voulez-vous vraiment supprimer cette publication ?');" class="btn btn-danger btn-sm">
                    <i class="bi bi-trash"></i> Supprimer
                </button>
            </form>
        </div>
        @endif
        @endauth

        <h4 class="card-title fw-bold">{{ $publication->titre }}</h4>
        <p class="card-text">{{ $publication->body }}</p>
    </div>

    @if (!is_null($publication->image))
        <img class="img-fluid w-100" src="{{ asset('storage/' . $publication->image) }}" alt="Publication Image">
    @endif

    <div class="card-footer bg-transparent">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <span onclick="location.href='{{ route('like', $publication) }}';" style="cursor: pointer;">
                    <i class="bi bi-hand-thumbs-up me-3" style="font-size: 1.2rem;">
                        <span>({{ $publication->likeCount() }})</span>
                    </i>
                </span>
                <span onclick="location.href='{{ route('dislike', $publication) }}';" style="cursor: pointer;">
                    <i class="bi bi-hand-thumbs-down me-3" style="font-size: 1.2rem;">
                        <span>({{ $publication->dislikeCount() }})</span>
                    </i>
                </span>
                
                <i class="bi bi-chat-dots" style="font-size: 1.2rem;"><span>{{ $publication->nbrComments }}</span></i>
            </div>
            
            <small class="text-muted">Dernière mise à jour {{ $publication->updated_at->format('d/m/Y H:i') }}</small>
        </div>
    </div>
</div>

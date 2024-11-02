
  <div class="card" style="width: 18rem;">
    <img src="{{ asset('storage/'.$profile->image) }}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{ $profile->name }} </h5> 
      <p class="card-text">{{ Str::limit($profile->bio, 20) }}</p>
      <a href="{{ route('profiles.show', $profile->id) }}" class="stretched-link"></a>

    </div>
    @if($canUpdate === true)
    <div class="card-foot border-top px-3 py-3 bg-light" style="z-index: 9;">
      <form action="{{route('profiles.destroy',$profile->id)}}" method="POST">
        @method('DELETE')
        @csrf
          <button class="btn btn-danger btn-sm float-end" onclick="return confirm('Voulez-vous vraiment supprimer cet élément ?');">Supprimer</button>
      </form>
      <form action="{{route('profiles.edit',$profile->id)}}" method="GET">
        @csrf
        <button class="btn btn-primary btn-sm float-end" style="margin-right:2%;">Modifier</button>
    </form>
  </div>
  @endif

  </div>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
      <a class="navbar-brand" href="#">
          <i class="fas fa-home"></i> Social network
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              
              <li class="nav-item">
                  <a class="nav-link" href="{{route('homepage')}}" rel="noopener noreferrer">
                      <i class="fas fa-home"></i> Accueil
                  </a>
              </li>
              
              @guest
              <li class="nav-item">
                  <a class="nav-link" href="{{route('login.show')}}" rel="noopener noreferrer">
                      <i class="fas fa-sign-in-alt"></i> Se connecter
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('profiles.create') }}" rel="noopener noreferrer">
                      <i class="fas fa-user-plus"></i> S'inscrire
                  </a>
              </li>
              @endguest
              
              @auth
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('profiles.index') }}" rel="noopener noreferrer">
                      <i class="fas fa-users"></i> Tous les profils
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('publications.index') }}" rel="noopener noreferrer">
                      <i class="fas fa-book"></i> Publications
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('publications.create') }}" rel="noopener noreferrer">
                      <i class="fas fa-plus-circle"></i> Ajouter publication
                  </a>
              </li>
              
              <!-- Icône de notification statique -->
              <li class="nav-item">
                  <a class="nav-link" href="#" rel="noopener noreferrer">
                      <i class="fas fa-bell"></i> Notifications
                  </a>
              </li>
              
          </ul>
          
          <div class="dropdown">
            <button class="btn btn-light dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="Profile Image" class="rounded-circle me-2 border" width="35" height="35">
                <span class="fw-semibold">{{ auth()->user()->name }}</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow">
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="{{route('profiles.show', auth()->user()->id)}}">
                        <i class="fas fa-user me-2"></i> Mon Profil
                    </a>
                </li>
                <li>
                    <a class="dropdown-item d-flex align-items-center text-danger" href="{{ route('login.logout') }}" rel="noopener noreferrer">
                        <i class="fas fa-sign-out-alt me-2"></i> Déconnexion
                    </a>
                </li>
            </ul>
        </div>
        
          
          @endauth
          
      </div>
  </div>
</nav>

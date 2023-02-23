<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <p class="navbar-brand m-0">MIN-CRM</p>
    @if(auth()->check())
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/companies">Companies</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/employees">Employees</a>
          </li>
        </ul>

      </div>
      <a style="display:inline" class="nav-link" 
          href="{{ route('logout') }}"
      onclick="event.preventDefault();document.getElementById('logout-form').submit();">
          log out
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
    @endif
  </div>
</nav>
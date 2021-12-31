<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light py-5">
      <div class="container">
          <a class="navbar-brand" href="/">RITE</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-between" id="navbarNav">

            <ul class="navbar-nav ">
              <li class="nav-item">
                <a class="nav-link {{ ($active === 'home') ? 'active' : '' }}" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ ($active === 'posts') ? 'active' : '' }}" href="/posts">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ ($active === 'categories') ? 'active' : '' }}" href="/categories">Categories</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ ($active === 'about') ? 'active' : '' }}" href="/about">About</a>
              </li>
            </ul>
           
            <ul class="navbar-nav">
             @auth
             <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Welcome back, {{ auth()->user()->name }}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                  <a class="dropdown-item d-flex align-items-center" href="/dashboard">
                    <box-icon type="solid" class="me-2" name="dashboard"></box-icon>
                    My Dashboard
                  </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form action="/signout" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item d-flex align-items-center">
                      <box-icon name="log-out-circle" class="me-2"></box-icon>
                      Sign Out
                    </button>
                  </form>
                </li>
              </ul>
            </li>
             @else
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center justify-content-center {{ ($active === 'signin') ? 'active' : '' }}" href="/signin"><box-icon name='log-in-circle' class="me-2"></box-icon>Sign In</a>
              </li>
            </ul>
           @endauth
          </div>
        </div>
  </nav>
</header>
  
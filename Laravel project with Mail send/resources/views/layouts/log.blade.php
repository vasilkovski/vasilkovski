

   @if(Auth::user){
    <li class="nav-item p-2 position-relative">
            <a class="nav-link font-weight-bold a-nav" href="/login" 
              >Logout
            </a>
          </li>
    } else{
        <li class="nav-item p-2 position-relative">
            <a class="nav-link font-weight-bold a-nav" href="/login" 
              >Login
            </a>
          </li>
    }
    @endif


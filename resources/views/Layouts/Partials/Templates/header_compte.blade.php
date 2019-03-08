<header class="header_comptes">

      <div class="header-left">
        <h1 class="header-left-user">{{"$profil[1] $profil[2]"}}</h1>
        <h1 class="header-left-fonction">{{ $profil[3] }}</h1>
      </div>

      <div class="header-right">

          <?php $date = date("d/m/Y");  ?>


            <button href="{{ route('home')}}"
                    class="header-right-home"
                    onclick="event.preventDefault();
                    document.getElementById('home-form').submit();">
                    <b class="material-icons">home</b>
            </button>



            <h1 class="header-right-date"> {{ "$date" }} </h1>


            <button
                href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
                class="header-right-logout">
                <b class="material-icons">power_settings_new</b>
            </button>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            <form id="home-form" action="{{ route('home') }}" method="GET" style="display: none;">
                @csrf
            </form>

      </div>

</header>

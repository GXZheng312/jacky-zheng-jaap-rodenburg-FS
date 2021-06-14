<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container" id="navbarSupportedContent">
      <ul class="navbar-nav fs-4">
        <li class="nav-item">
          <a class="nav-link" href="{{route('cashregister.index')}}">Kassa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('cashregister.gerecht.index')}}">Gerechten</a>
        </li>
      </ul>

      {{ Form::open(['url' => route('logout'), 'class' => 'd-flex' ]) }}
      {{ Form::button('Uitloggen', ['type' => 'submit','class' => 'btn btn-outline-secondary']) }}
      {{ Form::close() }}

    </div>
  </nav>
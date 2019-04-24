@extends("layout")

@section("content")


<div class="row mt-3" style="margin-bottom: 1em">
  <div class="col-12 col-lg-12">
    <a class="btn btn-info btn-block" href="{{ route('logout') }}"
    onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
    <h3>Cerrar sesión</h3>
  </a>

  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
  </form>
  </div>
</div>


<div class="row" style="margin-bottom: 1em">
  <div class="col-12 col-lg-12">
    <a class="btn btn-primary btn-block" href="/remate"><h3>Remates</h3></a>
  </div>
</div>



<div class="row">
  <div class="col-12 col-lg-12">
    <a class="btn btn-primary btn-block" href="/toros"><h3>Toros</h3></a>
  </div>
</div>

@endsection

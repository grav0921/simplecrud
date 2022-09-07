<!DOCTYPE html>
<html>
<head>
	<!-- <link rel="stylesheet" type="text/css" href="css/css/bootstrap.min.css"> -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/css/bootstrap.min.css') }}">
	<title>rend&camp</title>
</head>
<body>
	<main>
	<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light rounded" aria-label="Eleventh navbar example">
      <div class="container-fluid">
        <a class="navbar-brand" href="/">Camp n rent</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample09">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          	@guest
            <li class="nav-item">
              <a class="nav-link {{ ($title==='login') ? 'active' : ''}}" aria-current="page" href="/login">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ ($title==='register') ? 'active' : ''}}" href="/register" tabindex="-1" aria-disabled="true">Register</a>
            </li>
            @endguest
            @auth
            <li class="nav-item">
              <a class="nav-link {{ ($title===auth()->user()->id) ? 'active' : ''}}" href="/detailsewa/{{auth()->user()->id}}" tabindex="1" aria-disabled="true">Detail sewa</a>
            </li>
          </ul>
          	<form method="post" action="/logout">
				@csrf
				<button type="submit" class="btn btn-primary">Logout</button>
			</form>
            @endauth
        </div>
      </div>
    </nav>
</main>
    


	@yield('isi')
 
  
  <script src="{{ URL::asset ('css/js/bootstrap.min.js') }}"></script>
  
</body>
</html>
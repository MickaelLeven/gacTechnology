<html>
<head>
	<title>Test Gac Technology</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	 <link  rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}"/>
	 <link  rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-grid.min.css') }}"/>
	 <link  rel="stylesheet" type="text/css" href="{{ asset('css/dataTables.bootstrap4.min.css') }}"/>
	 <link  rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap/bootstrap-datetimepicker.min.css') }}"/>
	 <link  rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"/>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="{{ route('stat-tickets') }}">Gac Technology</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Tickets
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('list-tickets') }}">Liste</a>
              <a class="dropdown-item" href="{{ route('create-ticket') }}">Nouveau Ticket</a>
              <a class="dropdown-item" href="{{ route('import-tickets') }}">Import</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
	<div class="container">
		<div class="row">
			@yield('body')
		</div>
	</div>
</body>

<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap/bootstrap-datetimepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/chartjs/chart.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
@yield('scripts')

</html>
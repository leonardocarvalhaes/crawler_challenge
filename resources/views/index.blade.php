<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Crawler Challenge</title>

		<link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
	</head>
	<body>
		<section>
			<button id="botao">Buscar últimos posts do Vida de Programador</button>

			<div id="resultados"></div>
		</section>
	</body>

	<script src="{{ asset('js/logica.js') }}"></script>
</html>

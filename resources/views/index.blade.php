<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Crawler Challenge</title>

		<style>
			body {
				display: flex;
				flex-wrap: wrap;
				align-items: center;
				justify-content: center;
				height: 100vh;
				margin: 0;
				padding: 0;
				font-family: 'Nunito', sans-serif;
			}

			section {
				display: flex;
				flex-direction: column;
				align-items: center;
			}

			article {
				max-width: 90vw;
				margin: 0 auto;
			}

			button {
				margin: 20px;
				padding: 10px;
				background: white;
				border-radius: 10px;
			}

			h1 {
				margin-top: 150px;
				font-size: 2rem;
			}

			img {
				max-width: 90%;
				margin: 0 auto;
				border-radius: 5px 5px 15px 15px;
			}
		</style>
	</head>
	<body>
		<section>
			<button id="botao">Buscar últimos posts do Vida de Programador</button>

			<div id="resultados"></div>
		</section>
	</body>

	<script>
		document.getElementById('botao').addEventListener('click', async (evento) => {
			try {
				document.getElementById('resultados').innerHTML = 'Carregando conteúdo...'

				let resposta = await fetch('/api/obter-resposta')
				let respostaJson = await resposta.json()
				let resultados = respostaJson.dados

				document.getElementById('resultados').innerHTML = resultados.map((resultado) => {
					return '<article><h1>' + resultado[2] + '</h1><img src="' + resultado[4] + '" /></article>'
				}).join('')
			} catch (erro) {
				console.log(erro)
			} 
		})
	</script>
</html>

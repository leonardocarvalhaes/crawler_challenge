document.getElementById('botao').addEventListener('click', async (evento) => {
	try {
		document.getElementById('resultados').innerHTML = 'Carregando conteúdo...'

		let resposta = await fetch('/api/obter-resposta')
		let respostaJson = await resposta.json()
		let resultados = respostaJson.dados

		document.getElementById('resultados').innerHTML = resultados.map((resultado) => {
			return '<article><h1>' + resultado.titulo + '</h1><img src="' + resultado.imagemURL + '" /></article>'
		}).join('')
	} catch (erro) {
		console.log(erro)
	} 
})
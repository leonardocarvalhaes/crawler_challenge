document.getElementById('botao').addEventListener('click', async (evento) => {
	try {
		const divResultados = document.getElementById('resultados')
		
		divResultados.innerHTML = 'Carregando conteúdo...'

		let resposta = await fetch('/api/obter-resposta')
		let respostaJson = await resposta.json()
		let resultados = respostaJson.dados

		divResultados.innerHTML = resultados.map((resultado) => {
			return '<article><h1>' + resultado.titulo + '</h1><img src="' + resultado.imagemURL + '" /></article>'
		}).join('')
	} catch (erro) {
		console.log(erro)
	} 
})
document.getElementById('botao').addEventListener('click', async (evento) => {
	const divResultados = document.getElementById('resultados')
	
	try {	
		divResultados.innerHTML = 'Carregando conteúdo...'

		let resposta = await fetch('/api/obter-resposta')
		let respostaJson = await resposta.json()
		let resultados = respostaJson.dados

		divResultados.innerHTML = resultados.map(resultado => '<article><h1>' + resultado.titulo + '</h1><img src="' + resultado.imagemURL + '" /></article>').join('')
	} catch (erro) {
		console.log(erro)

		divResultados.innerHTML = 'Ooops! Algo deu errado, tente novamente mais tarde...'
	}
})
function valida(){
	var data_inicio = document.getElementById('data_inicio').value; //pegando data inicio
	var data_fim = document.getElementById('data_fim').value; //pegando data final 
	var aviso = document.getElementById('aviso'); // pegando o que está dentro da div de aviso para poder inserir nela os resultado
	var time_inicio = document.getElementById('time_inicio').value; //pegando a hora de inicio
	var time_fim = document.getElementById('time_fim').value; //pegando a hora final
	if(data_fim < data_inicio){ //verificando se a data final é menor que a data inicio
		aviso.innerHTML = "Data final anterior a data inicial."; // se sim, então,  deixa esta mensagem na div
		aviso.style.display = "block"; //mostrando a div
	} else if(data_inicio == data_fim){ //verificando se a data é igual para que possamos verificar a hora
		if(time_fim <= time_inicio) { // verificando se a hora de fim é menor ou igual a hora inicio
 			aviso.innerHTML = "Hora não permitida."; //se for, então, inserir na div aviso esta mensagem
			aviso.style.display = "block"; //mostrando a div
		} else {
			aviso.innerHTML = "";
			aviso.style.display = "none";
		}
	} else {
		aviso.innerHTML = "";
		aviso.style.display = "none";
	}
}
<?php
require_once 'conn.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/jquery-1.8.2.js"></script>
        <title>Teste</title>
        <script type="text/javascript">
            if (!window.jQuery) {
                var script = document.createElement('script');
                script.type = 'text/javascript';
                script.src = 'http://code.jquery.com/jquery-1.8.2.js';
                document.getElementsByTagName('head')[0].appendChild(script);
            }
        </script>

    </head>
    <body>
            <div id="pais">
            <label>Selecione o País:</label>
            <select id="cmbPais">
                <option>Carregar Paises</option>
            </select>
            <input type="button" value="Carregar Pais" id="btnPais" class="botao"/>
          </div>

          <div id="estado">
            <label>Selecione o Estado:</label>
            <select id="cmbEstado">
                <option>Carregar Estados</option>
            </select>
          </div>

          <div id="cidade">
            <label>Selecione a Cidade:</label>
            <select id="cmbCidade">
                <option>Carregar Cidades</option>
            </select>
          </div>
        <div id="mensagem">
        	
        </div>
        
    </body>
            <script type="text/javascript">
        $(document).ready(function(){

                <!-- Carrega os Paises -->
                $('#btnPais').click(function(e){
                        $('#btnPais').hide();
                        $('#mensagem').html('<span class="mensagem">Aguarde, carregando ...</span>');  

                        $.getJSON('consulta.php?opcao=pais', function (dados){

                           if (dados.length > 0){ 	
                                  var option = '<option>Selecione o País</option>';
                                  $.each(dados, function(i, obj){
                                          option += '<option value="'+obj.sigla+'">'+obj.nome+'</option>';
                                  })
                                  $('#mensagem').html('<span class="mensagem">Total de paises encontrados.: '+dados.length+'</span>'); 
                                  $('#cmbPais').html(option).show();
                           }else{
                                   Reset();
                                   $('#mensagem').html('<span class="mensagem">Não foram encontrados paises!</span>');
                           }
                        })
                })

                <!-- Carrega os Estados -->
                $('#cmbPais').change(function(e){
                        var pais = $('#cmbPais').val();
                        $('#mensagem').html('<span class="mensagem">Aguarde, carregando ...</span>');  

                        $.getJSON('consulta.php?opcao=estado&valor='+pais, function (dados){ 

                           if (dados.length > 0){	
                                  var option = '<option>Selecione o Estado</option>';
                                  $.each(dados, function(i, obj){
                                          option += '<option value="'+obj.sigla+'">'+obj.nome+'</option>';
                                  })
                                  $('#mensagem').html('<span class="mensagem">Total de estados encontrados.: '+dados.length+'</span>'); 
                           }else{
                                  Reset();
                                  $('#mensagem').html('<span class="mensagem">Não foram encontrados estados para esse país!</span>');  
                           }
                           $('#cmbEstado').html(option).show(); 
                        })
                })

                <!-- Carrega as Cidades -->
                $('#cmbEstado').change(function(e){
                        var estado = $('#cmbEstado').val();
                        $('#mensagem').html('<span class="mensagem">Aguarde, carregando ...</span>');  

                        $.getJSON('consulta.php?opcao=cidade&valor='+estado, function (dados){

                                if (dados.length > 0){ 	
                                        var option = '<option>Selecione a Cidade</option>';
                                        $.each(dados, function(i, obj){
                                                option += '<option>'+obj.nome+'</option>';
                                        })
                                        $('#mensagem').html('<span class="mensagem">Total de cidades encontradas.: '+dados.length+'</span>');
                                }else{
                                        Reset();
                                        $('#mensagem').html('<span class="mensagem">Não foram encontradas cidades para esse estado!</span>');  
                                }
                                $('#cmbCidade').html(option).show();
                        })
                })

                <!-- Resetar Selects -->
                function Reset(){
                        $('#cmbPais').empty().append('<option>Carregar Países</option>>');
                        $('#cmbEstado').empty().append('<option>Carregar Estados</option>>');
                        $('#cmbCidade').empty().append('<option>Carregar Cidades</option>');
                }
        });
        </script> 
</html>

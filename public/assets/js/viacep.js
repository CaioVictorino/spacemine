function getCep(cep){

     $.ajax({
          url: "https://viacep.com.br/ws/"+cep+"/json/",
          dataType: 'json'
     }).done(function(data){
          console.log(data);
          document.querySelector("#state").value = data.uf;
          document.querySelector("#city").value = data.localidade;
          document.querySelector("#stateValue").value = data.uf;
          document.querySelector("#cityValue").value = data.localidade;
          document.querySelector("#neighborhood").value = data.bairro;
          document.querySelector("#street").value = data.logradouro;
     });


}

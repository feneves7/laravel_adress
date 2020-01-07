<template>
  <div>
    <h1>Editar Endereço</h1>
    <form @submit.prevent="updateAdress">
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label>Cep</label>
            <input id="cep" type="text" class="form-control" v-model="adress.cep" v-on:keyup="searchCep">
            <div><span class="text-danger" v-show="notFound"><strong>* CEP não encontrado</strong></span></div>
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
                <label>Logradouro</label>
                <input id="logradouro" type="text" class="form-control" v-model="adress.logradouro">
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label>Numero</label>
              <input id="numero" type="number" class="form-control" v-model="adress.numero" >
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Complemento</label>
              <input id="complemento" type="text" class="form-control" v-model="adress.complemento" >
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
                <label>Bairro</label>
                <input id="bairro" type="text" class="form-control" v-model="adress.bairro">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Cidade</label>
              <input id="cidade" type="text" class="form-control" v-model="adress.localidade" >
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label>Estado</label>
              <input id="estado" type="text" class="form-control" v-model="adress.uf" >
            </div>
          </div>
        </div>
        <div class="form-group">
          <button class="btn btn-primary">Atualizar</button>
        </div>
    </form>
  </div>
</template>

<script>
    export default {
        data(){
        return {
          adress:{},
          notFound: false
        }
    },
    mounted: function(){
        $('#cep').mask('99999-99');
    },
    created() {
        let uri = `http://localhost:8000/api/adress/edit/${this.$route.params.id}`;
        this.axios.get(uri).then((response) => {
            this.adress = response.data;
        });
      },
    methods: {
      updateAdress() {
          let uri = `http://localhost:8000/api/adress/update/${this.$route.params.id}`;
          this.axios.post(uri, this.adress).then((response) => {
            this.$router.push({name: 'home'});
          });
        },
      searchCep: function(){
        var self = this;
        self.notFound = false;

        if(/^[0-9]{5}-*[0-9]{3}$/.test(this.adress.cep)){
            $.getJSON("https://viacep.com.br/ws/" + this.adress.cep + "/json/", function(adress){
                if(adress.erro){
                    self.adress = {};
                    $("#cep").focus();
                    self.notFound = true;
                    return;
                }
                self.adress = adress;
                $("#numero").focus();
        });
      }
    }
    }
  }
</script>
<template>
  <div>
      <h1>Endereços</h1>
        <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2">
            <router-link :to="{ name: 'create' }" class="btn btn-primary">Criar Endereço</router-link>
          </div>
        </div><br />

        <table class="table table-hover">
            <thead>
            <tr>
                <th>Endereço</th>
                <th>Número</th>
                <th>Bairro</th>
                <th>Complemento</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="adress in adresses" :key="adress.id">
                    <td>{{ adress.logradouro }}</td>
                    <td>{{ adress.numero }}</td>
                    <td>{{ adress.bairro }}</td>
                    <td v-if="adress.complemento">{{ adress.complemento }}</td>
                    <td v-else>-</td> 
                    <td>{{ adress.localidade }}</td>
                    <td>{{ adress.uf }}</td>

                    <td>
                      <router-link :to="{name: 'edit', params: { id: adress.id }}" class="btn btn-primary">Editar</router-link>
                      <button class="btn btn-danger" @click.prevent="deleteAdress(adress.id)">Excluir</button>
                    </td>
                </tr>
            </tbody>
        </table>
  </div>
</template>

<script>
  export default {
      data() {
        return {
          adresses: []
        }
      },
      created() {
      let uri = 'http://localhost:8000/api/adress';
      this.axios.get(uri).then(response => {
        this.adresses = response.data.data;
      });
    },
    methods: {
      deleteAdress(id)
      {
        let uri = `http://localhost:8000/api/adress/delete/${id}`;
        this.axios.delete(uri).then(response => {
          this.adresses.splice(this.adresses.indexOf(id), 1);
        });
      }
    }
  }
</script>
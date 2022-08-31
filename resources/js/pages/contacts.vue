<template>
  <div>
    <h1>INSERISCI I TUOI DATI</h1>
    <div>
      <form @submit.prevent="onButtonClick">
        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label">Nome</label>
          <div class="col-sm-10">
            <input
              type="text"
              class="form-control"
              id="name"
              value="nome"
              v-model="name"
            />
          </div>
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Contenuto Messaggio</label>
          <textarea
            class="form-control"
            id="exampleFormControlTextarea1"
            rows="3"
            v-model="message"
          ></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-primary mb-2">Confirm data</button>
        </div>
      </form>
    </div>
  </div>
</template>


<script>
import axios from 'axios';
export default {
    data(){
        return {
            name: "",
            message: ""

        }
    },
    methods: {
        onButtonClick(e) {
            axios.post("/api/contacts", {
                name: this.name,
                message: this.message
            })
        }
    }
    
};
</script>

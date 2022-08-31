<template>
    <div>
        <h1> Post # {{post.id}}</h1>
        <div class="container d-flex align-items-center justify-content-center overflow-auto mt-5">
            <div class="row">
                <div class="col overflow-auto">
                    <div class="card border border-success rounded-4 border-3 border-opacity-50 p-3" style="width: 50rem;">
                        <img class="card-img-top" :src="post.cover_img">
                        <div class="card-body">
                            <h2>{{ post.title }}</h2>
                            <hr>
                            <h3>Slug :</h3>
                            <p>{{ post.slug }}</p>
                            <hr>
                            <h3>Contenuto :</h3>
                            <p class=" altezzaLine overflow-auto">{{ post.content }}</p>
                            <hr>
                            <h3>Creatore :</h3>
                            <p v-html="post.user_id"> </p>
                            <hr>
                            <h3>Categoria :</h3>
                            <p>{{ post.category}}</p>
                            <hr>

                            <h3>Date :</h3>
                            <ul>
                                <li>Data Creazione: {{ post.created_at }}</li>
                                <li>Data Ultima Modifica: {{ post.updated_at }}</li>
                            </ul>
                        </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      post: {},
    };
  },
  mounted() {
    axios.get("/api/posts/" + this.$route.params.slug).then((resp) => {
      const data = resp.data;
      this.post = data;
    });
  },
};
</script>

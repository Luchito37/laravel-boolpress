<template>
    <div class="form-group">
                <div class="form-group">
                    <label :for="name + '_file'" class="form-label">Immagine Post</label>
                    <img class="card-img-top" style="max-width: 250px;" :src="immagineProvvissoria" alt="">
                    <input type="file" :name="name" class="form-control-file"
                        placeholder="Inserisci il titolo" @change="fileImmagine" :id="name + '_file'">
                </div>
            </div>
</template>

<script>

export default{
props: {
    name: String,
},
data() {
    return{
        immagineProvvissoria: ""
    }
    
},
methods: {
    fileImmagine(e){
        const files = e.target.files;
        const firstFile = files[0];

        if (!firstFile) {
            this.immagineProvvissoria = "";

        return
        }

        this.immagineProvvissoria = URL.createObjectURL(firstFile);
    }
}

}
</script>

<template>
    <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#" @click="changePage(currentPage -1)">Previous</a></li>
    <li class="page-item" v-for="pageNum in totalPages" :key="pageNum">
        <a class="page-link" href="#" @click="changePage(pageNum)">{{pageNum}}</a></li>

    <li class="page-item"><a class="page-link" href="#" @click="changePage(currentPage +1)">Next</a></li>
  </ul>
</nav>
</template>

<script>

export default{
    props: {
        currentPage: Number,
        nextPage: Number,
        totalPages: Number
    },
    methods: {
        changePage(newPage){
            this.$emit("changePage", newPage);
        }
    }

}
</script>

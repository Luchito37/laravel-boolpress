<template>
    <div class="gradient">
        <Navbar></Navbar>
        <div class="container">
            <router-view></router-view>
            <div class="text-center text-success m-4">
                <h1 class="border border-dark rounded-pill border-3 border-opacity-50 px-3 d-inline-block align-items-center m-4">LISTA POST:</h1>
            </div>
        </div>
        <PostList></PostList>
    </div>
    
</template>

<script>
import Navbar from './frontend/components/Navbar.vue';
import PostList from './frontend/components/PostList.vue';

export default{
    components: {
        Navbar,
        PostList
    },
    data() {
        return{
            message: "CIAO CON LE MANII"
        }
    }
}
</script>

<style scoped>

.gradient{
    background-image: radial-gradient(circle, #ffffff, #eaeef3, #d0dfe4, #b8d1cd, #acc0af);
}

</style>

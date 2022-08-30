<template>
    <div>
        <Navbar></Navbar>
        <div class="container">
            <div class="text-center m-4">
                <h1 class="border border-success rounded-pill border-3 border-opacity-50 px-3 d-inline-block align-items-center m-4">LISTA POST:</h1>
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

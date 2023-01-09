<template>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">
            Company name</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button"
                data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <router-link to="/profile" class="nav-link px-3 text-white">
                    {{ name }}</router-link>
                <a class="nav-link px-3" href="#">Sign out</a>
            </div>
        </div>
    </header>
</template>

<script>
import {onMounted, ref} from "vue";
import axios from "axios";

export default {
    name: "Nav",
    setup(){
        const name = ref('');
        onMounted(async () => {
            // Get token from localstorage
            let token = localStorage.getItem('token');
            const {data} = await axios.get('user', {
                withCredentials: true,
                headers: {
                    "Authorization" : "Bearer " + token,
                    'Accept' : 'application/json',
                },
            });
            console.log(data);
            name.value = data.first_name + ' '+ data.last_name;
        });
        return {
            name
        }
    }
}
</script>

<style scoped>

</style>

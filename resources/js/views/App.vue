<template>
    <div class="d-flex align-self-center justify-content-center" style="height: 100vh;">
        <div class="m-4 w-75">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Card title</h2>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    
                    <router-link :to="{ name: 'home' }"
                        v-slot="{ href, route, navigate, isActive, isExactActive }">
                        <a :active="isActive" :href="href" @click="navigate" class="card-link">Home</a>
                    </router-link>
                    <router-link :to="{ name: 'users.index' }"
                        v-slot="{ href, route, navigate, isActive, isExactActive }">
                        <a :active="isActive" :href="href" @click="navigate" class="card-link">Users</a>
                    </router-link>

                    <div class="container">
                        <router-view></router-view>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {}
</script>
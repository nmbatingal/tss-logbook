<template>
    <div class="d-flex align-self-center justify-content-center" style="height: 100vh;">
        <div class="m-4 w-75">
            <h1>TSS Client Log</h1>

            <p>
                <router-link :to="{ name: 'home' }">Home</router-link> |
                <router-link :to="{ name: 'hello' }">Hello World</router-link> |
                <router-link :to="{ name: 'users.index' }">Users</router-link>
            </p>

            <div class="container">
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>
<script>
    export default {}
</script>
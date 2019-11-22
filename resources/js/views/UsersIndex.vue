<template>
    <div class="users">
        <div v-if="error" class="error">
            <p>{{ error }}</p>
        </div>
        <div v-if="message" class="alert">{{ message }}</div>

        <div>
            <router-link :to="{ name: 'users.create' }">Add User</router-link>
        </div>
        
        <ul v-if="users">
            <li v-for="user in users" :key="user.id">
                <strong>Name:</strong> {{ user.name }},
                <strong>Email:</strong> {{ user.email }} | 
                <router-link :to="{ name: 'users.edit', params: { id: user.id } }">Edit</router-link> |
                <router-link :to="{ name: 'users.delete', params: { id: user.id } }"
                    v-slot="{ href, route, navigate, isActive, isExactActive }">
                    <a :href="href" @click.prevent="onDelete(user.id)">Delete</a>
                </router-link>
            </li>
        </ul>

        <div class="pagination">
            <button :disabled="! prevPage" @click.prevent="goToPrev">Previous</button>
            {{ paginationCount }}
            <button :disabled="! nextPage" @click.prevent="goToNext">Next</button>
        </div>
    </div>
</template>
<script>
import axios from 'axios';

const getUsers = (page, callback) => {
    const params = { page };
    axios
        .get('/api/users', { params })
        .then(response => {
            callback(null, response.data);
        }).catch(error => {
            callback(error, error.response.data);
        });
};
export default {
    data() {
        return {
            message: null,
            users: null,
            meta: null,
            links: {
                first: null,
                last: null,
                next: null,
                prev: null,
            },
            error: null,
        };
    },
    computed: {
        nextPage() {
            if (! this.meta || this.meta.current_page === this.meta.last_page) {
                return;
            }
            return this.meta.current_page + 1;
        },
        prevPage() {
            if (! this.meta || this.meta.current_page === 1) {
                return;
            }
            return this.meta.current_page - 1;
        },
        paginationCount() {
            if (! this.meta) {
                return;
            }
            const { current_page, last_page } = this.meta;
            return `${current_page} of ${last_page}`;
        },
    },
    beforeRouteEnter (to, from, next) {
        getUsers(to.query.page, (err, data) => {
            next(vm => vm.setData(err, data));
        });
    },
    // when route changes and this component is already rendered,
    // the logic will be slightly different.
    beforeRouteUpdate (to, from, next) {
        this.users = this.links = this.meta = null
        getUsers(to.query.page, (err, data) => {
            this.setData(err, data);
            next();
        });
    },
    methods: {
        goToNext() {
            this.$router.push({
                query: {
                    page: this.nextPage,
                },
            });
        },
        goToPrev() {
            this.$router.push({
                name: 'users.index',
                query: {
                    page: this.prevPage,
                }
            });
        },
        onDelete(id) {
            axios.delete(`/api/users/${id}`)
                .then((response) => {
                    this.message = 'User Deleted';
                    setTimeout(() => this.$router.go(), 2000);
                });
        },
        setData(err, { data: users, links, meta }) {
            if (err) {
                this.error = err.toString();
            } else {
                this.users = users;
                this.links = links;
                this.meta = meta;
            }
        },
    }
}
</script>
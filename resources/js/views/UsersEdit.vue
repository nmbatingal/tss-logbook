<template>
  <div>
      <div v-if="message" class="alert">{{ message }}</div>
      <div v-if="! loaded">Loading...</div>
      <form @submit.prevent="onSubmit($event)" v-else>
        <div class="form-group">
            <label for="user_name">Name</label>
            <input id="user_name" v-model="user.name" />
        </div>
        <div class="form-group">
            <label for="user_email">Email</label>
            <input id="user_email" type="email" v-model="user.email" />
        </div>
        <div class="form-group">
            <button type="submit" :disabled="saving">Update</button>
            <button :disabled="saving" @click.prevent="onDelete($event)">Delete</button>
            <button type="button" @click.prevent="goBack">Cancel</button>
        </div>
    </form>
  </div>
</template>
<script>
    import api from '../../assets/js/api/users';

    export default {
    data() {
        return {
            message: null,
            loaded: false,
            saving: false,
            user: {
                id: null,
                name: "",
                email: ""
            }
        };
    },
    methods: {
        onSubmit(event) {
        this.saving = true;

        api.update(this.user.id, {
            name: this.user.name,
            email: this.user.email,
        }).then((response) => {
            this.message = 'User updated';
            setTimeout(() => this.$router.go(-1), 2000);
            // this.user = response.data.data;
        }).catch(error => {
            console.log(error)
        }).then(() => this.saving = false);
        },
        onDelete() {
        this.saving = true;
        api.delete(this.user.id)
            .then((response) => {
                this.message = 'User Deleted';
                setTimeout(() => this.$router.go(-1), 2000);
            });
        },
        goBack() {
            this.$router.go(-1);
        },
    },
    created() {
        api.find(this.$route.params.id)
            .then((response) => {
                this.loaded = true;
                this.user = response.data.data;
            })
            .catch((err) => {
                this.$router.push({ name: '404' });
            });
        }
    };
</script>
<template>

    <div class="columns is-marginless is-centered">
        <div class="column is-6">
            <nav class="card">
                <div class="card-header">
                    <div class="card-header-title">
                        Login
                    </div>
                </div>
                <div class="card-content">
                    <form action="" @submit.prevent="login">
                        <div class="field">
                            <label for="email" class="label">Email</label>
                            <input type="text" class="input" name="email" v-model="data.email" required>
                        </div>
                        <div class="help is-danger" v-text="messages('email')"></div>
                        <div class="field">
                            <label for="password" class="label">Password</label>
                            <input type="password" class="input" name="password" v-model="data.password" required>
                        </div>
                        <div class="help is-danger" v-text="messages('password')"></div>
                        <div class="field">
                            <button class="button" type="submit">Sign In</button>
                        </div>
                    </form>
                </div>
            </nav>
        </div>
    </div>

</template>
<script>
export default {
    methods: {
        async login() {
            await this.$auth.loginWith('laravelSanctum', {
                data: {
                    email: this.data.email,
                    password: this.data.password
                }
            }).catch(e => {
                console.log(e)
            });

        },
        errors(w) {
            return this.Errors[w] ? true : false;
        },
        messages(w) {
            if (this.Errors && this.Errors[w]) {
                return this.Errors[w][0]
            }
        },

    },
    data() {
        return {
            data: {
                email: '',
                password: '',

            },
            Errors: {}
        }
    }
}
</script>
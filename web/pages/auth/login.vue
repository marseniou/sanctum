<template>
    <section class="section">
        <div class="columns">
            <div class="column is-2 is-offset-4">
                <form action="" @submit.prevent="login">
                    <div class="field">
                        <label for="email" class="label">Email</label>
                        <input type="text" class="input" name="email" v-model="data.email">
                    </div>
                    <div class="field">
                        <label for="password" class="label">Password</label>
                        <input type="password" class="input" name="password" v-model="data.password">
                    </div>
                    <div class="field">
                        <button class="button" type="submit">SignIn</button>
                        
                    </div>
                </form>
            </div>
        </div>
    </section>
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

        }
    },
    data() {
        return {
            data: {
                email: '',
                password:''
            }
        }
    }
}
</script>
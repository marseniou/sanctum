<template>
    <a href="" @click.prevent="login">Login</a>
</template>
<script>
export default {
    methods: {
        async login() {
            await this.$auth.loginWith('laravelSanctum', {
                data: {
                    email: 'marseniou@gmail.com',
                    password: 'pote8aginei'
                }
            }).catch(e => {
                console.log(e)
            });
            
        }
    }
}
</script>
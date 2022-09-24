<template>
    <aside class="menu">
        
        <p class="menu-label">
            Actions
        </p>
        <ul class="menu-list">
            <li v-if="$auth.loggedIn">
                <nuxt-link to="/auth/logout">Log Out</nuxt-link>
            </li>
            <li v-else>
                <nuxt-link to="/auth/login">Log In</nuxt-link>
            </li>

        </ul>
    </aside>
</template>
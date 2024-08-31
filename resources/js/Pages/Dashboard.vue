<script setup lang="ts">
import BaseLayout from "@/Layouts/BaseLayout/Index.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Dashboard" />
    <BaseLayout>
        <template #title>
            <p class="text-sm hidden lg:block text-muted-foreground">
                Hi {{ $page.props.auth.user.name }} 👋, Welcome to your
                dashboard !
            </p>
            <h1 class="text-2xl font-semibold mt-1">Dashboard</h1>
        </template>
        <div></div>
    </BaseLayout>
</template>

<script setup lang="ts">
import BaseLayout from "@/Layouts/BaseLayout/Index.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Dashboard" />
    <BaseLayout>
        <template #title>
            <h1 class="text-2xl font-semibold">Dashboard</h1>
            <p class="text-sm hidden lg:block text-muted-foreground">
                Welcome to your dashboard, {{ $page.props.auth.user.name }}
            </p>
        </template>
        <div>
            <h1 class="text-lg font-semibold"></h1>
        </div>
    </BaseLayout>
</template>

<script setup lang="ts">
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Dashboard" />
    <AdminLayout>
        <template #title>
            <h1 class="text-2xl font-semibold">Dashboard</h1>
            <p class="text-sm text-muted-foreground">
                Welcome to your dashboard, {{ $page.props.auth.user.name }}
            </p>
        </template>
        <div>
            <h1 class="text-lg font-semibold"></h1>
        </div>
    </AdminLayout>
</template>

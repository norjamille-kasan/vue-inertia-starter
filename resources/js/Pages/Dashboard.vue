<script setup lang="ts">
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Dashboard" />
    <AdminLayout>
        <template #title>
            <h1 class="text-xl font-semibold">Dashboard</h1>
        </template>
        <div>
            <h1 class="text-lg font-semibold">
                Welcome to your dashboard, {{ $page.props.auth.user.name }}
            </h1>
        </div>
    </AdminLayout>
</template>

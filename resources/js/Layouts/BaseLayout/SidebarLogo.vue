<template>
    <Link href="/dashboard" class="flex items-center gap-2 font-semibold">
        <ZapIcon class="h-6 w-6" />
        <span class="">VILT-ADMIN</span>
    </Link>
</template>

<script setup lang="ts">
import { Link } from "@inertiajs/vue3";
import { ZapIcon } from "lucide-vue-next";
</script>

<template>
    <Link
        :href="url"
        :class="
            cn(
                'flex items-center gap-2 rounded-md border px-3 py-2 transition-all ',
                isActive
                    ? 'text-foreground border-border bg-background'
                    : 'text-muted-foreground border-transparent'
            )
        "
    >
        <slot name="icon"></slot>
        {{ label }}
    </Link>
</template>

<script setup lang="ts">
import { cn } from "@/lib/utils";
import { Link } from "@inertiajs/vue3";
import { Component } from "vue";

defineProps<{
    label: string;
    url: string;
    isActive: boolean;
}>();
</script>

<script setup lang="ts">
import { useColorMode } from "@vueuse/core";

const mode = useColorMode({
    initialValue: "light",
});
</script>

<template>
    <div
        class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0"
    >
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 overflow-hidde">
            <slot />
        </div>
    </div>
</template>

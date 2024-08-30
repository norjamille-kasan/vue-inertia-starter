<script lang="ts" setup>
import type { HTMLAttributes } from "vue";
import { Primitive, type PrimitiveProps } from "radix-vue";
import { cn } from "@/lib/utils";
import { Link } from "@inertiajs/vue3";
const props = withDefaults(
    defineProps<PrimitiveProps & { class?: HTMLAttributes["class"] }>(),
    {
        as: "a",
    }
);
</script>

<template>
    <Primitive
        :as="Link"
        :as-child="asChild"
        :class="cn('transition-colors hover:text-foreground', props.class)"
    >
        <slot />
    </Primitive>
</template>

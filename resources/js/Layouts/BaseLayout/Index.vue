<script setup lang="ts">
import { ChartAreaIcon, Menu } from "lucide-vue-next";
import { Button } from "@/Components/ui/button";
import { Sheet, SheetContent, SheetTrigger } from "@/Components/ui/sheet";
import { usePage } from "@inertiajs/vue3";
import SidebarLogo from "./SidebarLogo.vue";
import SidebarNavList from "./SidebarNavList.vue";
import SidebarNavLink from "./SidebarNavLink.vue";
import SidebarProfileDropdown from "./SidebarProfileDropdown.vue";

const { url } = usePage();

const NAV_LIST = [
    {
        label: "Dashboard",
        url: "/dashboard",
        isActive: url.startsWith("/dashboard"),
        icon: ChartAreaIcon,
        permission: true,
    },
];
</script>

<template>
    <div
        class="grid min-h-screen w-full md:grid-cols-[220px_1fr] lg:grid-cols-[280px_1fr]"
    >
        <div class="hidden border-r bg-muted/40 md:block sticky top-0 h-screen">
            <div class="flex h-full max-h-screen flex-col gap-2">
                <div class="flex h-14 items-center px-4 lg:h-[60px] lg:px-6">
                    <SidebarLogo />
                </div>
                <div class="flex-1">
                    <SidebarNavList>
                        <template
                            v-for="(link, index) in NAV_LIST"
                            :key="index"
                        >
                            <SidebarNavLink
                                v-if="link.permission"
                                :url="link.url"
                                :label="link.label"
                                :is-active="link.isActive"
                            >
                                <template #icon>
                                    <component
                                        :is="link.icon"
                                        class="h-4 w-4"
                                    />
                                </template>
                            </SidebarNavLink>
                        </template>
                    </SidebarNavList>
                </div>
                <div class="mt-auto p-2 border-t">
                    <SidebarProfileDropdown />
                </div>
            </div>
        </div>
        <div class="flex flex-col">
            <header class="flex items-end gap-4 px-4 h-14 lg:h-[80px] lg:px-8">
                <!-- Mobile Sidebar -->
                <Sheet>
                    <SheetTrigger as-child>
                        <Button
                            variant="ghost"
                            size="icon"
                            class="shrink-0 md:hidden"
                        >
                            <Menu class="h-5 w-5" />
                            <span class="sr-only">Toggle navigation menu</span>
                        </Button>
                    </SheetTrigger>
                    <SheetContent side="left" class="flex flex-col">
                        <div
                            class="flex h-14 items-center px-4 lg:h-[60px] lg:px-6"
                        >
                            <SidebarLogo />
                        </div>
                        <SidebarNavList>
                            <template
                                v-for="(link, index) in NAV_LIST"
                                :key="index"
                            >
                                <SidebarNavLink
                                    v-if="link.permission"
                                    :url="link.url"
                                    :label="link.label"
                                    :is-active="link.isActive"
                                >
                                    <template #icon>
                                        <component
                                            :is="link.icon"
                                            class="h-4 w-4"
                                        />
                                    </template>
                                </SidebarNavLink>
                            </template>
                        </SidebarNavList>
                        <div class="mt-auto">
                            <SidebarProfileDropdown />
                        </div>
                    </SheetContent>
                </Sheet>
                <div class="w-full flex-1">
                    <div>
                        <slot name="title"></slot>
                    </div>
                </div>
                <div class="flex items-center h-full">
                    <div class="flex items-center">
                        <Button variant="ghost" size="icon">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="size-6"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z"
                                />
                            </svg>
                        </Button>
                        <Button variant="ghost" size="icon">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="size-6"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"
                                />
                            </svg>
                        </Button>
                    </div>
                </div>
            </header>
            <main class="flex flex-1 flex-col gap-4 p-4 lg:gap-6 lg:p-8">
                <slot></slot>
            </main>
        </div>
    </div>
</template>

<template>
    <DropdownMenu>
        <DropdownMenuTrigger
            class="flex w-full items-center gap-3 px-3 py-2.5 text-left text-base/6 font-medium sm:py-2 sm:text-sm/5"
        >
            <span className="flex min-w-0 items-center gap-3">
                <Avatar class="size-10 border" circle alt="">
                    <AvatarImage
                        :src="
                            'https://api.dicebear.com/9.x/thumbs/svg?seed=' +
                            $page.props.auth.user.name
                        "
                        alt="@radix-vue"
                    />
                </Avatar>
                <span className="min-w-0">
                    <span className="block truncate text-sm/5 font-medium  ">{{
                        $page.props.auth.user.name
                    }}</span>
                    <span
                        className="block truncate text-xs/5 font-normal text-muted-foreground "
                    >
                        {{ $page.props.auth.user.email }}
                    </span>
                </span>
            </span>
            <EllipsisVerticalIcon class="h-4 w-4 ml-auto" />
        </DropdownMenuTrigger>
        <DropdownMenuContent class="w-60">
            <DropdownMenuItem @click="router.visit('/profile')">
                <UserCircle class="h-4 w-4 mr-2" />
                Profile
            </DropdownMenuItem>
            <DropdownMenuSub>
                <DropdownMenuSubTrigger>
                    <SunMoonIcon class="h-4 w-4 mr-2" />
                    <span>Theme</span>
                </DropdownMenuSubTrigger>
                <DropdownMenuPortal>
                    <DropdownMenuSubContent>
                        <DropdownMenuItem @click="mode = 'light'">
                            <span
                                :class="
                                    mode === 'light'
                                        ? 'text-muted-foreground'
                                        : ''
                                "
                                >Light</span
                            >
                        </DropdownMenuItem>
                        <DropdownMenuItem @click="mode = 'dark'">
                            <span
                                :class="
                                    mode === 'dark'
                                        ? 'text-muted-foreground'
                                        : ''
                                "
                                >Dark</span
                            >
                        </DropdownMenuItem>
                        <DropdownMenuItem @click="mode = 'auto'">
                            <span
                                :class="
                                    mode === 'auto'
                                        ? 'text-muted-foreground'
                                        : ''
                                "
                                >System</span
                            >
                        </DropdownMenuItem>
                    </DropdownMenuSubContent>
                </DropdownMenuPortal>
            </DropdownMenuSub>
            <DropdownMenuSeparator />
            <DropdownMenuItem @click="router.post(route('logout'))">
                <LogOutIcon class="h-4 w-4 mr-2" />
                Sign Out
            </DropdownMenuItem>
        </DropdownMenuContent>
    </DropdownMenu>
</template>

<script setup lang="ts">
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuLabel,
    DropdownMenuPortal,
    DropdownMenuSeparator,
    DropdownMenuSub,
    DropdownMenuSubContent,
    DropdownMenuSubTrigger,
    DropdownMenuTrigger,
} from "@/Components/ui/dropdown-menu";
import { Avatar, AvatarImage } from "@/Components/ui/avatar";
import { router } from "@inertiajs/vue3";
import { useColorMode } from "@vueuse/core";
import {
    EllipsisVerticalIcon,
    LogOutIcon,
    SunMoonIcon,
    UserCircle,
} from "lucide-vue-next";

const mode = useColorMode({
    initialValue: "auto",
});
</script>

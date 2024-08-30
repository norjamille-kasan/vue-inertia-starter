<script setup lang="ts">
import {
    ArrowRight,
    Bell,
    BellIcon,
    ChevronDownIcon,
    ChevronUpIcon,
    Home,
    Menu,
    MessageSquareIcon,
    Package2,
    SearchIcon,
    SunMoonIcon,
    UserCircle,
    ZapIcon,
} from "lucide-vue-next";
import { Button } from "@/Components/ui/button";
import { Sheet, SheetContent, SheetTrigger } from "@/Components/ui/sheet";
import { cn } from "@/lib/utils";
import { Link, router } from "@inertiajs/vue3";
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
import { useColorMode } from "@vueuse/core";
import { Input } from "@/Components/ui/input";
import { Separator } from "@/Components/ui/separator";

const mode = useColorMode({
    initialValue: "auto",
});
</script>

<template>
    <div
        class="grid min-h-screen w-full md:grid-cols-[220px_1fr] lg:grid-cols-[280px_1fr]"
    >
        <div class="hidden border-r bg-muted/40 md:block sticky top-0 h-screen">
            <div class="flex h-full max-h-screen flex-col gap-2">
                <div class="flex h-14 items-center px-4 lg:h-[60px] lg:px-6">
                    <a href="/" class="flex items-center gap-2 font-semibold">
                        <ZapIcon class="h-6 w-6" />
                        <span class="">VILT-ADMIN</span>
                    </a>
                    <Button
                        variant="outline"
                        size="icon"
                        class="ml-auto h-8 w-8"
                    >
                        <Bell class="h-4 w-4" />
                        <span class="sr-only">Toggle notifications</span>
                    </Button>
                </div>
                <div class="flex-1">
                    <nav
                        class="grid items-start px-2 text-sm font-medium lg:px-4"
                    >
                        <Link
                            href="/dashboard"
                            :class="
                                cn(
                                    'flex items-center gap-2 rounded-md border px-3 py-2 transition-all ',
                                    $page.url.startsWith('/dashboard')
                                        ? 'text-foreground border-border bg-background'
                                        : 'text-muted-foreground border-transparent'
                                )
                            "
                        >
                            <Home class="h-4 w-4" />
                            Dashboard
                        </Link>
                    </nav>
                </div>
                <div class="mt-auto p-4"></div>
            </div>
        </div>
        <div class="flex flex-col">
            <!-- border-b bg-muted/40 -->
            <header
                class="flex h-14 items-center gap-4 px-4 lg:h-[80px] lg:px-6"
            >
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
                        <nav class="grid gap-2 text-sm mt-4 font-medium">
                            <Link
                                href="/dashboard"
                                :class="
                                    cn(
                                        'flex items-center gap-3 rounded-md px-3 py-2 transition-all hover:text-primary',
                                        $page.url.startsWith('/dashboard')
                                            ? 'dark:bg-muted dark:text-primary bg-primary text-primary-foreground'
                                            : ' text-muted-foreground'
                                    )
                                "
                            >
                                <Home class="h-4 w-4" />
                                Dashboard
                            </Link>
                        </nav>
                        <div class="mt-auto">
                            <DropdownMenu>
                                <DropdownMenuTrigger
                                    class="flex w-full items-center gap-3 bg-secondary border border-border rounded-lg px-2 py-2.5 text-left text-base/6 font-medium sm:py-2 sm:text-sm/5"
                                >
                                    <span
                                        className="flex min-w-0 items-center gap-3"
                                    >
                                        <Avatar class="size-10" square alt="">
                                            <AvatarImage
                                                :src="
                                                    'https://api.dicebear.com/9.x/notionists-neutral/svg?seed=' +
                                                    $page.props.auth.user.name
                                                "
                                                alt="@radix-vue"
                                            />
                                        </Avatar>
                                        <span className="min-w-0">
                                            <span
                                                className="block truncate text-sm/5 font-medium  "
                                                >{{
                                                    $page.props.auth.user.name
                                                }}</span
                                            >
                                            <span
                                                className="block truncate text-xs/5 font-normal text-muted-foreground "
                                            >
                                                {{
                                                    $page.props.auth.user.email
                                                }}
                                            </span>
                                        </span>
                                    </span>
                                    <ChevronUpIcon class="h-4 w-4" />
                                </DropdownMenuTrigger>
                                <DropdownMenuContent class="w-64">
                                    <DropdownMenuItem>
                                        Roles and Permissions
                                        <ArrowRight class="h-4 w-4 ml-auto" />
                                    </DropdownMenuItem>
                                    <DropdownMenuSeparator />
                                    <DropdownMenuItem
                                        @click="router.visit('/profile')"
                                    >
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
                                                <DropdownMenuItem
                                                    @click="mode = 'light'"
                                                >
                                                    <span
                                                        :class="
                                                            mode === 'light'
                                                                ? 'text-muted-foreground'
                                                                : ''
                                                        "
                                                        >Light</span
                                                    >
                                                </DropdownMenuItem>
                                                <DropdownMenuItem
                                                    @click="mode = 'dark'"
                                                >
                                                    <span
                                                        :class="
                                                            mode === 'dark'
                                                                ? 'text-muted-foreground'
                                                                : ''
                                                        "
                                                        >Dark</span
                                                    >
                                                </DropdownMenuItem>
                                                <DropdownMenuItem
                                                    @click="mode = 'auto'"
                                                >
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
                                </DropdownMenuContent>
                            </DropdownMenu>
                        </div>
                    </SheetContent>
                </Sheet>
                <div class="w-full flex-1">
                    <div>
                        <slot name="title"></slot>
                    </div>
                </div>
                <div class="flex items-center">
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
                    <Separator orientation="vertical" class="h-10 mx-2" />
                    <DropdownMenu>
                        <DropdownMenuTrigger
                            class="flex w-full items-center gap-3 px-2 py-2.5 text-left text-base/6 font-medium sm:py-2 sm:text-sm/5"
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
                                    <span
                                        className="block truncate text-sm/5 font-medium  "
                                        >{{ $page.props.auth.user.name }}</span
                                    >
                                    <span
                                        className="block truncate text-xs/5 font-normal text-muted-foreground "
                                    >
                                        {{ $page.props.auth.user.email }}
                                    </span>
                                </span>
                            </span>
                            <ChevronDownIcon class="h-4 w-4 ml-auto" />
                        </DropdownMenuTrigger>
                        <DropdownMenuContent class="w-64">
                            <DropdownMenuItem>
                                Roles and Permissions
                                <ArrowRight class="h-4 w-4 ml-auto" />
                            </DropdownMenuItem>
                            <DropdownMenuSeparator />
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
                                        <DropdownMenuItem
                                            @click="mode = 'light'"
                                        >
                                            <span
                                                :class="
                                                    mode === 'light'
                                                        ? 'text-muted-foreground'
                                                        : ''
                                                "
                                                >Light</span
                                            >
                                        </DropdownMenuItem>
                                        <DropdownMenuItem
                                            @click="mode = 'dark'"
                                        >
                                            <span
                                                :class="
                                                    mode === 'dark'
                                                        ? 'text-muted-foreground'
                                                        : ''
                                                "
                                                >Dark</span
                                            >
                                        </DropdownMenuItem>
                                        <DropdownMenuItem
                                            @click="mode = 'auto'"
                                        >
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
                        </DropdownMenuContent>
                    </DropdownMenu>
                </div>
            </header>
            <main class="flex flex-1 flex-col gap-4 p-4 lg:gap-6 lg:p-4">
                <slot></slot>
            </main>
        </div>
    </div>
</template>

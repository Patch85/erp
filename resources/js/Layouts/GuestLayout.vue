<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div
         class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0 dark:bg-gray-900 dark:selection:bg-sky-300 dark:selection:text-gray-900 selection:bg-blue-500 selection:text-white">
        <div>
            <Link href="/">
            <ApplicationLogo :showText="true" />
            </Link>
        </div>

        <div class="w-full px-6 py-4 mt-6 overflow-hidden bg-white shadow-md sm:max-w-md dark:bg-gray-800 sm:rounded-lg">
            <slot />
        </div>
    </div>
</template>

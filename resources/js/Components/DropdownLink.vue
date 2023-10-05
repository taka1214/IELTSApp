<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <Link
        class="block px-4 py-2 my-1 text-left text-sm text-gray-700 shadow-myShadow border border-gray-800 rounded-sm font-semibold"
    >
        <slot />
    </Link>
</template>

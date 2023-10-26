<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button
        :type="type"
        class="inline-flex items-center mx-auto py-2 border border-transparent rounded-md text-shadow-md"
    >
        <slot />
    </button>
</template>

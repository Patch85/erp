<script setup>
const props = defineProps({
    showText: {
        type: Boolean,
        default: false,
    }
});

</script>

<template>
    <div class="flex flex-col ">) 
        <img src="images/appLogo.svg"
             alt="">
        <p v-if="showText"
           class="min-w-full text-2xl text-sky-300">
            Metis
            <span class="ml-0 font-extrabold text-blue-500">ERP</span>
        </p>
    </div>
</template>


<style scoped>
#text1 {
    color: #7dd3fc;
}

#text2 {
    color: #3b82f6;
}
</style>

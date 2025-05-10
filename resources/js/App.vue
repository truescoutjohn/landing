<template>
  <router-view :key="$route.fullPath"></router-view>
</template>
<script setup lang="ts">
//@ts-ignore
import { register } from 'swiper/element/bundle';
import '@css/app.css';

register();
</script>

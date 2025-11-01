<template>
  <button class="shop-btn" :style="{ backgroundColor: color }" @click="ShopNow">
    {{ label }}
  </button>
</template>

<script setup>
defineProps({
  label: String,
  color: {
    type: String,
    default: '#3bb77e'
  }
})
function ShopNow() {
  alert("Let's shop Together!");
}
</script>

<style scoped>
.shop-btn {
  color: white;
  border: none;
  padding: 10px 18px;
  border-radius: 8px;
  font-weight: 600;
  cursor: pointer;
  transition: 0.3s;
}
.shop-btn:hover {
  opacity: 0.85;
  
}
</style>

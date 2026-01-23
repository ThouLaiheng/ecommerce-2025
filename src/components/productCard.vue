<template>
  <div
    class="product-card shadow-lg rounded-xl overflow-hidden transform hover:scale-[1.03] hover:shadow-2xl transition-all duration-300 cursor-pointer"
    :style="{ color, backgroundColor: color || '#FFFFFF' }"
  >
    <img
      :src="getFullImageUrl(imageSource)"
      :alt="name"
      class="w-full aspect-square object-contain p-4 transition-transform duration-300"
      @error="handleImageError"
    />
    <div class="flex flex-col items-center justify-center p-4 text-center">
      <h3 class="text-xl font-bold text-gray-800">{{ name }}</h3>
      <p class="text-gray-400 font-medium text-sm mt-1">{{ productCount }} items</p>
    </div>
  </div>
</template>

<script>
const FALLBACK_IMAGE = 'src/assets/imgs/default.png'

export default {
  name: 'ProductCard',
  props: {
    name: { type: String, required: true },
    image: { type: String, required: true },
    productCount: { type: [String, Number], required: true },
    color: { type: String, default: 'bg-white' },
  },
  data() {
    return {
      imageSource: this.image,
    }
  },
  watch: {
    image(newImage) {
      this.imageSource = newImage
    },
  },
  methods: {
    getFullImageUrl(imgPath) {
      if (!imgPath) return FALLBACK_IMAGE
      return imgPath
    },
    handleImageError() {
      this.imageSource = FALLBACK_IMAGE
    },
  },
}
</script>

<style scoped>
.product-card {
  display: flex;
  flex-direction: column;
  align-items: center;
}
</style>

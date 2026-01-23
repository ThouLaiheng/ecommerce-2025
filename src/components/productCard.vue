<template>
  <div
    class="product-card flex-shrink-0 w-44 shadow-md rounded-2xl overflow-hidden hover:shadow-lg transition-all duration-300 cursor-pointer"
    :style="{ backgroundColor: color || '#FFFFFF' }"
  >
    <div class="p-8">
      <img
        :src="getFullImageUrl(imageSource)"
        :alt="name"
        class="w-full aspect-square object-contain"
        @error="handleImageError"
      />
    </div>
    <div class="flex flex-col items-center justify-center px-4 pb-6 pt-2 text-center">
      <h3 class="text-base font-semibold text-gray-800">{{ name }}</h3>
      <p class="text-gray-400 font-normal text-sm mt-1">{{ productCount }} items</p>
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
      // Allow local asset paths directly (Vite handles these)
      if (imgPath.includes('src/assets/')) return imgPath
      // For backend-provided relative paths, keep compatibility
      return imgPath.startsWith('http') ? imgPath : `http://localhost:3000/${imgPath}`
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

<template>
  <div
    class="flex flex-row justify-between items-center rounded-2xl p-8 shadow-md hover:shadow-lg transition-all duration-300"
    :style="{ backgroundColor: color || '#FFFFFF' }"
  >
    <div class="flex-1 space-y-4">
      <h2 class="text-xl font-bold text-gray-800 leading-snug" style="max-width: 200px;">{{ title }}</h2>

      <button
        class="px-6 py-2.5 text-sm text-white rounded-lg font-medium transition-all duration-300 hover:opacity-90 inline-flex items-center gap-2"
        :style="{ backgroundColor: buttonColor || '#10B981' }"
        @click="shopNow"
        @error="handleImageError"
      >
        Shop Now <i class="pi pi-arrow-right text-xs"></i>
      </button>
    </div>
    <img
      :src="getFullImageUrl(image)"
      :alt="title"
      class="w-48 h-48 object-contain flex-shrink-0"
    />
  </div>
</template>

<script>
import 'primeicons/primeicons.css'
const FALLBACK_IMAGE = 'src/assets/imgs/default.png'
export default {
  name: 'ProductPromotion',
  props: {
    title: { type: String, required: true },
    image: { type: String, required: true },
    color: { type: String, default: 'bg-white' },
    buttonColor: { type: String, default: 'bg-emeral-500' },
    url: { type: String, default: '' },
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
    shopNow() {
      alert(`Let's shop — ${this.title}!`)
    },

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

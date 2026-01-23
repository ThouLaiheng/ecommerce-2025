<template>
  <div
    class="flex flex-col md:flex-row justify-between items-center rounded-xl p-6 shadow-md hover:shadow-xl hover:scale-[1.02] transition-all duration-300 gap-6 md:gap-10"
    :style="{ color, backgroundColor: color || '#FFFFFF' }"
  >
    <div class="w-full md:w-1/2 space-y-4 text-center md:text-left">
      <h2 class="text-2xl font-semibold text-gray-800">{{ title }}</h2>

      <button
        class="px-10 py-2 text-white rounded-lg transition-colors duration-300"
        :style="{ backgroundColor: buttonColor || '#10B981' }"
        @click="shopNow"
        @error="handleImageError"
      >
        Shop Now <i class="pi pi-arrow-right"></i>
      </button>
    </div>
    <img
      :src="getFullImageUrl(image)"
      :alt="title"
      class="w-full md:w-1/2 max-h-60 object-contain"
    />
  </div>
</template>

<script>
import 'primeicons/primeicons.css'
import defaultImg from '@/assets/imgs/default.png'

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
      imageSource: this.image || defaultImg,
    }
  },
  watch: {
    image(newImage) {
      this.imageSource = newImage || defaultImg
    },
  },
  methods: {
    shopNow() {
      alert(`Let's shop — ${this.title}!`)
    },

    getFullImageUrl(imgPath) {
      if (!imgPath) return defaultImg
      // If it's already a full URL or import, return as is
      if (imgPath.startsWith('http') || imgPath.startsWith('blob:') || imgPath.startsWith('data:')) {
        return imgPath
      }
      return imgPath
    },

    handleImageError() {
      this.imageSource = defaultImg
    },
  },
}
</script>

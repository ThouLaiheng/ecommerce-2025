<template>
  <div
    class="w-40 h-56 shadow-lg rounded-xl overflow-hidden transform hover:scale-[1.03] hover:shadow-2xl transition-all duration-300 cursor-pointer"
    :style="{ color, backgroundColor: color || '#FFFFFF' }"
  >
    <img
      :src="getFullImageUrl(imageSource)"
      :alt="name"
      class="w-full aspect-square object-contain p-6 transition-transform duration-300"
      @error="handleImageError"
    />
    <div class="flex flex-col items-center justify-center text-center">
      <h3 class="text-xl font-semibold text-gray-800">{{ name }}</h3>
      <p class="text-gray-400 font-medium text-sm pt-1">{{ productCount }} items</p>
    </div>
  </div>
</template>

<script>
import defaultImg from '@/assets/imgs/default.png'

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
      imageSource: this.image || defaultImg,
    }
  },
  watch: {
    image(newImage) {
      this.imageSource = newImage || defaultImg
    },
  },
  methods: {
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

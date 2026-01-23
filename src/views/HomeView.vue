<template>
  <main class="container mx-auto px-6 py-8 space-y-12">
    <!-- Categories -->
    <section class="w-full">
      <h2 class="text-2xl font-bold text-gray-900 mb-6">Categories</h2>

      <div class="flex gap-4 overflow-x-auto pb-4 scrollbar-hide">
        <productCard
          v-for="category in categories"
          :key="category.id"
          :name="category.name"
          :image="category.image"
          :productCount="category.productCount"
          :color="category.color || category.color_hex"
        />
      </div>
    </section>

    <!-- Featured promotion -->
    <section v-if="promotions && promotions.length" class="w-full">
      <h2 class="text-2xl font-bold text-gray-900 mb-6">Featured Deals</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <productPromotion
          v-for="promotion in promotions"
          :key="promotion.id"
          :title="promotion.title"
          :image="promotion.image"
          :color="promotion.color || promotion.color_hex"
          :buttonColor="promotion.buttonColor || promotion.button_color_hex"
          :url="promotion.url"
        />
      </div>
    </section>
  </main>
</template>

<script>
import productCard from '@/components/productCard.vue'
import productPromotion from '@/components/productPromotion.vue'
export default {
  name: 'HomeView',
  components: { productCard, productPromotion },
  props: {
    categories: {
      type: Array,
      required: true,
    },
    promotions: {
      type: Array,
      required: true,
    },
  },
}
</script>

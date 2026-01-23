<template>
  <main class="container mx-auto px-4 py-8 space-y-8">
    <!-- Categories -->
    <section class="w-full mx-auto p-4 md:p-8">
      <h2 class="text-3xl font-bold text-gray-900 mb-6 pb-2">Categories</h2>

      <div class="grid grid-cols-5 sm:grid-cols-6 lg:grid-cols-8 xl:grid-cols-10 gap-4">
        <productCard
          v-for="category in categories"
          :key="category.id"
          :name="category.name"
          :image="category.image"
          :productCount="category.productCount"
          :color="category.color || category.color_hex"
          class="transform transition duration-300 ease-in-out hover:scale-[1.03] hover:shadow-xl"
        />
      </div>
    </section>

    <!-- Featured promotion -->
    <section v-if="promotions && promotions.length" class="w-full mx-auto p-4 md:p-8">
      <h2 class="text-4xl font-bold text-gray-900 mb-10 pb-3">Featured Deals</h2>
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

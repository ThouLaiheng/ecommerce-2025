import { defineStore } from 'pinia'
import { api } from '@/services/api'

export const useProductStore = defineStore('productStore', {
  state: () => ({
    groups: [],
    categories: [],
    promotions: [],
    products: [],
  }),

  getters: {
    getGroups: (state) => state.groups,
    getPromotions: (state) => state.promotions,
    getProductSales: (state) => state.products,
    getCategoriesByGroup: (state) => (groupName) => {
      if (groupName === 'Group All') return state.categories
      return state.categories.filter(
        (c) => c.group && c.group.toLowerCase().trim() === groupName.toLowerCase().trim(),
      )
    },
  },

  actions: {
    async loadAll() {
      const [g, c, p, s] = await Promise.all([
        api.getGroups(),
        api.getCategories(),
        api.getPromotions(),
        api.getProductSales(),
      ])

      this.groups = g.data
      
      // Map category images to local assets
      const categoryImageMap = {
        'Milks & Diaries': new URL('@/assets/imgs/juice.png', import.meta.url).href,
        'Organic Milk': new URL('@/assets/imgs/juice.png', import.meta.url).href,
        'Coffee & Tea': new URL('@/assets/imgs/cake.png', import.meta.url).href,
        'Green Tea': new URL('@/assets/imgs/cake.png', import.meta.url).href,
        'Pet Food': new URL('@/assets/imgs/fast-food.png', import.meta.url).href,
        'Dog Food': new URL('@/assets/imgs/fast-food.png', import.meta.url).href,
        'Fresh Meat': new URL('@/assets/imgs/blackplum.png', import.meta.url).href,
        'Vegetables': new URL('@/assets/imgs/vegetables.png', import.meta.url).href,
        'Fresh Fruits': new URL('@/assets/imgs/apple.png', import.meta.url).href,
      }
      
      this.categories = c.data.map((category) => ({
        ...category,
        image: categoryImageMap[category.name] || new URL('@/assets/imgs/default.png', import.meta.url).href,
      }))
      
      // Map promotion images to local assets
      const promotionImages = [
        new URL('@/assets/imgs/backgroundLayer.png', import.meta.url).href,
        new URL('@/assets/imgs/vegetables.png', import.meta.url).href,
      ]
      
      this.promotions = p.data.map((promotion, index) => ({
        ...promotion,
        image: promotionImages[index] || new URL('@/assets/imgs/default.png', import.meta.url).href,
      }))
      
      this.products = s.data
      
      // Map product images to local assets
      const imageMap = {
        'Organic Whole Milk': new URL('@/assets/imgs/juice.png', import.meta.url).href,
        'Fresh Green Coffee Beans': new URL('@/assets/imgs/cake.png', import.meta.url).href,
        'Premium Dog Food': new URL('@/assets/imgs/fast-food.png', import.meta.url).href,
        'Fresh Organic Beef': new URL('@/assets/imgs/blackplum.png', import.meta.url).href,
        'Fresh Vegetables Mix': new URL('@/assets/imgs/vegetables.png', import.meta.url).href,
        'Fresh Apple Pack': new URL('@/assets/imgs/apple_bag.png', import.meta.url).href,
      }
      
      this.products = s.data.map((product) => ({
        ...product,
        image: imageMap[product.name] || new URL('@/assets/imgs/default.png', import.meta.url).href,
      }))
    },
  },
})

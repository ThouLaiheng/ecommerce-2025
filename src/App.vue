<template>
  <div class="min-h-screen bg-gray-50">
    <router-view :categories="categories" :promotions="promotions" />
  </div>
</template>

<script>
export default {
  name: 'App',
  data() {
    return {
      categories: [
        {
          id: 1,
          name: 'Cake & Milk',
          image: 'src/assets/imgs/cake.png',
          productCount: 26,
          color: '#FEF9C3'
        },
        {
          id: 2,
          name: 'Peach',
          image: 'src/assets/imgs/peach.png',
          productCount: 17,
          color: '#FED7AA'
        },
        {
          id: 3,
          name: 'Oganic Kiwi',
          image: 'src/assets/imgs/kiwi.png',
          productCount: 23,
          color: '#D9F99D'
        },
        {
          id: 4,
          name: 'Red Apple',
          image: 'src/assets/imgs/apple.png',
          productCount: 54,
          color: '#FECACA'
        },
        {
          id: 5,
          name: 'Snack',
          image: 'src/assets/imgs/fast-food.png',
          productCount: 56,
          color: '#FEF3C7'
        },
        {
          id: 6,
          name: 'Black plum',
          image: 'src/assets/imgs/blackplum.png',
          productCount: 45,
          color: '#E9D5FF'
        },
        {
          id: 7,
          name: 'Vegetables',
          image: 'src/assets/imgs/vegetables.png',
          productCount: 63,
          color: '#BBF7D0'
        },
        {
          id: 8,
          name: 'Headphone',
          image: 'src/assets/imgs/headphone.png',
          productCount: 33,
          color: '#DBEAFE'
        },
        {
          id: 9,
          name: 'Cake & Milk',
          image: 'src/assets/imgs/cake.png',
          productCount: 34,
          color: '#FEF9C3'
        },
        {
          id: 10,
          name: 'Orange',
          image: 'src/assets/imgs/orange.png',
          productCount: 63,
          color: '#FED7AA'
        }
      ],
      promotions: [
        {
          id: 1,
          title: 'Everyday Fresh & Clean with Our Products',
          image: 'src/assets/imgs/onion_garlic.png',
          color: '#F5F5DC',
          buttonColor: '#10B981',
          url: '/promotions/fresh-clean'
        },
        {
          id: 2,
          title: 'Make your Breakfast Healthy and Easy',
          image: 'src/assets/imgs/juice.png',
          color: '#F3E8FF',
          buttonColor: '#10B981',
          url: '/promotions/breakfast'
        },
        {
          id: 3,
          title: 'The best Organic Products Online',
          image: 'src/assets/imgs/vegetable.png',
          color: '#DBEAFE',
          buttonColor: '#F59E0B',
          url: '/promotions/organic'
        }
      ]
    }
  }
}
</script>

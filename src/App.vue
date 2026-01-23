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
          name: 'Peach',
          productCount: 17,
          color: '#FFE8E8',
          image: 'src/assets/imgs/peach.png',
        },
        {
          id: 2,
          name: 'Red Apple',
          productCount: 68,
          color: '#FFF0E9',
          image: 'src/assets/imgs/apple.png',
        },
        {
          id: 3,
          name: 'Snack',
          productCount: 34,
          color: '#FEF4EB',
          image: 'src/assets/imgs/fast-food.png',
        },
        {
          id: 4,
          name: 'Oganic Kiwi',
          productCount: 23,
          color: '#D9F99D',
          image: 'src/assets/imgs/kiwi.png',
        },
        {
          id: 5,
          name: 'Black plum',
          productCount: 45,
          color: '#E9D5FF',
          image: 'src/assets/imgs/blackplum.png',
        },
        {
          id: 6,
          name: 'Vegetables',
          productCount: 63,
          color: '#BBF7D0',
          image: 'src/assets/imgs/vegetables.png',
        },
        {
          id: 7,
          name: 'Headphone',
          productCount: 33,
          color: '#DBEAFE',
          image: 'src/assets/imgs/headphone.png',
        },
        {
          id: 8,
          name: 'Orange',
          productCount: 63,
          color: '#FED7AA',
          image: 'src/assets/imgs/orange.png',
        },
      ],
      promotions: [
        {
          id: 1,
          title: 'Everyday Fresh and Clean with Our Products',
          image: 'src/assets/imgs/onion_garlic.png',
          color: '#F0E9D7',
          buttonColor: '#42B678',
          url: '/promotions/1',
        },
        {
          id: 2,
          title: 'Make your Breakfast Healthy and Easy',
          image: 'src/assets/imgs/juice.png',
          color: '#F3E8FF',
          buttonColor: '#10B981',
          url: '/promotions/2',
        },
        {
          id: 3,
          title: 'The best Organic Products Online',
          image: 'src/assets/imgs/vegetable.png',
          color: '#DBEAFE',
          buttonColor: '#F59E0B',
          url: '/promotions/3',
        },
      ],
    }
  },
}
</script>

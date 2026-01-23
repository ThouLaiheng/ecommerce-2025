import axios from 'axios'

const BASE_URL = '/api'

export const api = {
  getGroups() {
    return axios.get(`${BASE_URL}/groups`)
  },
  getCategories() {
    return axios.get(`${BASE_URL}/categories`)
  },
  getPromotions() {
    return axios.get(`${BASE_URL}/promotions`)
  },
  getProductSales() {
    return axios.get(`${BASE_URL}/products`)
  },
}

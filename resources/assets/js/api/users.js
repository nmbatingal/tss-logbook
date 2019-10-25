import axios from 'axios';

const client = axios.create({
    baseURL: '/api',
});

export default {
    all(params) {
      return client.get('users', params);
    },
    create(data) {
        return client.post('users', data);
    },
    find(id) {
      return client.get(`users/${id}`);
    },
    update(id, data) {
      return client.put(`users/${id}`, data);
    },
    delete(id) {
      return client.delete(`users/${id}`);
    },
};
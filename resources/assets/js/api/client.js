import axios from 'axios';

const client = axios.create({
    baseURL: '/api',
});

export default {
    all(params) {
      return client.get('clients', params);
    },
    create(data) {
        return client.post('clients', data);
    },
    find(id) {
      return client.get(`clients/${id}`);
    },
    update(id, data) {
      return client.put(`clients/${id}`, data);
    },
    delete(id) {
      return client.delete(`clients/${id}`);
    },
};
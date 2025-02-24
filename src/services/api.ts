import axios from 'axios';

const api = axios.create({
  baseURL: import.meta.env.VITE_API_URL || 'http://localhost:8000/api',
  headers: {
    'Content-Type': 'application/json',
  },
});

// Add request interceptor for authentication
api.interceptors.request.use((config) => {
  const token = localStorage.getItem('token');
  if (token) {
    config.headers.Authorization = `Bearer ${token}`;
  }
  return config;
});

export const memberApi = {
  register: (data: FormData) => api.post('/members/', data),
  getAll: () => api.get('/members/'),
  getById: (id: string) => api.get(`/members/${id}/`),
  update: (id: string, data: FormData) => api.put(`/members/${id}/`, data),
  delete: (id: string) => api.delete(`/members/${id}/`),
};

export const clubApi = {
  create: (data: any) => api.post('/clubs/', data),
  getAll: () => api.get('/clubs/'),
  getById: (id: string) => api.get(`/clubs/${id}/`),
  update: (id: string, data: any) => api.put(`/clubs/${id}/`, data),
  delete: (id: string) => api.delete(`/clubs/${id}/`),
};

export const gymnastApi = {
  create: (data: FormData) => api.post('/gymnasts/', data),
  getAll: () => api.get('/gymnasts/'),
  getByCoach: (coachId: string) => api.get(`/gymnasts/coach/${coachId}/`),
  getById: (id: string) => api.get(`/gymnasts/${id}/`),
  update: (id: string, data: FormData) => api.put(`/gymnasts/${id}/`, data),
  delete: (id: string) => api.delete(`/gymnasts/${id}/`),
};

export default api;
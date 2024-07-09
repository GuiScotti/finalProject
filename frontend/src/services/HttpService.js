import CryptoJS from 'crypto-js';
import router from '../router';
import axios from "axios";

const HttpService = axios.create({
  baseURL: "http://final.test/api",
  headers: {
    "Content-type": "application/json",
  },
});

export const encryptToken = (token) => {
  const secretKey = process.env.VUE_APP_SECRET_KEY;
  return CryptoJS.AES.encrypt(token, secretKey).toString();
};

export const decryptToken = (encryptedToken) => {
  const secretKey = process.env.VUE_APP_SECRET_KEY;
  const bytes = CryptoJS.AES.decrypt(encryptedToken, secretKey);
  return bytes.toString(CryptoJS.enc.Utf8);
};

export const login = async (email, password) => {
  try {
    const response = await HttpService.post('/login', {
      email: email,
      password: password
    });
    const token = response.data;
    console.log("batata");
    console.log(token);
    return response.data;
  } catch (error) {
    console.error('Erro ao fazer login:', error);
    throw error;
  }
};

HttpService.interceptors.request.use(
  config => {
    const token = localStorage.getItem('token');
    if (token) {
      config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
  },
  error => Promise.reject(error)
);

HttpService.interceptors.response.use(
  response => response,
  error => {
    if (error.response && error.response.status === 401) {
      router.push({ name: 'login' });
    }
    return Promise.reject(error);
  }
);

export const register = async (name, email, password, password_confirmation, documentType, documentNumber) => {
  try {
    const response = await HttpService.post('/register', {
      name: name,
      email: email,
      password: password,
      password_confirmation: password_confirmation,
      documentType: documentType,
      documentNumber: documentNumber
    });
    router.push({ name: 'login' });
    return response.data;
    
  } catch (error) {
    console.error('Erro ao registrar usuário:', error);
    throw error;
  }
}

export default HttpService;

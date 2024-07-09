<template>
  <div id="main">
    <backEffect />
    <div id="main-container">
      <div id="formArea">
        <div id="logoArea">
          <div id="logo3c">
            <img id="three" src="../assets/vencedor/3da3c.png" alt="three" />
            <img id="LetterC" src="../assets/vencedor/cDa3c.png" alt="c" />
            <img id="plus" src="../assets/vencedor/PlusDa3c.png" alt="plus" />
          </div>
          <div id="pics3c">
            <img id="plusIcon" src="../assets/vencedor/plus3c.png" alt="plus" />
            <img
              id="messageIcon"
              src="../assets/vencedor/message3c.png"
              alt="message"
            />
            <img
              id="asterisc"
              src="../assets/vencedor/asterisc3c.png"
              alt="asterisc"
            />
          </div>
        </div>
        <div id="titleArea">
          <img src="../assets/vencedor/Title3c.PNG" alt="title" />
          <p>Um único login para todos os produtos da 3c plus</p>
        </div>
        <div id="form">
          <InputForm
            type="text"
            v-model="email"
            placeholder="Email ou Ramal"
            id="email"
            label="Email ou Ramal"
          />
          <InputForm
            type="password"
            v-model="password"
            placeholder="Senha"
            id="password"
            label="Senha"
          />
          <div id="linkForm">
            <router-link class="link" to="/remember"
              >Esqueceu sua senha?</router-link
            >
            <router-link class="link" to="/register"
              >Crie sua conta</router-link
            >
          </div>
          <button type="button" class="btn btn-primary" @click="handleLogin">
            Entrar
          </button>
        </div>
      </div>
      <AppFooter />
    </div>
  </div>
</template>

<script>
import { login } from "../services/HttpService";
import AppFooter from "../components/AppFooter.vue";
import backEffect from "../components/backEffect.vue";
import InputForm from "../components/InputForm.vue";

export default {
  name: "Login",
  components: {
    AppFooter,
    backEffect,
    InputForm,
  },
  data() {
    return {
      email: "",
      password: "",
    };
  },
  methods: {
    async handleLogin() {
      try {
        const response = await login(this.email, this.password);
        const token = response.data.token;
        this.storeToken(token);
        this.$router.push({ name: "Dashboard" });
      } catch (error) {
        console.error("Erro ao fazer login:", error);
      }
    },
    getToken() {
      const encryptedToken = localStorage.getItem("authToken");
      if (encryptedToken) {
        return decryptToken(encryptedToken);
      }
      return null;
    },
  },
};
</script>


<style scoped>
#main {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  height: 100vh;
  overflow: hidden;
}

/* FORM STYLE */
#main-container {
  width: 40%;
  height: 85%;
  position: absolute;
  background-color: #ffffff;
  border-radius: 10px;
  padding: 30px 30px 80px 30px;
  z-index: 1050 !important;
  box-shadow: 0 4px 18px 0 rgba(34, 54, 77, 0.12);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  color: #677c92;
}

/* FORM STYLE */

/* TITLE STYLE */

#titleArea {
  display: flex;
  flex-direction: column;
  justify-content: center !important;
  align-items: center;
}

#titleArea img {
  width: 308.81px;
  height: 27.19px;
  margin: 32px 0px 12px;
}

/* STYLE FROM THE FORM */

#form {
  width: 100%;
  margin: 8px 0px 0px;
}

#linkForm {
  display: flex;
  justify-content: space-between;
  margin-top: px;
  width: 98%;
  align-items: center;
  margin-left: 5px;
}

#linkForm .link {
  text-decoration: none !important;
  font-size: 14px;
  color: inherit;
  margin-bottom: 10px;
}

#form button {
  width: 100%;
  height: 40px;
  margin-bottom: -50px;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 8px;
  cursor: pointer;
}

#form button:hover {
  background-color: #0056b3;
}

/* LOGO ANIMATION */

#logoArea {
  width: 100%;
  height: 65px;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
  overflow: hidden;
}

#logo3c,
#pics3c {
  display: flex;
  align-items: center;
  justify-content: center;
  position: absolute;
  top: 0;
  width: 100%;
  height: 100%;
}

@keyframes moveUp {
  0%,
  5% {
    transform: translateY(100%);
    visibility: hidden;
  }
  10%,
  45% {
    transform: translateY(0);
    visibility: visible;
  }
  50%,
  95% {
    transform: translateY(-100%);
    visibility: hidden;
  }
  100% {
    transform: translateY(100%);
    visibility: hidden;
  }
}

@keyframes moveUpDelayed {
  0%,
  55% {
    transform: translateY(100%);
    visibility: hidden;
  }
  60%,
  95% {
    transform: translateY(0);
    visibility: visible;
  }
  100% {
    transform: translateY(-100%);
    visibility: hidden;
  }
}

#logo3c {
  animation: moveUp 15s ease-in-out infinite;
}

#pics3c {
  animation: moveUpDelayed 15s ease-in-out infinite;
}

#logo3c #three {
  width: 41.18px;
  height: 60.41px;
}

#logo3c #LetterC {
  width: 50.18px;
  height: 60.41px;
}

#logo3c #plus {
  width: 21.06px;
  height: 21.06px;
  margin-left: -5px;
}

#pics3c #plusIcon,
#pics3c #messageIcon,
#pics3c #asterisc {
  width: 59.38px;
  height: 60.69px;
  margin: 0 10px;
}
</style>

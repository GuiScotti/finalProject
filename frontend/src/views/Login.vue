<template>
  <div id="main">
    <backEffect />
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
          <div class="form-floating mb-3">
            <input
              type="email"
              class="form-control"
              placeholder="name@example.com"
            />
            <label for="floatingInput">Email ou Ramal</label>
          </div>
          <div class="form-floating">
            <input
              type="password"
              class="form-control"
              id="floatingPassword"
              placeholder="Password"
            />
            <label for="floatingPassword">Senha</label>
          </div>
          <div id="linkForm">
            <router-link class="link">Esqueceu sua senha?</router-link>
            <router-link class="link">Crie sua conta</router-link>
          </div>
          <button type="button" class="btn btn-primary">Entrar</button>
      </div>
    </div>
    <AppFooter />
  </div>
</template>

<script>
import AppFooter from "../components/AppFooter.vue";
import backEffect from "../components/backEffect.vue";

export default {
  name: "Login",
  components: {
    AppFooter,
    backEffect,
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
  background-color: #fefeff;
  overflow: hidden;
  z-index: 100;
}

/* FORM STYLE */
#formArea {
  height: 100%;
  width: 43%;
  background-color: #ffffff;
  border-radius: 10px;
  padding: 56px;
  z-index: 1050 !important;
  box-shadow: 0 4px 18px 0 rgba(34, 54, 77, 0.12);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  color: #677c92;
  margin-bottom: 40px;
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
  margin: 32px 0px 0px;
}

#form .form-floating {
  position: relative;
}

#form .form-control {
  border-radius: 8px;
  width: 100%;
  padding-top: 12px; 
  padding-bottom: 4px; 
  font-size: 17px;
}

#form .form-control:focus {
  border-color: #007bff;
  box-shadow: none;
}

#form .form-control:focus + label,
#form .form-control:not(:placeholder-shown) + label {
  transform: translateY(-50%);
  font-size: 17px; 
  color: #495057;
}

#form label {
  position: absolute;
  transition: all 0.2s;
  pointer-events: none;
  font-size: 17px;
}

#form button {
  width: 100%;
  height: 50px;
  margin-top: 40px;
}

#linkForm {
  display: flex;
  justify-content: space-between;
  margin-top: 10px;
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
</style>

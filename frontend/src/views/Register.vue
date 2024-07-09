<template>
  <div id="main-wrapper">
    <backEffect />
    <div id="main">
      <div id="banner">
        <div id="icons">
          <img src="../assets/vencedor/message3c.png" alt="message" />
          <img src="../assets/vencedor/asterisc3c.png" alt="asterisc" />
          <img src="../assets/vencedor/plus3c.png" alt="plus" />
        </div>
        <div id="title">
          <div id="title-line">
            <p id="mais" class="carac">Mais</p>
            <div v-if="showWord">
              <span
                v-for="(char, index) in titleChars"
                :key="index"
                id="animated-word"
                :style="{ animationDelay: `${index * 0.1}s` }"
                >{{ char }}</span
              >
            </div>
          </div>
          <p class="carac">no seu negócio</p>
          <p id="subject">
            Uma ferramenta all-in-one para você vender, atender, cobrar e
            otimizar o seu tempo e o seu dinheiro.
          </p>
        </div>
      </div>
      <form>
        <InputForm
          type="text"
          v-model="name"
          placeholder="Nome"
          id="name"
          label="Nome"
          class="input"
        />
        <InputForm
          type="email"
          v-model="email"
          placeholder="Email ou Ramal"
          id="email"
          label="Email"
          class="input"
        />
        <InputForm
          type="password"
          v-model="password"
          placeholder="Senha"
          id="password"
          label="Senha"
          class="input"
        />
        <InputForm
          type="password"
          v-model="password_confirmation"
          placeholder="Confirme sua senha"
          id="password_confirmation"
          label="Confirme sua senha"
          class="input"
        />
        <div
          class="btn-group"
          role="group"
          aria-label="Basic radio toggle button group"
        >
          <input
            type="radio"
            class="btn-check"
            name="btnradio"
            id="btnradio1"
            autocomplete="off"
            value="CPF"
            v-model="documentType"
            checked
          />
          <label class="btn btn-outline-primary" for="btnradio1">CPF</label>
          <input
            type="radio"
            class="btn-check"
            name="btnradio"
            id="btnradio2"
            autocomplete="off"
            value="CNPJ"
            v-model="documentType"
          />
          <label class="btn btn-outline-primary" for="btnradio2">CNPJ</label>
        </div>
        <InputForm
          type="text"
          v-model="formattedDocumentNumber"
          :placeholder="`Número do ${documentType}`"
          id="docNum"
          :maxlength="documentMaxLength"
          :label="`Número do ${documentType}`"
          class="input"
        />
        <button type="button" class="btn btn-primary" @click="handleRegister">
          Registrar-se
        </button>
      </form>
    </div>
    <AppFooter />
  </div>
</template>

<script>
import backEffect from "../components/backEffect.vue";
import AppFooter from "../components/AppFooter.vue";
import InputForm from "../components/InputForm.vue";
import { register } from "../services/HttpService";

export default {
  name: "Register",
  components: {
    backEffect,
    AppFooter,
    InputForm,
  },
  data() {
    return {
      name: "",
      email: "",
      password: "",
      password_confirmation: "",
      documentType: "CPF",
      documentNumber: "",
      words: ["lucro", "produtividade", "vendas", "crescimento", "resultados"],
      currentWordIndex: 0,
      currentWord: "",
      showWord: false,
    };
  },
  computed: {
    titleChars() {
      return this.currentWord.split('');
    },
    formattedDocumentNumber: {
      get() {
        return this.formatDocumentNumber(
          this.documentNumber,
          this.documentType
        );
      },
      set(value) {
        this.documentNumber = this.unformatDocumentNumber(value);
      },
    },
    documentMaxLength() {
      return this.documentType === "CPF" ? 14 : 18;
    },
  },
  mounted() {
    this.updateWord();
    setInterval(() => {
      this.updateWord();
    }, 5000);
  },
  methods: {
    updateWord() {
      this.showWord = false;
      setTimeout(() => {
        this.currentWord = this.words[this.currentWordIndex];
        this.currentWordIndex = (this.currentWordIndex + 1) % this.words.length;
        this.showWord = true;
      }, 100);
    },
    async handleRegister() {
      if (this.password !== this.password_confirmation) {
        this.errorMessage = "As senhas não coincidem";
        return;
      }

      try {
        const response = await register(
          this.name,
          this.email,
          this.password,
          this.password_confirmation,
          this.documentType,
          this.unformatDocumentNumber(this.documentNumber)
        );
        return response.data;
      } catch (error) {
        console.error("erro: ", error);
      }
    },
    formatDocumentNumber(number, type) {
      if (type === "CPF") {
        return number
          .replace(/\D/g, "")
          .replace(/(\d{3})(\d)/, "$1.$2")
          .replace(/(\d{3})(\d)/, "$1.$2")
          .replace(/(\d{3})(\d{1,2})$/, "$1-$2");
      } else if (type === "CNPJ") {
        return number
          .replace(/\D/g, "")
          .replace(/(\d{2})(\d)/, "$1.$2")
          .replace(/(\d{3})(\d)/, "$1.$2")
          .replace(/(\d{3})(\d)/, "$1/$2")
          .replace(/(\d{4})(\d{1,2})$/, "$1-$2");
      }
      return number;
    },
    unformatDocumentNumber(number) {
      return number.replace(/\D/g, "");
    },
  },
};
</script>

<style scoped>
#icons img {
  width: 30px;
  height: 30px;
  margin: 0px 20px 0px 0px;
}

.btn-group {
  width: 40%;
}

#title {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  padding: 20px 0px;
  color: #212529;
}

#title-line {
  display: flex;
  align-items: baseline;
  margin-bottom: -20px;
}

#banner {
  margin-top: 70px;
  align-items: flex-start;
  display: flex;
  flex-direction: column;
}

#mais {
  font-family: "grotesque";
  margin-right: 20px;
}

.carac {
  font-weight: bolder;
  font-size: 60px;
  margin: 0;
}

#subject {
  margin-top: 20px;
  display: flex;
  align-items: flex-start;
  font-size: 22px;
  width: 80%;
}

@keyframes slideIn {
  0% {
    transform: translateX(0%);
    opacity: 1;
  }
  50% {
    opacity: 1;
  }
  100% {
    transform: translateX(0%);
    opacity: 0;
  }
}

#animated-word {
  color: rgb(48, 87, 242);
  font-size: 60px;
  font-weight: bolder;
  display: inline-block;
  animation: slideIn 1s linear;
}

.hidden {
  visibility: hidden;
}

#main-wrapper {
  width: 100%;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}

#main {
  position: absolute;
  width: 80%;
  height: 80%;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  z-index: 1;
  margin-bottom: 40px;
}

form {
  display: inherit;
  width: 70%;
  flex-direction: column;
  align-items: center;
  background-color: #ffffff;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  border-radius: 8px;
  padding: 30px;
}

form .input {
  margin: 13px 0px;
}

form button {
  width: 100%;
  height: 40px;
  margin-bottom: -50px;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 8px;
  cursor: pointer;
}

form button:hover {
  background-color: #0056b3;
}
</style>
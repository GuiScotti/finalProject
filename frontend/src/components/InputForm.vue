<template>
  <div class="form-group form-floating">
    <input
      :type="type"
      class="form-control"
      v-model="inputValue"
      :placeholder="placeholder"
      :maxlength="maxlength"
      :id="id"
    />
    <label :for="id">{{ label }}</label>
  </div>
</template>

<script>
export default {
  name: "InputForm",
  props: {
    type: {
      type: String,
      default: "text",
    },
    modelValue: {
      type: String,
      default: "",
    },
    placeholder: {
      type: String,
      default: "",
    },
    id: {
      type: String,
      default: "",
    },
    maxlength: {
      type: Number,
      default: null
    },
    label: {
      type: String,
      default: "",
    },
  },
  computed: {
    inputValue: {
      get() {
        return this.modelValue;
      },
      set(value) {
        this.$emit("update:modelValue", value);
      },
    },
  },
};
</script>

<style scoped>
#form {
  width: 100%;
  margin: 8px 0px 0px;
}

.form-group {
  position: relative;
  margin: 16px 0px 6px 0px;
  width: 100%;
}

.form-floating > .form-control {
  min-height: 0 !important;
}

.form-control {
  border: 1px solid #ced4da;
  border-radius: 8px;
  width: 100%;
  padding: 4px 12px !important;
  font-size: 14px;
  height: 43px;
}

.form-control:focus {
  border-color: #007bff;
  box-shadow: none;
  outline: none;
}

.form-control:focus + label,
.form-control:not(:placeholder-shown) + label {
  transform: translateY(-57%);
  font-size: 16px;
  color: #495057;
}

label {
  top: -6px;
  pointer-events: none;
  transition: all 0.2s;
  font-size: 16px;
}
</style>
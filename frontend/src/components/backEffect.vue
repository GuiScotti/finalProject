<template>
  <div id="back-effect">
    <div id="firstBox"></div>
    <div id="secondBox"></div>
    <div id="thirdBox"></div>
  </div>
</template>

<script>
export default {
  name: 'backEffect'
}
</script>

<style scoped>
/* BACKGROUND ANIMATION */
@keyframes spin {
  0% {
    transform: rotate(0deg) translate(50px, 0);
  }
  50% {
    transform: rotate(240deg) translate(50px, 0);
  }
  100% {
    transform: rotate(480deg) translate(50px, 0);
  }
}

@keyframes spinAnti {
  0% {
    transform: rotate(0deg) translate(-50px, 0);
  }
  50% {
    transform: rotate(240deg) translate(-50px, 0);
  }
  100% {
    transform: rotate(480deg) translate(-50px, 0);
  }
}

#back-effect {
  position: fixed;
  width: 100%;
  height: 100%;
  z-index: -1;
  overflow: hidden;
  pointer-events: none;
  filter: blur(80px);
}

#firstBox,
#secondBox,
#thirdBox {
  position: absolute;
  width: 400px;
  height: 400px;
}


#firstBox {
  background-color: rgba(255, 0, 0, 0.5);
  top: 0;
  right: 0;
  animation: spin 20s linear infinite;
  margin-right: -300px;
  margin-top: -200px;
}

#secondBox {
  background-color: rgb(27, 27, 255);
  top: 0;
  left: 0;
  margin-left: -300px;
  margin-top: -200px;
  animation: spin 20s linear infinite;
}

#thirdBox {
  background-color: rgb(255, 149, 0);
  bottom: 0;
  right: 0;
  margin-right: -300px;
  margin-bottom: -200px;
  animation: spinAnti 20s linear infinite;
}
</style>
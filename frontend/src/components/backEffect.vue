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

<style>
/* BACKGROUND ANIMATION */
@keyframes spin {
  0% {
    transform: rotate(0deg) translate(50px, 0);
  }
  50% {
    transform: rotate(180deg) translate(50px, 0);
  }
  100% {
    transform: rotate(360deg) translate(50px, 0);
  }
}

@keyframes spinAnti {
  0% {
    transform: rotate(0deg) translate(-50px, 0);
  }
  50% {
    transform: rotate(180deg) translate(-50px, 0);
  }
  100% {
    transform: rotate(360deg) translate(-50px, 0);
  }
}

#back-effect {
  position: relative;
  display: flex;
  width: 100%;
  height: 100%;
}

#firstBox,
#secondBox,
#thirdBox {
  position: absolute;
  width: 400px;
  height: 400px;
  animation: spin 20s linear infinite;
  filter: blur(500px);
}

#firstBox {
  background-color: rgb(255, 0, 0);
  top: 0;
  right: 0;
  margin-right: -200px;
  margin-top: -200px;
}

#secondBox {
  background-color: rgb(0, 0, 255);
  top: 0;
  left: 0;
  margin-left: -200px;
  margin-top: -200px;
}

#thirdBox {
  background-color: rgb(255, 166, 0);
  animation: spinAnti 20s linear infinite;
  bottom: 0;
  right: 0;
  margin-right: -200px;
  margin-bottom: -200px;
}
</style>

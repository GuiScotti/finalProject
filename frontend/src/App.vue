<template>
  <main>
    <RouterView />
  </main>
</template>

<style>
@font-face {
    font-family: 'CerebriSans';
    src: url('./assets/fonts/fontsCerebri/CerebriSansPro-Regular.ttf') format('truetype');
    src: url('./assets/fonts/fontsCerebri/CerebriSansPro-Regular.otf') format('opentype');
    font-weight: normal;
    font-style: normal;
}

@font-face {
  font-family: 'grotesque';
  src: url('@/assets/fonts/grotesque/grotesque (30).ttf') format('truetype');
  font-weight: normal;
  font-style: normal;
}

* {
  margin: 0;
  padding: 0;
  font-family: 'CerebriSans';
}
</style>

<template>
  <footer id="footer">
    <div id="links">
      <a href="https://www.instagram.com/3cplusnow/" class="icon">
        <font-awesome-icon :icon="['fab', 'instagram']" />
      </a>
      <a
        href="https://www.tiktok.com/@3cplusnow?_t=8mLHaRJrc3C&_r=1"
        class="icon"
      >
        <font-awesome-icon :icon="['fab', 'tiktok']" />
      </a>
      <a href="https://3cplusnow.com/" class="icon">
        <font-awesome-icon :icon="['fas', 'file-alt']" />
      </a>
      <a href="https://app.3c.plus/terms">Termos de uso</a>
      <a href="https://help.3cplus.com.br/pt-BR/">Ajuda</a>
    </div>
    <div id="ip-info">
      <div id="services">
        <div id="circle">
          <font-awesome-icon :icon="['fas', 'circle-check']" id="checkIcon" />
        </div>
        <a href="https://status.3c.plus/">All services are online</a>
      </div>
      <span>IP: 143.255.102.12</span>
    </div>
  </footer>
</template>
  
  <script>
export default {
  name: "AppFooter",
};
</script>
  
  <style scoped>
#footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 7px;
  background-color: #fff;
  border-top: 1px solid #eaeaea;
  width: 100%;
  position: fixed;
  bottom: 0;
  font-family: "Celebri";
}

#links {
  display: flex;
  gap: 30px;
  align-items: center;
  padding: 8px 12px;
}

#links a:hover {
  color: rgb(57, 57, 203);
  transition: 1s;
}

.icon {
  font-size: 22px !important;
  font-weight: 400;
}

#links a {
  display: flex;
  color: #677c92;
  text-decoration: none;
  font-size: 16px;
  align-items: center;
}

#ip-info {
  display: flex;
  align-items: center;
  color: #677c92;
  margin: 5px;
}

#ip-info span {
  font-size: 16px;
  display: flex;
  align-items: center;
  text-decoration: none !important;
}

#services a {
  text-decoration: none;
  color: #fff;
  font-size: 14px;
}

#circle {
  width: 18px;
  height: 18px;
  border-radius: 50%;
  background-color: rgba(0, 0, 0, 0.1);
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
}

#checkIcon {
  color: #10b981;
  width: 12px;
  height: 12px;
}

#services {
  display: flex;
  flex-direction: row;
  justify-content: space-around;
  color: #fff;
  padding: 6px;
  border-radius: 10px;
  font-weight: 500;
  width: 190px;
  height: 30px;
  margin: 0 10px;
}

#services:hover {
  background-color: #8a91a5;
}
</style>
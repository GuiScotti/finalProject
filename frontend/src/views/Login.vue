<template>
<div id="main">
    <div id="back-effect">
        <div id="firstCircle"></div>
        <div id="secondCircle"></div>
        <div id="thirdCircle"></div>
    </div>
    <div id="formArea">
        <div id="formLogo">
            
        </div>
        <div id="form">
            
        </div>
    </div>
</div>

    


</template>

<script>
export default {
    name: 'Login',
}
</script>


<style>


#main {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #FEFEFF;
    overflow: hidden;
}

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

#back-effect{
    position: relative;
    display: flex;
    width: 100%;
    height: 100%;
}

#firstCircle,
#secondCircle,
#thirdCircle {
    position: absolute;
    width: 400px;
    height: 400px;
    border-radius: 50%;
    animation: spin 20s linear infinite;
    filter: blur(500px);
}

#firstCircle{
    background-color: rgb(255, 159, 159);
    top: 0;
    right: 0;
    margin-right: -100px;
    margin-top: -200px;
}

#secondCircle{
    background-color: rgb(163, 163, 255);
    top: 0;
    left: 0;
    margin-left: -100px;
    margin-top: -200px;
}

#thirdCircle{
    background-color: rgb(255, 211, 128);
    animation: spinAnti 20s linear infinite;
    bottom: 0;
    right: 0;
    margin-right: -100px;
    margin-bottom: -100px;
}

/* FORM STYLE */
#formArea{
    position: absolute;
    width: 600px;
    height: 567.8px;
    background-color: #FFFFFF;
    margin-bottom: 40px;
    border-radius: 10px;
    padding: 56px;
    z-index: 1050px !important;
    box-shadow: 0 4px 18px 0 rgba(34,54,77,.12);
}

#formLogo {
    
}
</style>

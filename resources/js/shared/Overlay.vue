<template>
  <div class="background">
    <div class="ball-wrapper">
      <div class="ball"></div>
    </div>
    <div class="ball-wrapper">
      <div class="ball"></div>
    </div>
    <div class="ball-wrapper">
      <div class="ball"></div>
    </div>
    <div class="ball-wrapper">
      <div class="ball"></div>
    </div>
    <div class="ball-wrapper">
      <div class="ball"></div>
    </div>
    <div class="ball-wrapper">
      <div class="ball"></div>
    </div>
    <div class="ball-wrapper">
      <div class="ball"></div>
    </div>
    <div class="ball-wrapper">
      <div class="ball"></div>
    </div>

    <slot />
  </div>
</template>
<style scoped>
.ball-wrapper {
  position: absolute;
  animation: move linear infinite;
  filter: blur(50px);
  opacity: 0.2;
  z-index: 4000;
  border-radius: 50%;
}

.ball-wrapper:nth-child(1) {
  top: 77%;
  left: 88%;
  animation-duration: 40s;
  animation-delay: -3s;
  transform-origin: 16vw -2vh;
  background: #dd2f30;
}
.ball-wrapper:nth-child(2) {
  top: 42%;
  left: 2%;
  animation-duration: 53s;
  animation-delay: -29s;
  transform-origin: -19vw 21vh;
  background: #7f39a9;
}
.ball-wrapper:nth-child(3) {
  top: 28%;
  left: 18%;
  animation-duration: 49s;
  animation-delay: -8s;
  transform-origin: -22vw 3vh;
  background: #dd2f30;
}
.ball-wrapper:nth-child(4) {
  top: 50%;
  left: 79%;
  animation-duration: 26s;
  animation-delay: -21s;
  transform-origin: -17vw -6vh;
  background: #7f39a9;
}
.ball-wrapper:nth-child(5) {
  top: 46%;
  left: 15%;
  animation-duration: 36s;
  animation-delay: -40s;
  transform-origin: 4vw 0vh;
  background: #dd2f30;
}
.ball-wrapper:nth-child(6) {
  top: 77%;
  left: 16%;
  animation-duration: 31s;
  animation-delay: -10s;
  transform-origin: 18vw 4vh;
  background: #7f39a9;
}
.ball-wrapper:nth-child(7) {
  top: 22%;
  left: 17%;
  animation-duration: 55s;
  animation-delay: -6s;
  transform-origin: 1vw -23vh;
  background: #dd2f30;
}
.ball-wrapper:nth-child(8) {
  top: 41%;
  left: 47%;
  animation-duration: 43s;
  animation-delay: -28s;
  transform-origin: 25vw -3vh;
  background: #7f39a9;
}

.ball {
  width: 200px;
  height: 200px;
  filter: blur(50px);
  opacity: 0.2;
}

.background {
  position: relative;
  overflow: hidden;

  /* background: linear-gradient(to bottom, #251c2a 0%, #271a1a 100%); */
}
@keyframes move {
  100% {
    transform: translate3d(0, 0, 1px) rotate(360deg);
  }
}
</style>

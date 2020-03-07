
<style>
    .wrapper {
    position: absolute;
    bottom: 0;
    top: 0;
    left: 0;
    right: 0;
    position: fixed;
    width: 100%;
    height: 100%;
    margin: 0 auto;
    overflow: hidden;
    z-index: 99999;
    background: #000000cf;
    background-blend-mode: overlay;
    z-index: 999999999999999999999;
}

    .loader {
        position: absolute;
        width: 100px;
        height: 100px;
        -o-border-radius: 50%;
        -ms-border-radius: 50%;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -webkit-perspective: 780px;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
}

.loader-inner {
    position: absolute;
    width: 100%;
    height: 100%;
    box-sizing: border-box;
    -o-box-sizing: border-box;
    -ms-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    border-radius: 50%;
    -o-border-radius: 50%;
    -ms-border-radius: 50%;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
}
.loader-inner.box1{
    left: 0%;
    top: 0%;
    animation: cssload-rotate-one 1.15s linear infinite;
    -o-animation: cssload-rotate-one 1.15s linear infinite;
    -ms-animation: cssload-rotate-one 1.15s linear infinite;
    -webkit-animation: cssload-rotate-one 1.15s linear infinite;
    -moz-animation: cssload-rotate-one 1.15s linear infinite;
    border-bottom: 7px solid #fff;
}
.loader-inner.box2{
    right: 0%;
    top: 0%;
    animation: cssload-rotate-two 1.15s linear infinite;
    -o-animation: cssload-rotate-two 1.15s linear infinite;
    -ms-animation: cssload-rotate-two 1.15s linear infinite;
    -webkit-animation: cssload-rotate-two 1.15s linear infinite;
    -moz-animation: cssload-rotate-two 1.15s linear infinite;
    border-right: 7px solid #fff;
}
.loader-inner.box3{
    right: 0%;
    bottom: 0%;
    animation: cssload-rotate-three 1.15s linear infinite;
    -o-animation: cssload-rotate-three 1.15s linear infinite;
    -ms-animation: cssload-rotate-three 1.15s linear infinite;
    -webkit-animation: cssload-rotate-three 1.15s linear infinite;
    -moz-animation: cssload-rotate-three 1.15s linear infinite;
    border-top: 7px solid #fff;
}
@keyframes cssload-rotate-one {
    0% {
        -webkit-transform: rotateX(35deg) rotateY(-45deg) rotateZ(0deg);
        transform: rotateX(35deg) rotateY(-45deg) rotateZ(0deg);
    }
    100% {
        -webkit-transform: rotateX(35deg) rotateY(-45deg) rotateZ(360deg);
        transform: rotateX(35deg) rotateY(-45deg) rotateZ(360deg);
    }
}
@-webkit-keyframes cssload-rotate-one {
    0% {
        -webkit-transform: rotateX(35deg) rotateY(-45deg) rotateZ(0deg);
    }
    100% {
        -webkit-transform: rotateX(35deg) rotateY(-45deg) rotateZ(360deg);
    }
}
@keyframes cssload-rotate-two {
    0% {
        -webkit-transform: rotateX(50deg) rotateY(10deg) rotateZ(0deg);
        transform: rotateX(50deg) rotateY(10deg) rotateZ(0deg);
    }
    100% {
        -webkit-transform: rotateX(50deg) rotateY(10deg) rotateZ(360deg);
        transform: rotateX(50deg) rotateY(10deg) rotateZ(360deg);
    }
}
@-webkit-keyframes cssload-rotate-two {
    0% {
        -webkit-transform: rotateX(50deg) rotateY(10deg) rotateZ(0deg);
    }
    100% {
        -webkit-transform: rotateX(50deg) rotateY(10deg) rotateZ(360deg);
    }
}
@keyframes cssload-rotate-three {
    0% {
        -webkit-transform: rotateX(35deg) rotateY(55deg) rotateZ(0deg);
        transform: rotateX(35deg) rotateY(55deg) rotateZ(0deg);
    }
    100% {
        -webkit-transform: rotateX(35deg) rotateY(55deg) rotateZ(360deg);
        transform: rotateX(35deg) rotateY(55deg) rotateZ(360deg);
    }
}
@-webkit-keyframes cssload-rotate-three {
    0% {
        -webkit-transform: rotateX(35deg) rotateY(55deg) rotateZ(0deg);
    }
    100% {
        -webkit-transform: rotateX(35deg) rotateY(55deg) rotateZ(360deg);
    }
}

</style>

<div class="wrapper">
    <div class="loader">
        <div class="loader-inner box1"></div>
        <div class="loader-inner box2"></div>
        <div class="loader-inner box3"></div>
    </div>
</div>
<!-- eslint-disable -->
<template>

    <!--
        documentation can be found here : https://loading.io/css
    -->

    <div class="lds-ring">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>

</template>

<!-- eslint-disable -->
<script>

    export default {
        name: "RingSpinner",
        components: {

            // ...

        },
        created() {

            // ...

        },
        mounted() {

            // ...

        },
        data() {
            return {

                //...

            }
        },
        computed: {

            // ...

        },
        methods: {

            // ...

        }
    }

</script>

<!-- eslint-disable -->
<style lang="scss" scoped>

    .lds-ring {
        display: inline-block;
        position: relative;
        width: 19px;
        height: 19px;
        z-index: 10;
    }
    .lds-ring div {
        box-sizing: border-box;
        display: block;
        position: absolute;
        width: 19px;
        height: 19px;
        //margin: 4px;
        border: 3px solid #FFF;
        border-radius: 50%;
        animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
        border-color: #FFF transparent transparent transparent;
    }
    .lds-ring div:nth-child(1) {
        animation-delay: -0.45s;
    }
    .lds-ring div:nth-child(2) {
        animation-delay: -0.3s;
    }
    .lds-ring div:nth-child(3) {
        animation-delay: -0.15s;
    }
    @keyframes lds-ring {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

</style>
<!-- eslint-disable -->
<template>

    <!--
        documentation can be found here : https://loading.io/css
    -->

    <div class="lds-ripple">
        <div></div>
        <div></div>
    </div>

</template>

<!-- eslint-disable -->
<script>

    export default {
        name: "RippleSpinner",
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

    .lds-ripple {
        display: inline-block;
        position: relative;
        width: 19px;
        height: 19px;
    }
    .lds-ripple div {
        position: absolute;
        border: 2px solid #fff;
        opacity: 1;
        border-radius: 50%;
        animation: lds-ripple 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;
    }
    .lds-ripple div:nth-child(2) {
        animation-delay: -0.5s;
    }
    @keyframes lds-ripple {
        0% {
            top: 9px;
            left: 9px;
            width: 0;
            height: 0;
            opacity: 1;
        }
        100% {
            top: 0;
            left: 0;
            width: 19px;
            height: 19px;
            opacity: 0;
        }
    }

</style>
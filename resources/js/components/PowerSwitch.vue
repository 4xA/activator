<template>
    <div class="uk-width-1-2">
        <img id="switch-image-0" :src="offImage" alt="switch off" v-if="!on">
        <img id="switch-image-1" :src="onImage" alt="switch on" v-if="on">
    </div>
</template>

<script>
    export default {
        props: {
            offImage: String,
            onImage: String,
            initial: Boolean
        },
        data () {
            return {
                on: this.initial
            };
        },
        mounted () {
            let component = this;
            this.$root.$on('power_switch_message', (toggle, value) => {
                this.on = value;
            });
        }
    };
</script>

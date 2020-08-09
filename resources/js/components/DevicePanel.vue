<template>
    <vk-card class="activator-panel">
        <div class="inner-panel uk-panel uk-panel-box uk-height-1-1">
            <h3 class="uk-panel-title uk-text-uppercase">{{ name }}</h3>
            <h5 class="uk-panel-subtitle">> {{ type }}</h5>
            <hr>
            <div v-for="(value, toggle) in togglesArray" v-bind:key="toggle">
                <label>{{ toggle }}</label>
                <input :name="toggle" class="uk-checkbox" type="checkbox" @change="emitToggle(toggle)" v-model="togglesArray[toggle]">
            </div>
            <slot></slot>
        </div>
    </vk-card>
</template>

<script>
    export default {
        props: {
            name: String,
            type: String,
            toggles: String,
            url: String
        },
        data () {
            return {
                togglesArray: JSON.parse(this.toggles)
            }
        },
        methods: {
            emitToggle (toggle) {
                if (toggle === 'power_switch') {
                    this.$root.$emit('power_switch_message', toggle, this.togglesArray[toggle], this.togglesArray);
                }
                let filteredArray = {};
                for (const prop in this.togglesArray) {
                    filteredArray[prop] = this.togglesArray[prop] ? 'on' : 'off';
                }
                axios.post(this.url, {
                    toggles: filteredArray
                })
                .then(response => {
                })
                .catch(error => {
                });
            }
        }
    }
</script>

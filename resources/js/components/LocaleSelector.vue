<template>
    <vk-grid>
        <label for="locale" class="uk-width-1-6">change locale</label>
        <div class="uk-form-controls uk-width-1-6">
            <select name="locale" id="local-selector" class="uk-select" @change="changeLocale" v-if="!showSpinner" v-model="locale">
                <option v-for="locale in localesArray" :value="locale">{{ locale }}</option>
            </select>
            <span id="locale-spinner" class="uk-hidden"><i class="uk-icon-spinner uk-icon-spin"></i></span>
            <vk-spinner v-if="showSpinner"></vk-spinner>
        </div>
    </vk-grid>
</template>

<script>
    export default {
        props: {
            locales: String,
            current: String,
            url: String
        },
        data () {
            return {
                locale: this.current,
                localesArray: JSON.parse(this.locales),
                showSpinner: false
            };
        },
        methods: {
            changeLocale () {
                this.showSpinner = true;
                axios.post(this.url, {
                    locale: this.locale
                })
                .then(response => {
                    this.showSpinner = false;
                })
                .catch(error => {
                });
            }
        }
    };
</script>

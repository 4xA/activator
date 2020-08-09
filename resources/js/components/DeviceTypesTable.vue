<template>
    <vk-table :data="data" narrowed>
        <vk-table-column title="Device Type" cell="name"></vk-table-column>
        <vk-table-column title="Action" cell="action">
            <div slot-scope="{ cell }">
                <a class="uk-button uk-button-primary uk-text-uppercase uk-button-small" :href="'/devices/types/' + cell + '/edit'">update</a>
            </div>
        </vk-table-column>
    </vk-table>
</template>

<script>
    import { Table } from 'vuikit/lib/table';

    export default {
        components: {
            'vk-table': Table
        },
        data () {
            return {
                data: [
                ]
            }
        },
        created() {
            axios.get('/devices/types/table.json')
                .then(({data}) => {
                    data.forEach(object => {
                        object.action = object.name;
                    });
                    this.data = data;
                });
        }
    }
</script>

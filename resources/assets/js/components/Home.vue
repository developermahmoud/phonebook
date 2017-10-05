<template>
    <div>
        <nav class="panel column is-offset-2 is-8">
            <p class="panel-heading">
                VueJs Phonebook
                <button class="button is-primary is-outlined" @click="openAdd">
                Add new
                </button>
            </p>
            <div class="panel-block">
                <p class="control has-icons-left">
                    <input class="input is-small" type="text" placeholder="search">
                    <span class="icon is-small is-left">
                        <i class="fa fa-search"></i>
                    </span>
                </p>
            </div>
            <a class="panel-block" v-for="item,key in lists">
                <div class="column is-9" v-text="item.name"></div>
                <span class="panel-icon column is-1">
                    <i class="has-text-danger fa fa-trash"></i>
                </span>
                <span class="panel-icon column is-1">
                    <i class="has-text-info fa fa-edit"></i>
                </span>
                <span class="panel-icon column is-1">
                    <i class="has-text-primary fa fa-eye" @click="openShow(key)"></i>
                </span>
            </a>
        </nav>
        <Add :openmodel="addActive" @closeRequest='close'></Add>
        <Show :openmodel="showActive" @closeRequest='close'></Show>
    </div>
</template>

<script>
let Add = require('./Add.vue')
let Show = require('./Show.vue')
export default {
    components:{Add,Show},
    data() {
        return {
            addActive: '',
            showActive: '',
            lists: [],
            errors: {}
        }
    },
    mounted() {
        axios.get('/getData')
        .then(response=> this.lists = response.data)
        .catch(error=> this.errors = error.response.data.errors)
    },
    methods: {
        openAdd: function () {
            this.addActive = 'is-active';
        },
        close() {
            this.addActive = '';
            this.showActive = '';
        },
        openShow(key) {
            this.$children[1].list = this.lists[key];
            this.showActive = 'is-active';
        }
    }
}
</script>

<style lang="css">
</style>

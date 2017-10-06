<template>
    <div>
        <nav class="panel column is-offset-2 is-8">
            <p class="panel-heading">
                VueJs Phonebook
                <button class="button is-primary is-outlined" @click="openAdd">
                Add new
                </button>
                <span class="is-pulled-right" v-if="loading">
                    <i class="fa fa-refresh fa-spin fa-2x fa-fw"></i>
                </span>

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
                    <i class="has-text-danger fa fa-trash" @click="del(key,item.id)"></i>
                </span>
                <span class="panel-icon column is-1">
                    <i class="has-text-info fa fa-edit" @click="openUpdate(key)"></i>
                </span>
                <span class="panel-icon column is-1">
                    <i class="has-text-primary fa fa-eye" @click="openShow(key)"></i>
                </span>
            </a>
        </nav>
        <Add :openmodel="addActive" @closeRequest='close'></Add>
        <Show :openmodel="showActive" @closeRequest='close'></Show>
        <Update :openmodel="updateActive" @closeRequest='close'></Update>
    </div>
</template>

<script>
let Add = require('./Add.vue')
let Show = require('./Show.vue')
let Update = require('./Update.vue')
export default {
    components:{Add,Show,Update},
    data() {
        return {
            addActive: '',
            showActive: '',
            updateActive: '',
            lists: [],
            errors: {},
            loading: false
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
        openShow(key) {
            this.$children[1].list = this.lists[key];
            this.showActive = 'is-active';
        },
        openUpdate(key) {
            this.$children[2].list = this.lists[key];
            this.updateActive = 'is-active';
        },
        del(key, id) {
            this.loading = !this.loading;
            if( confirm("Are You Sure?") ) {
                axios.delete(`/phonebook/${id}`)
                .then(response=> {
                    this.lists.splice(key, 1);
                    this.loading = !this.loading;
                })
            }

        },
        close() {
            this.addActive = this.showActive = this.updateActive =  '';
        },
    }
}
</script>

<style lang="css">
</style>

<template>
    <div class="modal" :class="openmodel">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Modal title</p>
                <button class="delete" aria-label="close" @click="close"></button>
            </header>
            <section class="modal-card-body">
                <form>
                    <div class="field">
                        <label class="label">Name</label>
                        <div class="control">
                            <input class="input" type="text" v-model="list.name" placeholder="Name">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Phone</label>
                        <div class="control">
                            <input class="input" type="number" v-model="list.phone" placeholder="Phone number">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Email</label>
                        <div class="control">
                            <input class="input" type="email" v-model="list.email" placeholder="Email">
                        </div>
                    </div>

                </form>
            </section>
            <footer class="modal-card-foot">
                <button class="button is-success" @click="save">Save changes</button>
                <button class="button" @click="close">Cancel</button>
            </footer>
        </div>
    </div>
</template>

<script>
export default {
    props:['openmodel'],
    data() {
        return {
            list: {
                name: '',
                phone: '',
                email: ''
            }
        }
    },
    methods: {
        close: function() {
            this.$emit('closeRequest');
        },
        save() {
            axios.post('/phonebook', this.list)
            .then(response=> {
                this.close();
            })
            .catch(error=> {
                console.log(error);
            })
        }
    }
}
</script>

<style lang="css">
</style>

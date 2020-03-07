<template>
    <div>
    <form class="flex flex-col align-right" v-if="!saved">
        <span v-if="errors.message">{{ errors.message[0] }}</span>
        <label for="email" class="flex justify-end">
            <span class="my-auto">URL</span>
                <input class="w-3/4 ml-3 py-2 px-5 shadow-inner md:rounded text-gray-800" v-model="url" type="text" name="url" placeholder="https://google.com/page">
        </label>
        <span class="text-xs text-red-400 text-right mt-3" v-for="error in errors.url">{{ error }}</span>
        <label for="email" class="flex justify-end mt-3">
            <span class="my-auto">E-mail</span>
            <input class="w-3/4 ml-3 py-2 px-5 md:rounded shadow-inner text-gray-800" v-model="email" type="text" name="email" placeholder="technical@company.com">
        </label>
        <span class="text-xs text-red-400 text-right mt-3" v-for="error in errors.email">{{ error }}</span>

        <label for="subscribe" class="flex justify-end my-auto mt-3">
            <div class="w-3/4 ml-3 text-xs flex justify-end">
                <span class="pr-4 my-auto">I would like to be notified about other similar upcoming products</span>
                <input class="h-6 w-6 bg-white md:rounded-lg cursor-pointer" type="checkbox" name="updates" v-model="updates">
            </div>
        </label>
        <input v-if="!saving" class="font-display border border-indigo-600 inner-shadow md:w-1/3 mr-0 ml-auto bg-indigo-200 hover:bg-indigo-300 cursor-pointer text-indigo-900 md:rounded py-3 px-5 mt-3" type="submit" v-on:click.prevent="save" value="Analyse">
        <button v-if="saving" disabled class="font-display border border-indigo-600 inner-shadow md:w-1/3 mr-0 ml-auto bg-indigo-300 cursor-pointer text-indigo-900 md:rounded py-3 px-5 mt-3" type="submit" v-on:click.prevent="save">
            <img src="/images/loader.gif" class="mx-auto">
        </button>
    </form>

    <div v-if="saved" class="flex justify-between">
        <span class="text-center">
        <i class="far fa-thumbs-up text-3xl my-auto"></i>
        <strong>Thanks!</strong>
        </span>
        <span class="ml-5">We've sent you a confirmation e-mail, once that's been confirmed, you'll start getting your daily updates straight away</span>
    </div>
    </div>
</template>
<script>
    export default {
        data: function() {
            return {
                url: null,
                saved: false,
                saving: false,
                email: null,
                updates: false,
                errors: {
                    message: null,
                    url: null,
                    email: null
                }
            }
        },
        methods: {
            reset: function() {
                this.url = null;
                this.urlValidated = false;
                this.urlValidating = false;
                this.saved = false;
                this.saving = false;
                this.email = null;
                this.updates = false;
                this.state = 1;
                this.errors = {
                    message: null,
                    url: null,
                    email: null
                };
            },
            save: function () {
                this.saving = true;
                axios.post('/pagespeed', {
                    email: this.email,
                    url: this.url,
                    updates: this.updates
                }).then(response => {
                    this.saving = false;
                    this.saved = true;
                }, err => {
                    this.saving = false;
                    if (err.response.data.errors) {
                        this.errors = err.response.data.errors;
                    } else {
                        this.errors.message = [err.response.data.message];
                    }
                })
            }
        },
        mounted() {
        }
    }
</script>

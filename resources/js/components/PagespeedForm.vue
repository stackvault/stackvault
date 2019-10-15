<template>
    <form method="post">
        <div v-show="!urlValidated" class="flex flex-wrap flex-inline justify-center">
                <input v-model="url" class="block rounded px-3 py-1 text-gray-800" type="text" name="url" placeholder="https://mysite.com"/>
            <input type="submit" v-on:click.prevent="validate" v-show="!urlValidating" class="ml-1 bg-blue-500 px-3 py-1 font-display text-gray-200 rounded hover:bg-blue-400"/>
            <img class="h-12 w-12" v-show="urlValidating" src="/images/loader.gif" alt="Processing"/>

        </div>
        <div v-show="urlValidated">
            <div class="text-center">Great news, we can connect to <span class="font-bold">{{ url }}</span> fine!</div>
            <div class="flex flex-wrap flex-inline justify-center flex-wrap">
                <input v-model="email" class="block rounded px-3 py-1 text-gray-800" type="text" name="email" placeholder="email@address.com"/>
                <label for="updates" v-show="urlValidated" class="text-xs">I'd like to occasionally receive updates about this and future products
                    <input v-model="updates" type="checkbox" id="updates" name="updates">
                </label>
            </div>
            <div class="flex justify-center">
                <input type="submit" v-on:click.prevent="submit" class="ml-1 bg-blue-500 px-3 py-1 font-display text-gray-200 rounded hover:bg-blue-400"/>
            </div>
        </div>
        <div v-show="saving" class="flex flex-inline justify-center">
            <img  class="h-12 w-12" src="/images/loader.gif" alt="Processing"/>
        </div>
        <div v-show="saved" class="flex flex-inline justify-center">
            Awesome! You'll now receive daily updates about your site!
            <button v-on:click="reset" class="ml-1 bg-blue-500 px-3 py-1 font-display text-gray-200 rounded hover:bg-blue-400">Add another?</button>
        </div>
    </form>
</template>
<script>
    export default {
        data: function() {
            return {
                url: null,
                urlValidated: false,
                urlValidating: false,
                saved: false,
                saving: false,
                email: null,
                updates: false
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
            },
            validate: function () {
                this.urlValidating = true;
                axios.post('/pagespeed/validate/', {
                    url: this.url
                }).then(response => {
                    if(response.data.http_code === 200) {
                        this.urlValidated = true;
                    } else {
                        // Notify about error
                    }
                    this.urlValidating = false;
                });
            },
            submit: function () {
                this.saving = true;
                axios.post('/pagespeed', {
                    email: this.email,
                    url: this.url,
                    updates: this.updates
                }).then(response => {
                    this.saving = false;
                    if(response.status === 200) {
                        this.saved = true;
                    } else {
                        //ToDo: error
                    }
                })
            }
        },
        mounted() {
        }
    }
</script>
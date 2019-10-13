<template>
    <form method="post">
        <div v-show="!urlValidated" class="flex flex-inline justify-center">
                <input v-model="url" class="block rounded px-3 py-1 text-gray-800" type="text" name="url" placeholder="https://mysite.com"/>
            <input type="submit" v-on:click.prevent="validate" v-show="urlValidated==false && urlValidating==false" class="ml-1 bg-blue-500 px-3 py-1 font-display text-gray-200 rounded hover:bg-blue-400"/>
        </div>
        <div v-show="urlValidated" class="flex flex-inline justify-center">
            <div>
                Great news, we can connect to <span class="font-bold">{{ url }}</span> fine!
                <input v-model="email" class="block rounded px-3 py-1 text-gray-800" type="text" name="email" placeholder="https://mysite.com"/>
                <label for="updates" v-show="urlValidated" class="text-xs">I'd like to occasionally receive updates about this and future products
                    <input v-model="updates" type="checkbox" id="updates" name="updates">
                </label>
            </div>
            <input type="submit" v-on:click.prevent="validate" v-show="urlValidated==false && urlValidating==false" class="ml-1 bg-blue-500 px-3 py-1 font-display text-gray-200 rounded hover:bg-blue-400"/>
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
                email: null,
                updates: false
            }
        },
        methods: {
            validate: function () {
                this.urlValidating = true;
                axios.post('/pagespeed/validate/', {
                    url: this.url
                }).then(response => {
                    if(response.http_code === 200) {
                        this.urlValidated = true;
                    } else {
                        // Notify about error
                    }
                    this.urlValidating = false;
                });
            },
        },
        mounted() {
        }
    }
</script>
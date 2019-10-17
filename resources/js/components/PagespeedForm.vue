<template>
    <form method="post">
        <div v-show="state==1" class="flex flex-wrap flex-inline justify-center">
            <div class="block w-full text-center font-display mb-2">What URL would you like us to check?</div>
            <div class="flex w-full md:w-3/4 lg:w-1/3 justify-center">
                <input v-model="url" class="h-10 rounded px-3 py-1 text-gray-800 flex-1" type="text" name="url" placeholder="https://mysite.com"/>
                <div class="flex-shrink-0">
                    <input type="submit" value="Check" v-on:click.prevent="submit" v-show="!urlValidating" class="h-10 ml-1 bg-blue-500 px-3 py-1 font-display text-gray-200 rounded hover:bg-blue-400"/>
                    <img class="h-12 w-12" v-show="urlValidating" src="/images/loader.gif" alt="Processing"/>
                </div>
            </div>
        </div>
        <div v-show="state==2" class="flex flex-wrap flex-inline justify-center">
            <div class="block w-full text-center text-green-400 font-display mb-2"><span class="font-bold mr-2">Great news!</span> We can connect to <span class="font-bold">{{ url }}</span> fine!</div>
            <div class="block w-full text-center text-gray-200 font-display mb-2">Now we just need the e-mail you'd like to receive your stats</div>
            <div class="flex w-full md:w-3/4 lg:w-1/3 justify-center">
                <input v-model="email" class="h-10 rounded px-3 py-1 text-gray-800 flex-1" type="email" name="email" placeholder="email@address.com"/>
                <div class="flex-shrink-0">
                    <input v-show="!saving" type="submit" value="Send" v-on:click.prevent="submit" class="h-10 ml-1 bg-blue-500 px-3 py-1 font-display text-gray-200 rounded hover:bg-blue-400"/>
                    <img  v-show="saving" class="h-12 w-12" src="/images/loader.gif" alt="Processing"/>
                </div>
            </div>
            <div class="flex w-full justify-center mt-2">
                <label for="updates" class="mt-2 text-sm font-display toggle">
                    <input v-model="updates" class="toggle__input" type="checkbox" id="updates" name="updates">
                    <span class="toggle__label ml-2"><span class="toggle__text">I'd love to be updated about this and future products</span></span>
                </label>
            </div>
        </div>
        <div v-show="state==3">
            <div class=" w-full justify-center">
                <div class="font-display text-center w-full">Did you forget to tick the box about updates?</div>
                <div class="flex justify-center mt-4">
                    <button v-on:click.prevent="updates=true; next()" class="ml-1 bg-blue-500 px-3 py-1 font-display text-gray-200 rounded hover:bg-blue-400">Oh I missed that, I do want updates!</button>
                    <button v-on:click.prevent="updates=false; next()" class="ml-1 bg-red-500 px-3 py-1 font-display text-gray-200 rounded hover:bg-red-400">No, stop bothering me</button>
                </div>
            </div>
        </div>
        <div v-show="state==4">
            <div class="flex flex-no-wrap justify-center">
                <div class="text-center text-green-400 font-display">Awesome! Now all you need to do is confirm your e-mail</div>
            </div>
            <div class="flex justify-center mt-4">
                <button v-on:click.prevent="reset" class="ml-1 bg-blue-500 px-3 py-1 font-display text-gray-200 rounded hover:bg-blue-400">Add another?</button>
            </div>
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
                updates: false,
                state: 1
            }
        },
        methods: {
            next: function() {
                this.state++;
            },
            back: function() {
                this.state--;
            },
            reset: function() {
                this.url = null;
                this.urlValidated = false;
                this.urlValidating = false;
                this.saved = false;
                this.saving = false;
                this.email = null;
                this.updates = false;
                this.state = 1;
            },
            submit: function () {
                if (this.urlValidated) {
                    this.save();
                } else {
                    this.validate();
                }
            },
            validate: function () {
            // TODO: Complain if no protocol - we can't determine http:// or https:/ for them
                this.urlValidating = true;
                axios.post('/pagespeed/validate/', {
                    url: this.url
                }).then(response => {
                    if(response.data.http_code === 200) {
                        this.urlValidated = true;
                        this.next();
                    } else {
                        // Notify about error
                    }
                    this.urlValidating = false;
                });
            },
            save: function () {
                this.saving = true;
                axios.post('/pagespeed', {
                    email: this.email,
                    url: this.url,
                    updates: this.updates
                }).then(response => {
                    this.saving = false;
                    if(response.status === 200) {
                        if (this.updates === true) {
                            // If they already chose to receive updates, skip the 2nd optin
                            // ToDo: Don't call next as we don't want this state in history (when we add that?)
                            this.state++;
                        }
                        this.next();

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

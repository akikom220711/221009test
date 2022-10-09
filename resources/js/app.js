/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const { default: axios } = require('axios');

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
//import axios from 'axios';

const app = new Vue({
    el: '#app',
    data: {
        message_name: '',
        message_email: '',
        message_postcode: '',
        message_address: '',
        message_opinion: '',
        fname_v: '',
        lname_v: '',
        email_v: '',
        postcode_v: '',
        address_v: '',
        opinion_v: '',
        post_flag: true,
        post_error: false
    },
    methods: {
        addMessageName: function () {
            if (!this.lname_v || !this.fname_v) {
                this.message_name = 'The name field is required.';
            } else { 
                this.message_name = '';
            }
        },
        addMessageEmail: function () {
            const reg = new RegExp(/^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}\.[A-Za-z0-9]{1,}$/);
            if (!this.email_v) {
                this.message_email = 'The email field is required.';
            } else if (!reg.test(this.email_v)) { 
                this.message_email = 'The email must be a valid email address.';
            } else { 
                this.message_email = '';
            }
        },
        addMessagePostcode: function () {
            if (!this.postcode_v) {
                this.message_postcode = 'The postcode field is required.';
            } else if (this.postcode_v.length != 8) { 
                this.message_postcode = 'The postcode must be 8 characters.';
            } else { 
                this.message_postcode = '';
            }
        },
        addMessageAddress: function () {
            if (!this.address_v) {
                this.message_address = 'The address field is required.';
            } else { 
                this.message_address = '';
            }
        },
        addMessageOpinion: function () {
            if (!this.opinion_v) {
                this.message_opinion = 'The opinion field is required.';
            } else if (this.opinion_v.length >= 121) { 
                this.message_opinion = 'The opinion must not be greater than 120 characters.';
            } else { 
                this.message_opinion = '';
            }
        },
        getAddress: function () { 
            this.post_flag = false;
            let zip = this.postcode_v.replace("-", ""); 

            axios.get("https://zipcloud.ibsnet.co.jp/api/search?zipcode=" + zip)
                .then(response => this.address_v = response.data.results[0].address1 + response.data.results[0].address2 + response.data.results[0].address3)
                .catch(error => {
                    console.log(error)
                    this.post_error = true
                    if (this.post_error) { 
                        this.address_v = '';
                    }
                })
        }
    },
    mounted: function () {
        const targetElement = this.$el;
        this.$el.style.display='flex'; 
    },
});

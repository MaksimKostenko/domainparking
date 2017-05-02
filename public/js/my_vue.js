class Errors {

    constructor(){
        this.errors ={};
    }

    get(field){
        if(this.errors[field]){
            return this.errors[field][0];
        }
    }

    has(field){
        return this.errors.hasOwnProperty(field);
    }

    any(){
        return Object.keys(this.errors).length > 0;
    }

    record(errors){
        this.errors = errors;
    }

    clear(field){
        delete this.errors[field];
    }
}

Vue.component('modal_form',{

    data: function (){
        return {
            name: '',
            surname: '',
            email: '',
            price: '',
            errors: new Errors(),
            showSuccessMessage: false
        };
    },

    methods: {
        onSubmit(){
            axios.post('/', this.$data)
                .then(this.onSuccess)
                .catch(error => this.errors.record(error.response.data));
        },

        onSuccess(response){
            //alert(response.data);
            this.name = '';
            this.surname = '';
            this.email = '';
            this.price = '';
            this.showSuccessMessage = true;
        }

    },
    template: `
        <div>
        <div class="form_window" id="form_window" @submit.prevent="onSubmit" @keydown="errors.clear($event.target.name)">
            <div class="success_mask" v-if="showSuccessMessage"></div>
            <success_message v-if="showSuccessMessage"><button class="close_icon" @click="showSuccessMessage = false">&#10006</button></success_message>
            <slot></slot>
            <h1 class="form_title">Contact us</h1>
            <hr><br>
            <form method="POST" id="form" action="/index">

                <input type="text" placeholder="First Name" id="name" name="name" v-model="name" ><br>
                <span class="error" v-if="errors.has('name')" v-text="this.errors.get('name')"></span><br>
                
                <input type="text" placeholder="Last Name" id="surname" name="surname" v-model="surname"><br>
                <span class="error" v-if="errors.has('surname')" v-text="this.errors.get('surname')"></span><br>
                
                <input type="text" placeholder="E-mail" id="email" name="email" v-model="email"><br>
                <span class="error" v-if="errors.has('email')" v-text="this.errors.get('email')"></span><br>
                
                <input type="text" placeholder="Price in USD" id="price" name="price" v-model="price"><br>
                <span class="error" v-if="errors.has('price')" v-text="this.errors.get('price')"></span><br>

                <input class="send_button" type="submit"  name="submit_button"  id="submit_button" value="send" :disabled="errors.any()">
             </form>
         </div>
         </div>`
});

Vue.component('success_message',{
    template: ` 
        <div class="success">
            <slot></slot>
            <h1>Your request has been sent</h1>   
            <h2>we will contact you</h2>
        </div>
    `
});

new Vue({
    el: '#window',

    data: {
        showModal:false,
    },

});

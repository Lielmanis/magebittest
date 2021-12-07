var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            var coRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.co)+$/;
            const app = Vue.createApp({
                data: function() {
                    return {
                        email: '',
                        reqError: false,
                        regexError: false,
                        coRegexError: false,
                        checkError: false,
                        checked: true,
                        errVisible: false,
                        coErrVisible: false,
                        isError: false,
                        buttonDisable: false,
                        contentDisplay: false,
                        success: false,
                        onSuccess: false
                    }
                },
                methods: {
                    buttonClick() {
                        if(this.email === ''){
                            this.reqError = true,
                            this.isError = true,
                            this.buttonDisable = true
                        }
                        else if(!regex.test(this.email)){
                            this.regexError = true,
                            this.isError = true,
                            this.buttonDisable = true
                        }
                        else if(coRegex.test(this.email)){
                            this.coRegexError = true,
                            this.isError = true,
                            this.buttonDisable = true
                        }

                        if(!this.checked){
                            this.checkError = true,
                            this.isError = true,
                            this.buttonDisable = true
                            if(this.reqError || this.regexError){
                                this.errVisible = true
                            }
                            else if(this.coRegexError){
                                this.coErrVisible = true
                            }
                        }

                        if(!this.reqError && !this.checkError && !this.regexError && !this.coRegexError){
                            axios.post('controller/test.php', {
                                email: this.email
                            });
                            this.contentDisplay = true,
                            this.success = true,
                            this.onSuccess = true
                        }
                    },
                    emailValid(){
                        if(this.reqError){
                            if(this.email !== ''){
                                this.reqError = false
                                if(this.checked){
                                    this.isError = false,
                                    this.buttonDisable = false
                                }
                            }
                        }
                        else if(this.regexError){
                            if(regex.test(this.email)){
                                this.regexError = false
                                if(this.checked){
                                    this.isError = false,
                                    this.buttonDisable = false
                                }  
                            }      
                        }
                        else if(this.coRegexError){
                            if(!coRegex.test(this.email)){
                                this.coRegexError = false
                                if(this.checked){
                                    this.isError = false,
                                    this.buttonDisable = false
                                }
                            }
                        }
                    },
                    checkbox(){
                        if(this.checked){
                            this.checkError = false
                            if(!(this.reqError || this.regexError || this.coRegexError)){
                                this.isError = false,
                                this.buttonDisable = false
                            }
                        }                        
                    }
                }
            })

            app.component('error', {
                props: ['err'],
                template: '<p class="error">{{ err }}</p>'
            })

            app.component('success', {
                template: `
                    <div class="success">
                        <img src="app/icons/ic_success.png" alt="trophy"/>
                        <h1>Thanks for subscribing!</h1>
                        <p>You have successfully subscribed to our email listing. Check your email for the discount code.</p>
                    </div>`
            })

            app.mount('#app')
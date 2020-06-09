<template>
    <div class="user-log">
        <li v-for="user in users" :user="user"  v-bind:key="user.id" @click="activateUser(user)" :id="user.id">
            {{ user.name }}
        </li>
        <li v-show="users.length === 0" disabled>No friends found</li>
    </div>
</template>

<script>
    export default {
        methods:{
            activateUser (selectedUser) {
                this.$emit('getcurrentuser',{
                    userId:selectedUser.id
                });
                // post this user id and selectedUser id for conversation table
                let usdata = {user_one:parseInt(this.uid)};
                axios.post(this.url+'/conversation/'+selectedUser.id,usdata).then( response=>{ 
                        console.log("The ID for this private chat is : ", response.data.id); 
                    });
                // show footer div for sure! maybe it's hidden by us ;-)
                $(".footer").show();
                // show chat conversation
                $(".activate-chat").show();
                $(".chat-info").hide();
                // hiding the chat composer process
                for(var i = 0; i < this.offusers.length; i++){
                    // we know that user_one id is this.uid so for sure if user_two was selectedUser then we'll hide the chatComposer
                    if(this.offusers[i].user_one == this.uid && this.offusers[i].user_two == selectedUser.id){
                        $(".footer").hide();
                        break; 
                    } else{ break; }
                }
                // to make clicked li active
                $(".user-log .active").removeClass("active");
                $("#"+selectedUser.id).addClass("active");
            }
        },

        data() {
            return {
                default_image:$("#default_image").val(),
                users:[],
                offusers:[],
                uid:$("#authId").val(),
                // ust:$("#authStatus").val(),
                url:$("#base_url").val()
            }
        },

        mounted() {
            // get users lists in left sidebar
            axios.get(this.url+'/users').then( response=> {
                this.users = response.data;
            });

           // get off users from conversation table
            axios.get(this.url+'/offusers').then( response=> {
                this.offusers = response.data;
                // console.log(this.offusers);
            });
        }
    }
</script>

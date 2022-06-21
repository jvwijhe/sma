<template>
    <div class="relative z-50">
        <div v-if="locked" class="fixed top-0 left-0 flex w-screen h-screen p-12 bg-black bg-opacity-50">
            <div class="p-12 m-auto bg-white rounded">
                <h3 class="mb-3 text-2xl font-semibold">This message is locked</h3>
                <p class="text-gray-500">Please enter your password to unlock this message</p>
            <form  @submit.prevent="onSubmit" class="grid grid-cols-1 gap-6 "> 
                
                <div>
                    <label class="block mb-2 text-xs font-semibold text-gray-700 uppercase">Wachtwoord:</label>
                    <input type="text" v-model="password" placeholder="Type the password to unlock" class="w-full p-3 bg-white border border-gray-300 rounded border-1">
                </div>
                <div>
                    <button type="submit" class="w-full p-3 text-white bg-indigo-500 rounded hover:bg-indigo-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 2a5 5 0 00-5 5v2a2 2 0 00-2 2v5a2 2 0 002 2h10a2 2 0 002-2v-5a2 2 0 00-2-2H7V7a3 3 0 015.905-.75 1 1 0 001.937-.5A5.002 5.002 0 0010 2z" />
                            </svg>
                        <span class="inline-block ml-2 text-sm">Unlock message</span>
                    </button>
                </div>

                <div v-if="errors">
                    <span class="text-sm text-red-400">{{errors.message}}</span>
                </div>
            </form>
            </div>
        </div>


        
            <div v-if="messageResult" class="block p-12">
                <h2 class="font-semibold">The message is:</h2>
                <div class="mt-3">
                <p class="text-gray-700">{{messageResult}}</p>
                </div>
            </div>
    </div>
</template>
<script>
import { ref } from '@vue/runtime-core';

export default {
    // setup: () => ({
    //     greeting: 'Dit is een fdadsfs'
    // })
    props: ['id'],
    setup(props) {
        const messageId = props.id
        const password = ref();
        const messageResult = ref('');
        const errors = ref();
        const loading = ref(false);
        const locked = ref(true);



        const resetFormResults = () => {
                errors.value = false;
                loading.value = true;
                messageResult.value = '';

        }
        const onSubmit = async() => {
            resetFormResults()
            axios.post(`/api/messages/${messageId}/unlock`, {
                id: messageId,
                password: password.value
            }).then(res => {
               console.log(res)
                const {data} = res;
                const {message} = data;

                messageResult.value = message;
                locked.value = false;

            })
            .catch(err => {
                const {response} = err;
                errors.value = response.data
            })

        }

        return { password,onSubmit,messageResult, errors, locked}
    }
}
</script>
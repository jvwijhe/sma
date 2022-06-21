<template>
    <div class="pb-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                  <div class="flex items-center gap-6">
                    <button type="button" @click="resendInvites" class="p-3 font-bold text-white bg-indigo-500 rounded">Re-send invites</button>
                    
                    <button type="button" class="flex gap-3 p-3 font-bold text-red-500 bg-transparent rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                          </svg>
                          <span class="inline-block">Delete message</span>
                    </button>
                  </div>
            </div>
        </div>

        <div :class="[showModal ? 'opacity-100' : 'opacity-0', 'fixed bottom-0 left-0 p-3 m-6 text-green-500 shadow-lg shadow-green-200/50 bg-green-100 rounded trans w-60']">
            <span class="text-sm">{{modalMessage}}</span>
        </div>
    </div>
</template>
<script>
import { ref } from '@vue/runtime-core';

export default {
 
    props: ['id'],
    setup(props) {
        const messageId = props.id
        const errors = ref();
        const showModal = ref(false);
        const modalMessage = ref('');


        const resendInvites = () => {
            modalMessage.value = ''

             axios.post(`/api/messages/${messageId}/send-invites`, {
                id: messageId,
            }).then(res => {
                modalMessage.value = 'invites send...'
            showModal.value = true
            })
            .catch(err => {
                  console.log(err)
            })
        }

        return {resendInvites, errors, showModal, modalMessage}
    }
}
</script>
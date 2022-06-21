<template>
    <div class="relative">

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
     
        const onSubmit = async() => {

            axios.post(`/api/messages/`, {
                id: messageId,
            }).then(res => {
             

            })
            .catch(err => {
                const {response} = err;
                errors.value = response.data
            })

        }

        return {onSubmit, errors}
    }
}
</script>
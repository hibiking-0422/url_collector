<template>
    <div class="container">
        <p>{{ msg }}</p>
        <button v-on:click="getCompile">compile</button>
    </div>
</template>

<script>
const axios = require('axios');
export default {
    data:function() {
        return {
            msg: 'wait...',
            results:[],
            postData:{
                "code":"#include <iostream>\nint main() { int x = 0; std::cout << \"hoge\" << std::endl; }",
                "options": "warning,gnu++1y",
                "compiler": "gcc-head",
                "compiler-option-raw": "-Dx=hogefuga\n-O3"
            }
        };
    },
    methods: {
        getCompile: function() {
            axios.post('https://wandbox.org/api/list.json', this.postData)
            .then(response =>{
                this.results = response.data;
                this.msg = 'complete Compile!';
                console.log(response.data);
            });
        }
    }
}
</script>
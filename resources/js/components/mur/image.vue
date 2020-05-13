<template>
    <div>
    <input type="file" @change="onFileSelected">
    <button @click="onUpload">Upload</button> 
    </div>
</template>

<script>
import axios from 'axios'
export default {
    data() {
        return {
            SelectedFile: null
        }
    }, 
    methods : {
        onFileSelected(event) {
            this.SelectedFile = event.target.files[0]
        },
        onUpload() {
            const fd = new FormData();
            fd.append('image', this.SelectedFile, this.SelectedFile.name)
            axios.post('http://127.0.0.1:8000/api/image', fd)
            .then(res => {
                console.log()
            })
        }
    }
}
</script>
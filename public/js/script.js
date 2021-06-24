var app = new Vue({
    el: '#app',
    data: {
        file: null,
        type: 1,
        url: '',
        type_field: 'image',
        src: '',
        medias: []
    },

    mounted() {
        $('.default').masonry({
            // options
            itemSelector: '.item'
        });
    },

    methods: {

        selectedFile(event) {
            this.file = event.target.files[0]

            const reader = new FileReader()

            reader.addEventListener(
                'load',
                function () {
                    this.src = reader.result
                }.bind(this),
                false
            )

            if (this.file) {
                if (/\.(jpe?g|png|gif)$/i.test(this.file.name)) {
                    this.type_field = 'image'
           
                    reader.readAsDataURL(this.file)
                }
            }
        },

        selectedFiles(event){

            for (let index = 0; index < event.target.files.length; index++) {
                
                const element = event.target.files[index];
           
                const reader = new FileReader()

                reader.addEventListener(
                    'load',
                    function () {
                        this.medias.push(reader.result)
                    }.bind(this),
                    false
                )

                if (element) {
                    if (/\.(jpe?g|png|gif)$/i.test(element.name)) {
                        this.type_field = 'image'
            
                        reader.readAsDataURL(element)
                    }
                    if (/\.(avi|mp4|webm)$/i.test(element.name)) {
                        this.type_field = 'video'
                        reader.readAsDataURL(element)
                    }
                } 
            }
        
        },

        deleteMedia(pos) {
            this.medias.splice(pos, 1);
            alert(document.querySelector('#galleries').value)
        }
    }
})
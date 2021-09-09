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

$(document).on('change', '.selectOrder', function(){

  let order = $(this).parent().parent().parent().parent().parent().attr('data-order')
    let value = $(this).val()

    $('[data-order=' + value + ']').attr('data-order', order)

    $(this).parent().parent().parent().parent().parent().attr('data-order', value)

    $.post('/api/portfolios/change-order', { value: value, order: order}).done(res => {

        console.log(res)
        var $fields, $container, sorted, index;
            
        $('.default').masonry('destroy');
        $('.default').removeData('masonry');
    
        $container = $('.default');
        $fields = $("div[data-order]", $container);
        sorted = [];
        $fields.detach().each(function() {
            sorted[parseInt(this.getAttribute("data-order"), 10)] = this;
        });
        $container.html('')
         sorted.forEach(function(element) {
            $container.append(element);
        });
        $('.default').masonry({
            // options
            itemSelector: '.item'
        }); 
    })

})

$(document).on('click', '.dropdown .dropdown-menu', function (e) {
    e.stopPropagation();
});
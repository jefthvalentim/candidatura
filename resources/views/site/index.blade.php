<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maltaimedia</title>
    <link href="{{ asset('site/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('site/css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('site/css//grid-gallery.min.css') }}" rel="stylesheet">
</head>
<body>
    <div class="loading">
        <div class="loading-img">
            <video src="{{ asset('site/images/Loading.mp4" loop autoplay muted style="width: 100%"></video>
        </div>
    </div>
    <div id="app">
        <!--    MENU MOBILE     -->
        <nav class="mobile-bottom-nav" v-show="activeMenuItem != 'gallery' && activeMenuItem != 'web'">
            <div class="mobile-bottom-nav__item" :class="{ 'mobile-bottom-nav__item--active' : activeMenuItem == 'home' }" @click="activeMenuItem = 'home'">
                <div class="mobile-bottom-nav__item-content">
                    <div class="mobile-bottom-nav__item-icon">
                        <img src="{{ asset('site/images/icons/Home.svg') }}" alt="" v-show="activeMenuItem == 'home'">
                        <img src="{{ asset('site/images/icons/Home_R.svg') }}" alt="" v-show="activeMenuItem != 'home'">
                    </div>
                    Home
                </div>		
            </div>
            <div class="mobile-bottom-nav__item" :class="{ 'mobile-bottom-nav__item--active' : activeMenuItem == 'about' }" @click="activeMenuItem = 'about'">		
                <div class="mobile-bottom-nav__item-content">
                    <div class="mobile-bottom-nav__item-icon">
                        <img src="{{ asset('site/images/icons/Quem_Somos.svg') }}" alt="" v-show="activeMenuItem == 'about'">
                        <img src="{{ asset('site/images/icons/Quem_Somos_R.svg') }}" alt="" v-show="activeMenuItem != 'about'">
                    </div>
                    Sobre Nós
                </div>
            </div>
            <div class="mobile-bottom-nav__item" :class="{ 'mobile-bottom-nav__item--active' : activeMenuItem == 'service' }" @click="menuOption()">
                <div class="mobile-bottom-nav__item-content">
                    <div class="mobile-bottom-nav__item-icon">
                        <img src="{{ asset('site/images/icons/Servicos.svg') }}" alt="" v-show="activeMenuItem == 'service'">
                        <img src="{{ asset('site/images/icons/Servicos_R.svg') }}" alt="" v-show="activeMenuItem != 'service'">
                    </div>
                    Serviços
                </div>		
            </div>
            
            <div class="mobile-bottom-nav__item" :class="{ 'mobile-bottom-nav__item--active' : activeMenuItem == 'contact' }" @click="activeMenuItem = 'contact'">
                <div class="mobile-bottom-nav__item-content">
                    <div class="mobile-bottom-nav__item-icon">
                        <img src="{{ asset('site/images/icons/Contactos.svg') }}" alt="" v-show="activeMenuItem == 'contact'">
                        <img src="{{ asset('site/images/icons/Contactos_R.svg') }}" alt="" v-show="activeMenuItem != 'contact'">
                    </div>
                    Contactos
                </div>		
            </div>
        </nav>
        <!--    END MENU MOBILE     -->

        <section class="content-containers" :class="{ 'body-scroll' : openedModal && windowWidthDesktop }">
            <!-- SETTING GALLERY PAGE -->
            <div class="modal-web" v-if="activeMenuItem == 'gallery'">
                <template>
                    <div style="width: 100%; min-height: 100vh; padding: 0 ; box-sizing: border-box; overflow-x: hidden;">
                        <div class="modal-gallery-close">
                            <div class="close-modal-web " @click="activeMenuItem = 'home'"><img src="{{ asset('site/images/icons/Fechar.svg') }}" alt=""></div>
                        </div>
                        <div class="title-web">
                            <h2></h2>
                            <div class="close-modal-web" @click="activeMenuItem = 'web'"><img src="{{ asset('site/images/icons/Fechar.svg') }}" alt=""></div>
                        </div>
                        
                        <div id="gg-screen"></div>
                        <div class="gallery-slideshow">
                            <article v-for="(project, index) in projects" :key="index">
                                <div class="gallery-detail">
                                    <div class="gallery-header">
                                        <div><a href="" class="gallery-prev gallery-arrow"><img src="{{ asset('site/images/icons/Seta_ANt.svg') }}" alt="Seta anterior"></a></div>
                                        <div class="gallery-center">
                                            <div class="gallery-left-side">
                                                <div class="gallery-left-side-top">
                                                    <h2 class="galler-left-side-top-title">Mistsuka Andrade - Sessão Fotográfica</h2> 21-11-2014
                                                </div>
                                                <div class="gallery-left-side-bottom">
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita ipsum qui enim dignissimos itaque debitis et cum exercitationem, perferendis soluta placeat amet illo delectus explicabo sunt quam dolor quisquam tempora.
                                                </div>
                                            </div>
                                            <div class="gallery-right-side">Animação 2D Ilustração</div>
                                        </div>                                            
                                        <div><a href="" class="gallery-next gallery-arrow"><img src="{{ asset('site/images/icons/Seta_Seg.svg') }}" alt="Seta próximo"></a></div>
                                    </div>
                                    <div class="gallery-arrow-mobile">
                                        <div><a href="" class="gallery-prev"><img src="{{ asset('site/images/icons/Seta_ANt.svg') }}" alt="Seta anterior"></a></div>
                                        <div><a href="" class="gallery-next"><img src="{{ asset('site/images/icons/Seta_Seg.svg') }}" alt="Seta próximo"></a></div>
                                    </div>
                                    <div class="gallery-media">
                                        <div class="gallery-media-video" v-if="project.type == 'video'">
                                            <video src="media.mp4" controls class="media-fluid" style="width: 100%;"></video>
                                        </div>
                                        <div class="gg-box" v-if="project.type == 'image'">
                                            <div class="gg-element" v-for="(gallery, pos) in project.galleries" :key="index + 'gallery-' + pos">
                                                <img :src="gallery.image">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </article>
                        </div>
                        <div class="modal-web-footer">&copy .:Maltaimedia:. 2021</div>
                    </div>
                </template>    

            </div>
            <!-- END SETTING GALLERY PAGE -->

            <!-- SETTING HOME PAGE -->
            <div class="container-home" v-show="activeMenuItem == 'home' || activeMenuItem == 'web'">
                <div class="logo-home d-none">
                    <img src="{{ asset('site/images/icons/Logo_MM_transparent.svg') }}" alt="">
                </div>
                <!-- MENU DESKTOP  -->
                <nav class="home-menu">
                    <ul>
                        <li @click="openWebModal(0)">SOBRE NÓS</li>
                        <li @click="openWebModal(1)">SERVIÇOS</li>
                        <li @click="openWebModal(2)">CONTACTOS</li>
                    </ul>
                </nav>
                <!-- END MENU DESKTOP -->

                <!-- FILTER MOBILE -->
                <div class="home-filter"><img src="{{ asset('site/images/filtro.png') }}" alt=""></div>
                
                <div class="home-filter-modal d-none">
                    <div class="home-filter-modal-close"><img src="{{ asset('site/images/icons/Fechar.svg') }}" alt=""></div>
                    <ul>
                        <li>
                            <input type="checkbox" name="" id="filter-all" @click="filters = []">
                            <label for="filter-all" style="font-size: 17px;" :class="{ 'color-orange' : filters.length == 0}">Todos</label>
                        </li>

                        <li v-for="category in categories" :key="category.id">
                            <input type="checkbox" name="" :id="'filter-' + category.id" :value="category.category" v-model="filters">
                            <label :for="'filter-' + category.id">
                                <div class="filter-image">
                                    <img :src="'{{ asset('site/images/icons/' + category.icon) }}" alt=""  :class="{ 'd-none' : !filters.includes(category.category) }">
                                    <img :src="'{{ asset('site/images/icons/' + category.icon2) }}" alt="" :class="{ 'd-none' : filters.includes(category.category) }">
                                </div>  
                                <div class="span" :class="{ 'filter-actived' : filters.includes(category.category) }">
                                    <div>{{category.category}}</div>
                                </div>
                            </label>
                        </li>
                    </ul>
                </div>
                <!-- END FILTER MOBILE -->

                <!-- LIST PROJECTS -->
                <div class="filter-desktop"><a href="">FILTRO</a></div>
                <div class="home-projects-list default">
                    <div class="home-projects-list-item item" v-for="(project, index) in projectsList" :key="index" @click="menuOption('gallery', index)">
                        <div class="home-projects-list-item-content">Content</div>
                        <img src="https://via.placeholder.com/500.png?text=DAKAI" style="object-fit: cover;">
                    </div>
                </div>
                <!-- END LIST PROJECTS -->

                <div class="home-footer">
                    <div class="back-to-top-arrow">
                        <a href="#app">
                            <img src="{{ asset('site/images/icons/up-arrow.png') }}" alt="">
                            <p>VOLTAR AO TOP</p>
                        </a>
                    </div>
                </div>
                <div class="modal-web-footer modal-web-footer-aux">&copy .:Maltaimedia:. 2021</div>
                
            </div>
            <!-- END SETTING HOMEPAGE -->

            <div class="modal-web" v-if="openedModal">
                <!-- SETTING SLIDE WEB -->
                <div style="position: relative; height: 100%;">
                    <div class="slide-web">
                        <!-- SETTING ABOUT PAGE -->
                        <div>
                            <div class="title-web">
                                <h2>SOBRE NÓS</h2>
                                <div class="close-modal-web" @click="openedModal = false"><img src="{{ asset('site/images/icons/Fechar.svg') }}" alt=""></div>
                            </div>
                            
                            <div class="container-about" v-show="activeMenuItem == 'about' || activeMenuItem == 'web'">
                                <div class="about-image">
                                <div class="about-image-container">
                                    <div style="text-align: right;"> 
                                        <div class="image image-1"><img class="span-2" src="https://boomo.com.br/images/noticias/dragao-branco-de-olhos-azuis-yu-gi-oh-funko-pop-boneco-jpg-c914.jpg"></div>
                                        <div class="image image-2"><img src="https://boomo.com.br/images/noticias/the-order-2-temporada-2-png-c539.png"></div>
                                        </div>
                                        <div style="margin-top: 50px;">
                                            <div class="image image-3"><img src="https://boomo.com.br/images/noticias/the-order-2-temporada-3-png-c209.png"></div>
                                            <div class="image image-4"><img class="span-2" src="https://boomo.com.br/images/noticias/joey-wheeler-yu-gi-oh-funko-pop-boneco-jpg-c328.jpg"></div>
                                    </div>
                                </div>
                                </div>
                                <div class="about-content">
                                    
                                    <div class="logo-mark">
                                        <img src="{{ asset('site/images/icons/Logo_MM.svg') }}" alt="">
                                    </div>
                                    <p>
                                        A .:Maltaimedia:. é uma empresa de produção de conteúdos digitais e  multimédia no mercado desde 2018, 
                                        criada com o objectivo de atender um mercado cada vez maior de pessoas particulares e empresas que demandam 
                                        conteúdos áudio visuais de qualidade que visam alcançar seus objectivos e atingir o seu público alvo  diferenciando-se
                                        em um mercado moderno cada vez mais competitivo.
                                    </p>
                                    <br />
                                    <p>
                                        Investimos no sucesso de cada cliente – pequenas, médias e grandes empresas – e faremos um esforço extra para garantir 
                                        que o seu projecto atenda ás suas expectativas e dos seus clientes e contribuindo para alcance dos seus objectivos.
                                    </p>
                                    <br />
                                    <p>
                                        Somos uma equipe de profissionais criativos, com amplo e profundo conhecimento nas suas áreas de actuação, apaixonados 
                                        por aquilo que fazemos e dedicados e comprometidos em ajudá-lo a alavancar o seu negócio por meio de conteúdos digitais cativantes.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- END SETTING ABOUT PAGE -->
            
                        <!-- SETTING SERVICE PAGE -->
                        <div>
                            <div class="title-web">
                                <h2>SERVIÇOS</h2>
                                <div class="close-modal-web" @click="openedModal = false"><img src="{{ asset('site/images/icons/Fechar.svg') }}" alt=""></div>
                            </div>
                            
                            <div class="container-service" v-if="activeMenuItem == 'service' || activeMenuItem == 'web'">
                                <section class="service-display-flex">
                                    
                                    <div class="service-arrow service-arrow-desktop">
                                        <a href="#" class="prev" @click="selectService()"><img src="{{ asset('site/images/icons/Seta_Resp.svg" alt="Seta anterior"></a>
                                    </div>
                                    <div class="">
                                        <article>
                                            <div class="service-icon"><img :src="'{{ asset('site/images/icons/' + service.icon" :alt="service.title"></div>
                                            <div class="service-title">
                                                <h2>{{ service.title }}</h2>
                                            </div>
                                            <div class="service-content">
                                                <p v-html="service.description"></p>
                                            </div>
                                        </article>
                                    </div>
                                    <div class="service-arrow service-arrow-right service-arrow-desktop">
                                        <a href="#" class="next" @click="selectService(1)"><img src="{{ asset('site/images/icons/Seta_Resp2.svg" alt="Seta próximo"></a>
                                    </div>
                                    
                                    <div class="service-arrow-container">
                                        <div class="service-arrow">
                                            <a href="#" class="prev" @click="selectService()"><img src="{{ asset('site/images/icons/Seta_Resp.svg" alt="Seta anterior"></a>
                                        </div>
                                        <div class="service-arrow service-arrow-right">
                                            <a href="#" class="next" @click="selectService(1)"><img src="{{ asset('site/images/icons/Seta_Resp2.svg" alt="Seta próximo"></a>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                        <!-- END SETTING CONTACT PAGE -->
            
                        <!-- SETTING CONTACT PAGE -->
                        <div>
                            <div class="title-web">
                                <h2>CONTACTOS</h2>
                                <div class="close-modal-web" @click="openedModal = false"><img src="{{ asset('site/images/icons/Fechar.svg') }}" alt=""></div>
                            </div>
                            <div class="container-contact" v-show="activeMenuItem == 'contact' || activeMenuItem == 'web'">
                                <div>
                                    <div class="contact-video"></div>
                                    <div class="contact-info">
                                        <a href="tel:+244923964470">(+244) 923 964 470</a> <br />
                                        <a href="mailto:info@maltaimedia.com">info@maltaimedia.com</a> <br />
                                        Luanda - Angola
                                    </div>
                                    <div class="contact-social">
                                        <nav>
                                            <ul>
                                                <li><a href="" target="_blank"><img src="{{ asset('site/images/icons/instagram.svg') }}" alt=""></a></li>
                                                <li><a href="" target="_blank"><img src="{{ asset('site/images/icons/linkedin.svg') }}" alt=""></a></li>
                                                <li><a href="" target="_blank"><img src="{{ asset('site/images/icons/facebook-logo.svg') }}" alt=""></a></li>
                                                <li><a href="" target="_blank"><img src="{{ asset('site/images/icons/youtube.svg') }}" alt=""></a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                                <div class="contact-form">
                                    <form action="">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nome">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Contacto telefónico">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="E-mail">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="" id="" cols="30" rows="8" class="form-control" placeholder="Mensagem"></textarea>
                                        </div>
                                        <div class="form-group"><a href="" @click.prevent="" class="form-btn"><div>ENVIAR</div><div><img src="{{ asset('site/images/icons/Seta_Resp2.svg') }}" alt=""></div></a></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- END SETTING CONTACT PAGE -->
                    </div>
                    
                    <div class="slick-controls">
                        <a href="" class="service-slick-prev" @click.prevent="slideSlick()"><img v-show="slickCurrentSlide > 0" src="{{ asset('site/images/icons/Seta_ANt.svg" alt="Seta anterior"></a>
                        <a href="" class="service-slick-next" @click.prevent="slideSlick(1)"><img v-show="slickCurrentSlide < 2" src="{{ asset('site/images/icons/Seta_Seg.svg" alt="Seta próximo"></a>
                    </div>
                    <div class="modal-web-footer">&copy .:Maltaimedia:. 2021</div>
                </div>
                <!-- END SLIDE WEB -->
            </div>
        </section>
    </div>
    
    <script src="{{ asset('site/js/vue.min.js') }}"></script>
    <script src="{{ asset('site/js/jquery.min.js') }}"></script>
    <script src="{{ asset('site/js/slick.min.js') }}"></script>
    <script src="{{ asset('site/js/grid-gallery.min.js') }}"></script>
    <script src="{{ asset('site/js/minimasonry.min.js') }}"></script>
    <script src="{{ asset('site/js/script.js') }}"></script>
</body>
</html>
(function() {
    'use strict';
    const regalo = document.getElementById('regalo');

    document.addEventListener('DOMContentLoaded', function(){

        //Campos datos de usuario
        var nombre = document.getElementById('nombre');
        var apellido = document.getElementById('apellido');
        var email = document.getElementById('email');

        //Campos pases

        var pase_dia = document.getElementById('pase_dia');
        var pase_completo = document.getElementById('pase_completo');
        var pase_dosdias = document.getElementById('pase_dosdias');

        //Botones y Divs

        var calcular = document.getElementById('calcular');
        var errorDiv = document.getElementById('error');
        var botonRegistro = document.getElementById('boton_registro');
        var lista_productos = document.getElementById('lista-productos');
        var suma = document.getElementById('suma_total');
        // Extras
        const etiquetas = document.getElementById('etiquetas');
        const camisas = document.getElementById('camisa_evento');

        botonRegistro.disabled = true;

        if(document.getElementById('calcular')) {
            calcular.addEventListener('click', calcularMontos);

            pase_dia.addEventListener('blur', mostrarDias);
            pase_dosdias.addEventListener('blur', mostrarDias);
            pase_completo.addEventListener('blur', mostrarDias);

            nombre.addEventListener('blur', validarCampos);
            apellido.addEventListener('blur', validarCampos);
            email.addEventListener('blur', validarCampos);
            email.addEventListener('blur', validarMail);

            function validarCampos() {
                if (this.value == '' ) {
                    errorDiv.style.display = 'block';
                    errorDiv.innerHTML = 'Este campo es obligatorio';
                    this.style.border = '2px solid red';
                    errorDiv.style.color = 'red';
                } else {
                    errorDiv.style.display = 'none';
                    this.style.border = '2px solid #cccccc';
                }
            }

            function validarMail(){
                if (this.value.indexOf('@') > -1) {
                    errorDiv.style.display = 'none';
                    this.style.border = '2px solid #cccccc';
                } else {
                    errorDiv.style.display = 'block';
                    errorDiv.innerHTML = 'Correo no válido';
                    this.style.border = '2px solid red';
                    errorDiv.style.color = 'red';
                }
            }

            function calcularMontos(event) {
                event.preventDefault();
                if(regalo.value === '') {
                    alert('Debes elegir un regalo')
                    regalo.focus();
                } else {
                    const boletosDia = parseInt(pase_dia.value, 10) || 0,
                        boletosDosDias = parseInt(pase_dosdias.value, 10) || 0,
                        boletoCompleto = parseInt(pase_completo.value, 10) || 0,
                        cantidadCamisas = parseInt(camisas.value, 10) || 0,
                        cantidadEtiquetas = parseInt(etiquetas.value, 10) || 0;

                    const totalPagar = (boletosDia * 30) + (boletosDosDias * 45) + (boletoCompleto * 50) + ((cantidadCamisas * 10) * .93) + (cantidadEtiquetas * 2);
                    
                    const listadoProductos = [];

                    if(boletosDia >= 1) {
                        listadoProductos.push(boletosDia + ' Pases por día');
                    }
                    if (boletosDosDias >= 1) {
                        listadoProductos.push(boletosDosDias + ' Pases por 2 día');
                    }
                    if (boletoCompleto >= 1) {
                        listadoProductos.push(boletoCompleto + ' Pases completos');
                    }
                    if (cantidadCamisas >= 1) {
                        listadoProductos.push(cantidadCamisas + ' Camisas');
                    }  
                    if (cantidadEtiquetas >= 1) {
                        listadoProductos.push(cantidadEtiquetas + ' Pack de Etiquetas')
                    }
                    
                    lista_productos.style.display = 'block';
                    lista_productos.innerHTML = '';
                    
                    for(let i = 0; i < listadoProductos.length; i++) {
                        lista_productos.innerHTML += listadoProductos[i] + '<br/> '
                    }      
                    
                    suma.innerHTML = '$ ' + totalPagar.toFixed(2);

                    botonRegistro.disabled = false;
                    document.getElementById('total_pedido').value = totalPagar;
                }

            }//Fin función calcularMontos

            function mostrarDias() {
                const boletosDia = parseInt(pase_dia.value, 10) || 0,
                        boletosDosDias = parseInt(pase_dosdias.value, 10) || 0,
                        boletoCompleto = parseInt(pase_completo.value, 10) || 0;

                const diasElegidos = [];

                if (boletosDia > 0) {
                    diasElegidos.push('viernes');
                }
                if (boletosDosDias > 0) {
                    diasElegidos.push('viernes', 'sabado');
                }
                if (boletoCompleto > 0) {
                    diasElegidos.push('viernes', 'sabado', 'domingo');
                }

                for(let i = 0; i < diasElegidos.length; i++) {
                    document.getElementById(diasElegidos[i]).style.display = 'block';
                }
            }

            
            var mymap = L.map('mapa').setView([-34.602499, -58.368763], 17);

            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 18,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'your.mapbox.access.token'
            }).addTo(mymap);
            
        }
    }); //DOM Content Loaded

    $(document).ready(function() {

        //Lettering
        $('.nombre-sitio').lettering();
    
        //Fixed Menu
    
        var windowHeight = $(window).height();
        var barraHeight = $('.barra').innerHeight();
    
        $(window).scroll(function(){
            var scroll = $(window).scrollTop();
            
            if(scroll > windowHeight) {
                $('.barra').addClass('fixed');
                $('body').css({'margin-top': barraHeight+'px'});
            } else {
                $('.barra').removeClass('fixed');
                $('body').css({'margin-top': '0px'});
    
            }
        });
    
        //Menú Responsive
    
        $('.mobile-menu').on('click', function(){
            $('.main-nav').slideToggle();
            
        });
    
        //Programa de Conferencias
        $('.schedule-events .info-curso:first').show();
        $('.menu-schedule a:first').addClass('activo');
    
        $('.menu-schedule a').on('click', function() {
    
            $('.menu-schedule a').removeClass('activo');
            $(this).addClass('activo');
            $('.ocultar').hide();
            var enlace = $(this).attr('href');
    
            $(enlace).fadeIn(1000);
    
            return false;
        });
    
        //Animaciones para los números
        var resumenLista = jQuery('.event-briefing');
        if(resumenLista.length > 0) {
            $('.event-briefing').waypoint(function(){
                $('.event-briefing li:nth-child(1) p').animateNumber({ number: 6}, 1200);
                $('.event-briefing li:nth-child(2) p').animateNumber({ number: 15}, 1200);
                $('.event-briefing li:nth-child(3) p').animateNumber({ number: 3}, 1500);
                $('.event-briefing li:nth-child(4) p').animateNumber({ number: 9}, 1500);
            });
        }
    
        //Cuenta regresiva
    
        $('.countdown').countdown('2021/12/10 09:00:00', function(event){
            $('#dias').html(event.strftime('%D'));
            $('#horas').html(event.strftime('%H'));
            $('#minutos').html(event.strftime('%M'));
            $('#segundos').html(event.strftime('%S'));
        });

        //Colorbox

        $('.invitado-info').colorbox({inline:true, width:"50%"});
    });    

})();

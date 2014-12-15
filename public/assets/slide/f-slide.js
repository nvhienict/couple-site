  $(document).ready(function() {
        // $('.fancybox').fancybox();

            /*
             *  Different effects
             */

            // Change title type, overlay closing speed
            // $(".fancybox-effects-a").fancybox({
            //     helpers: {
            //         title : {
            //             type : 'outside'
            //         },
            //         overlay : {
            //             speedOut : 0
            //         }
            //     }
            // });

            // Disable opening and closing animations, change title type
            // $(".fancybox-effects-b").fancybox({
            //     openEffect  : 'none',
            //     closeEffect : 'none',

            //     helpers : {
            //         title : {
            //             type : 'over'
            //         }
            //     }
            // });

            // Set custom style, close if clicked, change title type and overlay color
            // $(".fancybox-effects-c").fancybox({
            //     wrapCSS    : 'fancybox-custom',
            //     closeClick : true,

            //     openEffect : 'none',

            //     helpers : {
            //         title : {
            //             type : 'inside'
            //         },
            //         overlay : {
            //             css : {
            //                 'background' : 'rgba(238,238,238,0.85)'
            //             }
            //         }
            //     }
            // });

            // Remove padding, set opening and closing animations, close if clicked and disable overlay
            // $(".fancybox-effects-d").fancybox({
            //     padding: 0,

            //     openEffect : 'elastic',
            //     openSpeed  : 150,

            //     closeEffect : 'elastic',
            //     closeSpeed  : 150,

            //     closeClick : true,

            //     helpers : {
            //         overlay : null
            //     }
            // });

            /*
             *  Button helper. Disable animations, hide close button, change title type and content
             */

            // $('.fancybox-buttons').fancybox({
            //     openEffect  : 'none',
            //     closeEffect : 'none',

            //     prevEffect : 'none',
            //     nextEffect : 'none',

            //     closeBtn  : false,

            //     helpers : {
            //         title : {
            //             type : 'inside'
            //         },
            //         buttons : {}
            //     },

            //     afterLoad : function() {
            //         this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
            //     }
            // });


            /*
             *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
             */

            // $('.fancybox-thumbs').fancybox({
            //     prevEffect : 'none',
            //     nextEffect : 'none',

            //     closeBtn  : false,
            //     arrows    : false,
            //     nextClick : true,

            //     helpers : {
            //         thumbs : {
            //             width  : 50,
            //             height : 50
            //         }
            //     }
            // });

            /*
             *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
            */
            // $('.fancybox-media')
            //     .attr('rel', 'media-gallery')
            //     .fancybox({
            //         openEffect : 'none',
            //         closeEffect : 'none',
            //         prevEffect : 'none',
            //         nextEffect : 'none',

            //         arrows : false,
            //         helpers : {
            //             media : {},
            //             buttons : {}
            //         }
            //     });

            /*
             *  Open manually
             */

            // $("#fancybox-manual-a").click(function() {
            //     $.fancybox.open('1_b.jpg');
            // });

            // $("#fancybox-manual-b").click(function() {
            //     $.fancybox.open({
            //         href : 'iframe.html',
            //         type : 'iframe',
            //         padding : 5
            //     });
            // });

            // $("#fancybox-manual-c").click(function() {
            //     $.fancybox.open([
            //         {
            //             href : '1_b.jpg',
            //             title : 'My title'
            //         }, {
            //             href : '2_b.jpg',
            //             title : '2nd title'
            //         }, {
            //             href : '3_b.jpg'
            //         }
            //     ], {
            //         helpers : {
            //             thumbs : {
            //                 width: 75,
            //                 height: 50
            //             }
            //         }
            //     });
            // });


            $(".fancybox")
                .attr('rel', 'gallery')
                .fancybox({
                    beforeShow: function () {
                        
                            // New line
                            this.title += '<br />';
                            
                            // Add tweet button
                            // this.title += '<a href="https://twitter.com/share" class="twitter-share-button" data-count="none" data-url="' + this.href + '">Tweet</a> ';
                            
                            // Add FaceBook like button
                            this.title += '<iframe src="//www.facebook.com/plugins/like.php?href=' + this.href + '&amp;layout=button_count&amp;show_faces=true&amp;width=500&amp;action=like&amp;font&amp;colorscheme=light&amp;height=23" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:110px; height:23px;" allowTransparency="true"></iframe>';
                      
                    },
                    afterShow: function() {
                        // Render tweet button
                        // twttr.widgets.load();
                    },
                    helpers : {
                        title : {
                            type: 'inside'
                        }
                    }  
                });


        });
(function($) {
    $(function() {
        
    });
})(jQuery);


(function($) {
    $(function() {
		
		var jcarousel = $('.jcarousel');
        jcarousel
            .on('jcarousel:reload jcarousel:create', function () {
				
				var body_width = $('body').width()
                var width = jcarousel.innerWidth();

                if (body_width <= 768 && body_width > 480 ) {
					width = width / 3;
					jcarousel.jcarousel('items').css('width', width + 'px');
                }
				else if (body_width <= 480) {
					width = width / 2;
					jcarousel.jcarousel('items').css('width', width + 'px');
                }
				else {
					width = width / 4;
					jcarousel.jcarousel('items').css('width', width + 'px');
                }
                //
            })
		
        var jcarousel = $('.jcarousel').jcarousel();

        $('.jcarousel-control-prev')
            .on('jcarouselcontrol:active', function() {
                $(this).removeClass('inactive');
            })
            .on('jcarouselcontrol:inactive', function() {
                $(this).addClass('inactive');
            })
            .jcarouselControl({
                target: '-=1'
            });

        $('.jcarousel-control-next')
            .on('jcarouselcontrol:active', function() {
                $(this).removeClass('inactive');
            })
            .on('jcarouselcontrol:inactive', function() {
                $(this).addClass('inactive');
            })
            .jcarouselControl({
                target: '+=1'
            });

        var setup = function(data) {
            var html = '<ul>';

            $.each(data.items, function() {
                html += '<li><img src="' + this.src + '" alt="' + this.title + '"></li>';
            });

            html += '</ul>';

            // Append items
            jcarousel
                .html(html);

            // Reload carousel
            jcarousel
                .jcarousel('reload');
        };

        $.getJSON('data.json', setup);
    });
})(jQuery);
